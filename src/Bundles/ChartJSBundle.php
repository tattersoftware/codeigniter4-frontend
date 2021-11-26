<?php

namespace Tatter\Frontend\Bundles;

use Tatter\Assets\VendorBundle;

class ChartJSBundle extends VendorBundle
{
	/**
	 * Applies any initial inputs after the constructor.
	 *
	 * @return void
	 */
	protected function define(): void
	{
		$this->addPath('chartjs/chart.min.js');
	}
}
