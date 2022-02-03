<?php

use CodeIgniter\Test\CIUnitTestCase;
use Tatter\Assets\Test\AssetsTestTrait;
use Tatter\Frontend\FrontendPublisher;

/**
 * @internal
 */
final class FrontendPublisherTest extends CIUnitTestCase
{
    use AssetsTestTrait;

    public function testPublisherThrowsWithoutPath()
    {
        $this->expectException('DomainException');
        $this->expectExceptionMessage('Invalid relative destination $path');

        new class () extends FrontendPublisher {
        };
    }

    public function testPublisherSetsDestination()
    {
        // Allow publishing to the test folder
        config('Publisher')->restrictions[SUPPORTPATH] = '*';

        $publisher          = new class () extends FrontendPublisher {
            protected $path = 'foobar';
        };

        $this->assertSame($this->assets->directory . 'vendor/foobar/', $publisher->getDestination());
    }
}
