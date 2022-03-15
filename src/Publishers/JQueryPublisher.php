<?php

namespace Tatter\Frontend\Publishers;

use Tatter\Frontend\FrontendPublisher;

class JQueryPublisher extends FrontendPublisher
{
    protected string $vendorPath = 'components/jquery';
    protected string $publicPath = 'jquery';

    /**
     * Reads files from the sources and copies them out to their destinations.
     * This method should be reimplemented by child classes intended for
     * discovery.
     */
    public function publish(): bool
    {
        return $this
            ->addPath('/')
            ->removePattern('*.md')
            ->merge(true);
    }
}
