<?php

namespace Tatter\Frontend\Bundles;

use CodeIgniter\Files\Exceptions\FileNotFoundException;
use Tatter\Frontend\FrontendBundle;

class DataTablesBundle extends FrontendBundle
{
    /**
     * Applies any initial inputs after the constructor.
     */
    protected function define(): void
    {
        try {
            $this->addPath('datatables/js/jquery.dataTables.min.js');
        } catch (FileNotFoundException) {
            // this seems to have been removed in some DataTables release
        }

        $this
            ->addPath('datatables/js/dataTables.bootstrap4.min.js')
            ->addPath('datatables/css/dataTables.bootstrap4.min.css')
            ->merge(new BootstrapBundle());
    }
}
