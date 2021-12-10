<?php

namespace Tatter\Frontend\Bundles;

use Tatter\Assets\Asset;
use Tatter\Frontend\FrontendBundle;

class JQueryBundle extends FrontendBundle
{
    protected function define(): void
    {
        // JQuery needs to load early so we create the Asset then move it to the head tag
        $asset = Asset::createFromPath(Asset::config()->vendor . 'jquery/jquery.min.js');

        $this->add(new Asset($asset, true));
    }
}
