<?php

namespace Tatter\Frontend\Publishers;

use Tatter\Frontend\FrontendPublisher;

class AdminLTEPublisher extends FrontendPublisher
{
    protected $source = 'vendor/mgatner/adminlte4/dist';
    protected $path   = 'adminlte';

    public function publish(): bool
    {
        return $this
            ->addPath('assets/img')
            ->addPath('css')
            ->addPath('js')
            ->merge(true);
    }
}
