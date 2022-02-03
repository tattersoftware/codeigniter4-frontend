<?php

namespace Tatter\Frontend;

use CodeIgniter\Publisher\Publisher;
use DomainException;

/**
 * Frontend Publisher Abstract Class
 *
 * A Publisher wrapper for Assets sourced from
 * third-party files to be published to the configured
 * "vendor" path (see Assets Config) and used in
 * conjunction with FrontendBundle.
 */
abstract class FrontendPublisher extends Publisher
{
    /**
     * Destination path relative to AssetsConfig::directory.
     * Must be set by child classes.
     */
    protected string $path = '';

    /**
     * Set the real destination.
     */
    public function __construct(?string $source = null, ?string $destination = null)
    {
        if ($this->path === '') {
            throw new DomainException('Invalid relative destination $path.');
        }

        $this->destination = FrontendBundle::base() . ltrim($this->path, '\\/');

        if (! is_dir($this->destination)) {
            mkdir($this->destination, 0775, true);
        }

        parent::__construct($source, $destination);
    }
}
