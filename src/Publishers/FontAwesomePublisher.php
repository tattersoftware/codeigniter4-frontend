<?php

namespace Tatter\Frontend\Publishers;

use Tatter\Assets\VendorPublisher;

class FontAwesomePublisher extends VendorPublisher
{
	/**
	 * @var string
	 */
	protected $source = 'vendor/fortawesome/font-awesome';

	/**
	 * Destination path relative to AssetsConfig::directory.
	 *
	 * @see FrontendPublisher::__construct()
	 *
	 * @var string
	 */
	protected $path = 'font-awesome';

	/**
	 * Reads files from the sources and copies them out to their destinations.
	 * This method should be reimplemented by child classes intended for
	 * discovery.
	 */
	public function publish(): bool
	{
		return $this
		    ->addPath('css')
		    ->addPath('webfonts')
		    ->merge(true);
	}
}
