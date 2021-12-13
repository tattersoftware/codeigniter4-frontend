<?php

namespace Tatter\Frontend\Publishers;

use Tatter\Frontend\FrontendPublisher;

class ListJSPublisher extends FrontendPublisher
{
    protected $source = 'vendor/npm-asset/list.js/dist';
    protected $path   = 'listjs';
}
