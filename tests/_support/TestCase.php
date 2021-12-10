<?php

namespace Tests\Support;

use CodeIgniter\Publisher\Publisher;
use CodeIgniter\Test\CIUnitTestCase;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use Tatter\Assets\Asset;
use Tatter\Assets\Config\Assets as AssetsConfig;
use Tatter\Frontend\FrontendBundle;
use Tatter\Frontend\FrontendPublisher;

abstract class TestCase extends CIUnitTestCase
{
    /**
     * Virtual workspace
     *
     * @var vfsStreamDirectory
     */
    protected $root;

    /**
     * @var AssetsConfig
     */
    protected $config;

    /**
     * Preps the config and VFS.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->root = vfsStream::setup('root');

        // Create the config
        $this->config                = config('Assets');
        $this->config->directory     = $this->root->url() . DIRECTORY_SEPARATOR;
        $this->config->useTimestamps = false; // These make testing much harder

        Asset::useConfig($this->config);

        // Add VFS as an allowed Publisher directory
        config('Publisher')->restrictions[$this->config->directory] = '*';
    }

    /**
     * Preps the config and VFS.
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        $this->root = null; // @phpstan-ignore-line
        $this->resetServices();
    }

    /**
     * @param class-string<FrontendPublisher> $class
     * @param string[]                        $expected
     */
    public function assertPublishesFiles(string $class, array $expected): void
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
     * @param class-string<FrontendBundle> $class
     * @param string[]                     $expectedHeadFiles
     * @param string[]                     $expectedBodyFiles
     */
    public function assertBundlesFiles(string $class, array $expectedHeadFiles, array $expectedBodyFiles): void
    {
        // Make sure everything is published
        foreach (Publisher::discover() as $publisher) {
            $publisher->publish();
        }

        $bundle = new $class();
        $head   = $bundle->head();
        $body   = $bundle->body();

        foreach ($expectedHeadFiles as $file) {
            $this->assertStringContainsString($file, $head);
        }

        foreach ($expectedBodyFiles as $file) {
            $this->assertStringContainsString($file, $body);
        }
    }
}
