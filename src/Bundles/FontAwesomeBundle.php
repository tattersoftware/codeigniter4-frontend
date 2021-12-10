<?php

namespace Tatter\Frontend\Bundles;

use Tatter\Frontend\FrontendBundle;

class FontAwesomeBundle extends FrontendBundle
{
    /**
     * Applies any initial inputs after the constructor.
     */
    protected function define(): void
    {
        $this->addPath('font-awesome/css/all.min.css');
    }
}
