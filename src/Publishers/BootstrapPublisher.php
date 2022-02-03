<?php

namespace Tatter\Frontend\Publishers;

use Tatter\Frontend\FrontendPublisher;

class BootstrapPublisher extends FrontendPublisher
{
    protected string $vendorPath = 'twbs/bootstrap/dist';
    protected string $publicPath = 'bootstrap';
}
