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

    public function testPublisherThrowsWithoutSourcePath()
    {
        $this->expectException('DomainException');
        $this->expectExceptionMessage('Invalid relative source path');

        new class () extends FrontendPublisher {
            protected string $publicPath = 'adminlte';
        };
    }

    public function testPublisherThrowsWithoutPath()
    {
        $this->expectException('DomainException');
        $this->expectExceptionMessage('Invalid relative destination path');

        new class () extends FrontendPublisher {
            protected string $vendorPath = 'almasaeed2010/adminlte/dist';
        };
    }

    public function testPublisherSetsDestination()
    {
        // Allow publishing to the test folder
        config('Publisher')->restrictions[SUPPORTPATH] = '*';

        $publisher = new class () extends FrontendPublisher {
            protected string $publicPath = 'foobar';
            protected string $vendorPath = 'almasaeed2010/adminlte/dist';
        };

        $this->assertSame($this->assets->directory . 'vendor/foobar/', $publisher->getDestination());
    }
}
