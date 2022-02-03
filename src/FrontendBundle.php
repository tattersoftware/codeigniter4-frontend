<?php

namespace Tatter\Frontend;

use Tatter\Assets\Asset;
use Tatter\Assets\Bundle;

/**
 * Frontend Bundle Abstract Class
 *
 * A bundle of Assets specifically sourced from
 * third-party files published to the configured
 * "vendor" path (see Assets Config) and used in
 * conjunction with FrontendPublisher.
 */
abstract class FrontendBundle extends Bundle
{
    /**
     * The base directory, i.e. Assets directory + vendor path
     */
    private static ?string $base = null;

    /**
     * Returns the base path according to the configurations.
     */
    public static function base(): string
    {
        if (self::$base === null) {
            $config     = Asset::config();
            self::$base = $config->directory . $config->vendor;
        }

        return self::$base;
    }

    /**
     * Adds an Asset by its vendor path, i.e. relative to base().
     *
     * @return $this
     */
    final public function addPath(string $path)
    {
        $this->add(Asset::createFromPath(Asset::config()->vendor . trim($path, DIRECTORY_SEPARATOR)));

        return $this;
    }
}
