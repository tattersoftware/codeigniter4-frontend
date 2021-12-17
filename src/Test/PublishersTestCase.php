<?php

namespace Tatter\Frontend\Test;

use CodeIgniter\Test\CIUnitTestCase;
use Tatter\Assets\Test\AssetsTestTrait;
use Tatter\Frontend\FrontendPublisher;

abstract class PublishersTestCase extends CIUnitTestCase
{
    use AssetsTestTrait;

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

    /**
     * Returns an array of items to test with each item
     * as a tuple of [string publisherClassName, string[] expectedFileNames]
     */
    abstract public function publisherProvider(): array;
}
