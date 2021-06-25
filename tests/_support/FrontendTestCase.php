<?php namespace Tests\Support;

use CodeIgniter\Test\CIUnitTestCase;
use Tatter\Assets\Config\Assets as AssetsConfig;
use Tatter\Assets\Asset;

abstract class FrontendTestCase extends CIUnitTestCase
{
	/**
	 * @var AssetsConfig|null
	 */
	protected $config;

	/**
	 * Preps the config.
	 */
    protected function setUp(): void
    {
        parent::setUp();

		// Create the config (if a trait has not already)
		$this->config                = $this->config ?? config(AssetsConfig::class);
		$this->config->useTimestamps = false; // These make testing much harder

		Asset::useConfig($this->config);
	}

	/**
	 * Removes the config.
	 */
    protected function tearDown(): void
    {
    	parent::tearDown();

		$this->config = null;
    }
}
