<?php

namespace Tatter\Frontend\Publishers;

use Tests\Support\FrontendTestCase;
use Tests\Support\VfsTrait;

/**
 * Verifies that the Publishers perform their expected actions.
 */
final class PublishersTest extends FrontendTestCase
{
	use VfsTrait;

	/**
	 * @param string $class
	 * @param string[] $paths
	 *
	 * @dataProvider publishersProvider
	 */
	public function testPublish(string $class, array $paths)
	{
		$publisher = new $class();
		$publisher->publish();

		$this->assertSame([], $publisher->getErrors());
		$this->assertNotSame([], $publisher->getPublished());

		foreach ($paths as $path)
		{
			$file = $this->root->url() . '/vendor/' . $path;
			$this->assertFileExists($file);
		}
		$this->assertNull(null);
	}

	/**
	 * @return array
	 */
	public function publishersProvider(): array
	{
		return [
			[
				ChartJSPublisher::class,
				[
					'chartjs/chart.min.js',
					'chartjs/chart.js',
					'chartjs/helpers.esm.min.js',
				],
			],
			[
				DropzoneJSPublisher::class,
				[
					'dropzone/basic.min.css',
					'dropzone/dropzone.css',
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
			],
		];
	}
}
