<?php

namespace Tatter\Frontend\Bundles;

use Tatter\Frontend\FrontendBundle;

class BootstrapBundle extends FrontendBundle
{
    public const VERSION = 5;

    /**
     * Applies any initial inputs after the constructor.
     */
    protected function define(): void
    {
        $this
            ->addPath('bootstrap/css/bootstrap.min.css')
            ->addPath('bootstrap/js/bootstrap.bundle.min.js');
    }
}
