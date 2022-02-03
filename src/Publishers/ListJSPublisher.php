<?php

namespace Tatter\Frontend\Publishers;

use Tatter\Frontend\FrontendPublisher;

class ListJSPublisher extends FrontendPublisher
{
    protected string $vendorPath = 'npm-asset/list.js/dist';
    protected string $publicPath = 'font-listjs';
}
