<?php

namespace Tests\Support;

use CodeIgniter\Test\CIUnitTestCase;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use Tatter\Assets\Asset;
use Tatter\Assets\Config\Assets as AssetsConfig;

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

        // Create the config (if a trait has not already)
        $this->config                = Asset::config();
        $this->config->directory     = $this->root->url() . DIRECTORY_SEPARATOR;
        $this->config->useTimestamps = false; // These make testing much harder

        Asset::useConfig($this->config);

        // Add VFS as an allowed Publisher directory
        config('Publisher')->restrictions[$this->config->directory] = '*';
    }
}
