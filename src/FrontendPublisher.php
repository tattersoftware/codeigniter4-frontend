<?php

namespace Tatter\Frontend;

use CodeIgniter\Publisher\Publisher;
use DomainException;

abstract class FrontendPublisher extends Publisher
{
	/**
	 * Destination path relative to AssetsConfig::directory.
	 * Must be set by child classes.
	 *
	 * @var string
	 */
	protected $path;

	/**
	 * Set the real destination.
	 *
	 * @param string|null $source
	 * @param string|null $destination
	 */
	public function __construct(string $source = null, string $destination = null)
	{
		if (! is_string($this->path))
		{
			throw new DomainException('Invalid relative destination $path.');
		}

		$this->destination = rtrim(config('Assets')->directory, '/ ') . '/' . trim($this->path, '/ ') . '/';

		if (! is_dir($this->destination))
		{
			mkdir($this->destination, 0775);
		}

		parent::__construct($source, $destination);
	}
}
