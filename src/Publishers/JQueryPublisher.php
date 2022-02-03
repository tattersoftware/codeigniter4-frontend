<?php

namespace Tatter\Frontend\Publishers;

use Tatter\Frontend\FrontendPublisher;

class JQueryPublisher extends FrontendPublisher
{
    protected string $vendorPath = 'components/jquery';
    protected string $publicPath = 'jquery';
}
