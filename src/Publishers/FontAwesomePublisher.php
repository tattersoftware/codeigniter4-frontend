<?php

namespace Tatter\Frontend\Publishers;

use Tatter\Frontend\FrontendPublisher;

class FontAwesomePublisher extends FrontendPublisher
{
    protected string $vendorPath = 'fortawesome/font-awesome';
    protected string $publicPath = 'font-awesome';

    /**
     * Reads files from the sources and copies them out to their destinations.
     * This method should be reimplemented by child classes intended for
     * discovery.
     */
    public function publish(): bool
    {
        return $this
            ->addPath('css')
            ->addPath('webfonts')
            ->merge(true);
    }
}
