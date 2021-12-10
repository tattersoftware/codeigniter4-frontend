<?php

use Tatter\Frontend\Publishers\FontAwesomePublisher;
use Tests\Support\TestCase;

/**
 * @internal
 */
final class PublishersTest extends TestCase
{
    /**
	 * @dataProvider publisherProvider
	 *
     * @param class-string<FrontendPublisher> $class
     * @param string[]                        $expected
     */
    public function testPublishesFiles(string $class, array $expected): void
    {
        $publisher = new $class();
        $result    = $publisher->publish();

        // Verify that publication succeeded
        $this->assertTrue($result);
        $this->assertSame([], $publisher->getErrors());
        $this->assertNotSame([], $publisher->getPublished());

        // Check for each of the expected files
        foreach ($expected as $path) {
            $file = $this->config->directory . $this->config->vendor . $path;
            $this->assertFileExists($file);
        }
    }

    public function publisherProvider()
    {
    	return [
    		[
    			FontAwesomePublisher::class,
    			[
					'font-awesome/css/all.min.css',
					'font-awesome/css/svg-with-js.css',
					'font-awesome/webfonts/fa-brands-400.eot',
					'font-awesome/webfonts/fa-solid-900.woff2',
				],
    		],
    	];
    }
}
