<?php

namespace Tatter\Frontend\Publishers;

use Tatter\Frontend\FrontendPublisher;

class DataTablesStylePublisher extends FrontendPublisher
{
    protected string $vendorPath = 'datatables.net/datatables.net-bs4';
    protected string $publicPath = 'datatables';

    /**
     * Reads files from the sources and copies them out to their destinations.
     * This method should be reimplemented by child classes intended for
     * discovery.
     */
    public function publish(): bool
    {
        return $this
            ->addPath('css')
            ->addPath('js')
            ->addPath('types')
            ->removePattern('*.ts')
            ->removePattern('*.mjs')
            ->merge(true);
    }
}
