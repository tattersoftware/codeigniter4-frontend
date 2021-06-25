<?php

namespace Tatter\Frontend\Publishers;

use Tatter\Frontend\FrontendPublisher;

class AdminLTEPublisher extends FrontendPublisher
{
	/**
	 * @var string
	 */
	protected $source = 'vendor/mgatner/adminlte4/dist';

	/**
	 * Destination path relative to AssetsConfig::directory.
	 *
	 * @see FrontendPublisher::__construct()
	 *
	 * @var string
	 */
	protected $path = 'adminlte';

	/**
	 * Reads files from the sources and copies them out to their destinations.
	 * This method should be reimplemented by child classes intended for
	 * discovery.
	 *
	 * @return boolean
	 *
	 * @throws RuntimeException
	 */
	public function publish(): bool
	{
		return $this
			->addPath('css')
			->addPath('js')
			->merge(true);
	}
}
