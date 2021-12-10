<?php

use Tatter\Frontend\FrontendPublisher;
use Tests\Support\TestCase;

/**
 * @internal
 */
final class FrontendPublisherTest extends TestCase
{
    public function testPublisherThrowsWithoutPath()
    {
        $this->expectException('DomainException');
        $this->expectExceptionMessage('Invalid relative destination $path');

        $publisher = new class () extends FrontendPublisher {
        };
    }

    public function testPublisherSetsDestination()
    {
        // Allow publishing to the test folder
        config('Publisher')->restrictions[SUPPORTPATH] = '*';

        $publisher          = new class () extends FrontendPublisher {
            protected $path = 'foobar';
        };

        $this->assertSame($this->config->directory . 'vendor/foobar/', $publisher->getDestination());
    }
}
