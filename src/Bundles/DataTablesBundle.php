<?php

namespace Tatter\Frontend\Bundles;

use Tatter\Frontend\FrontendBundle;

class DataTablesBundle extends FrontendBundle
{
    /**
     * Applies any initial inputs after the constructor.
     */
    protected function define(): void
    {
        $this
            ->addPath('datatables/js/jquery.dataTables.min.js')
            ->addPath('datatables/js/dataTables.bootstrap4.min.js')
            ->addPath('datatables/css/dataTables.bootstrap4.min.css')
            ->merge(new BootstrapBundle());
    }
}
