<?php

namespace Tatter\Frontend\Publishers;

use Tatter\Assets\VendorPublisher;

class ChartJSPublisher extends VendorPublisher
{
	/**
	 * Destination path relative to AssetsConfig::directory.
	 *
	 * @see FrontendPublisher::__construct()
	 *
	 * @var string
	 */
	protected $path = 'chartjs';

	/**
	 * Reads files from the sources and copies them out to their destinations.
	 * This method should be reimplemented by child classes intended for
	 * discovery.
	 */
	public function publish(): bool
	{
		return $this
		    ->addUri('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js')
		    ->addUri('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.esm.js')
		    ->addUri('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.esm.min.js')
		    ->addUri('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.js')
		    ->addUri('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/helpers.esm.js')
		    ->addUri('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/helpers.esm.min.js')
		    ->copy(true);
	}
}
