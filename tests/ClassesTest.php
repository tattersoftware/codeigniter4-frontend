<?php

use Tatter\Frontend\Bundles\ChartJSBundle;
use Tatter\Frontend\Bundles\DropzoneJSBundle;
use Tatter\Frontend\Bundles\FontAwesomeBundle;
use Tatter\Frontend\Publishers\ChartJSPublisher;
use Tatter\Frontend\Publishers\DropzoneJSPublisher;
use Tatter\Frontend\Publishers\FontAwesomePublisher;
use Tests\Support\TestCase;

/**
 * Verifies that the Publishers and Bundles behave as expected.
 *
 * @internal
 */
final class ClassesTest extends TestCase
{
	/**
	 * @param string[] $paths
	 * @param string[] $files
	 *
	 * @dataProvider inputProvider
	 */
	public function testPublish(string $publisher, array $paths, string $bundle, array $files)
	{
		$publisher = new $publisher();
		$publisher->publish();

		$this->assertSame([], $publisher->getErrors());
		$this->assertNotSame([], $publisher->getPublished());

		foreach ($paths as $path)
		{
			$file = $this->root->url() . '/vendor/' . $path;
			$this->assertFileExists($file);
		}

		$bundle = new $bundle();
		$output = (string) $bundle;

		foreach ($files as $file) {
			$this->assertStringContainsString($file, $output);
		}
	}

	public function inputProvider(): array
	{
		return [
			[
				ChartJSPublisher::class,
				[
					'chartjs/chart.min.js',
					'chartjs/chart.js',
					'chartjs/helpers.esm.min.js',
				],
				ChartJSBundle::class,
				[
					'chart.min.js',
				],
			],
			[
				DropzoneJSPublisher::class,
				[
					'dropzone/basic.min.css',
					'dropzone/dropzone.css',
					'dropzone/dropzone.min.js',
				],
				DropzoneJSBundle::class,
				[
					'dropzone/dropzone.min.css',
					'dropzone/dropzone.min.js',
				],
			],
			[
				FontAwesomePublisher::class,
				[
					'font-awesome/css/all.min.css',
					'font-awesome/css/svg-with-js.css',
					'font-awesome/webfonts/fa-brands-400.eot',
					'font-awesome/webfonts/fa-solid-900.woff2',
				],
				FontAwesomeBundle::class,
				[
					'font-awesome/css/all.min.css',
				],
			],
		];
	}
}
