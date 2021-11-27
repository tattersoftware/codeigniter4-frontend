<?php

namespace Tatter\Frontend\Bundles;

use Tatter\Assets\VendorBundle;

class DropzoneJSBundle extends VendorBundle
{
	/**
	 * Applies any initial inputs after the constructor.
	 */
	protected function define(): void
	{
		$this
		    ->addPath('dropzone/dropzone.min.css')
		    ->addPath('dropzone/dropzone.min.js');
	}
}
