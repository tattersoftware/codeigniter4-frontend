<?php namespace Tests\Support;

use Tatter\Assets\Config\Assets as AssetsConfig;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;

trait VfsTrait
{
	/**
	 * Virtual workspace
	 *
	 * @var vfsStreamDirectory
	 */
	protected $root;

	/**
	 * Preps the config for the test directory.
	 */
    protected function setUpVfsTrait(): void
    {
		$this->root = vfsStream::setup('root');

		// Create the config (if another trait has not already)
		$this->config            = $this->config ?? config(AssetsConfig::class);
		$this->config->directory = $this->root->url();

		// Add this as an allowed Publisher directory
		config('Publisher')->restrictions[$this->config->directory] = '*';
	}

	/**
	 * Removes the VFS.
	 */
    protected function tearDownVfsTrait(): void
    {
    	$this->root = null;
    }
}
