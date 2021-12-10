<?php

namespace Tatter\Frontend\Publishers;

use Tatter\Frontend\FrontendPublisher;

class BootstrapPublisher extends FrontendPublisher
{
    protected $source = 'vendor/twbs/bootstrap/dist';
    protected $path   = 'bootstrap';
}
