<?php

use Tatter\Frontend\Bundles\FontAwesomeBundle;
use Tatter\Frontend\Publishers\FontAwesomePublisher;
use Tests\Support\TestCase;

/**
 * @internal
 */
final class FontAwesomeTest extends TestCase
{
	public function testFontAwesome()
	{
	    // Partial list of expected files to be published
		$expected = [
			'font-awesome/css/all.min.css',
			'font-awesome/css/svg-with-js.css',
			'font-awesome/webfonts/fa-brands-400.eot',
			'font-awesome/webfonts/fa-solid-900.woff2',
		];

		$publisher = new FontAwesomePublisher();
		$publisher->publish();

		$this->assertSame([], $publisher->getErrors());
		$this->assertNotSame([], $publisher->getPublished());

		foreach ($expected as $path)
		{
			$file = $this->config->directory . $this->config->vendor . $path;
			$this->assertFileExists($file);
		}

		$bundle = new FontAwesomeBundle();

		$this->assertStringContainsString('all.min.css', $bundle->head());
	}
}
