<?php

namespace Tatter\Frontend\Publishers;

use Tatter\Frontend\FrontendPublisher;

class BootstrapPublisher extends FrontendPublisher
{
	/**
	 * @var string
	 */
	protected $source = 'vendor/twbs/bootstrap/dist';

	/**
	 * Destination path relative to AssetsConfig::directory.
	 *
	 * @see FrontendPublisher::__construct()
	 *
	 * @var string
	 */
	protected $path = 'bootstrap';
}
