<?php

namespace Tatter\Frontend\Bundles;

use Tatter\Assets\VendorBundle;

class FontAwesomeBundle extends VendorBundle
{
	/**
	 * Applies any initial inputs after the constructor.
	 *
	 * @return void
	 */
	protected function define(): void
	{
		$this->addPath('font-awesome/css/all.min.css');
	}
}
