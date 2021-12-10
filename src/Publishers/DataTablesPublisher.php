<?php

namespace Tatter\Frontend\Publishers;

use Tatter\Frontend\FrontendPublisher;

class DataTablesPublisher extends FrontendPublisher
{
    protected $source = 'vendor/datatables.net/datatables.net';
    protected $path   = 'datatables';

    /**
     * Reads files from the sources and copies them out to their destinations.
     * This method should be reimplemented by child classes intended for
     * discovery.
     */
    public function publish(): bool
    {
        return $this
            ->addPath('js')
            ->addPath('types')
            ->merge(true);
    }
}
