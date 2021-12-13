<?php

namespace Tatter\Frontend\Bundles;

use Tatter\Frontend\FrontendBundle;

class ListJSBundle extends FrontendBundle
{
    /**
     * Applies any initial inputs after the constructor.
     */
    protected function define(): void
    {
        $this->addPath('listjs/list.min.js');
    }
}
