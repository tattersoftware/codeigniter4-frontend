<?php

namespace Tatter\Frontend\Bundles;

use Tatter\Frontend\FrontendBundle;

class AdminLTEBundle extends FrontendBundle
{
    /**
     * Applies any initial inputs after the constructor.
     */
    protected function define(): void
    {
        $this
            ->addPath('adminlte/css/adminlte.css')
            ->addPath('adminlte/js/adminlte.js')
            ->merge(new BootstrapBundle());
    }
}
