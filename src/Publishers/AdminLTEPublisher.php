<?php

namespace Tatter\Frontend\Publishers;

use Tatter\Frontend\FrontendPublisher;

class AdminLTEPublisher extends FrontendPublisher
{
    protected string $vendorPath = 'almasaeed2010/adminlte/dist';
    protected string $publicPath = 'adminlte';

    public function publish(): bool
    {
        return $this
            ->addPath('assets/img')
            ->addPath('css')
            ->addPath('js')
            ->merge(true);
    }
}
