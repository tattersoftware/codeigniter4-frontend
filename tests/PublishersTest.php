<?php

namespace Tatter\Frontend\Publishers;

use Tatter\Frontend\Test\PublishersTestCase;

/**
 * @internal
 */
final class PublishersTest extends PublishersTestCase
{
    public function publisherProvider(): array
    {
        return [
            [
                AdminLTEPublisher::class,
                [
                    'adminlte/assets/img/AdminLTELogo.png',
                    'adminlte/css/adminlte.css',
                    'adminlte/js/adminlte.js',
                ],
            ],
            [
                BootstrapPublisher::class,
                [
                    'bootstrap/css/bootstrap.css',
                    'bootstrap/css/bootstrap.min.css.map',
                    'bootstrap/js/bootstrap.bundle.js',
                    'bootstrap/js/bootstrap.min.js.map',
                ],
            ],
            [
                FontAwesomePublisher::class,
                [
                    'font-awesome/css/all.min.css',
                    'font-awesome/css/svg-with-js.css',
                    'font-awesome/webfonts/fa-brands-400.eot',
                    'font-awesome/webfonts/fa-solid-900.woff2',
                ],
            ],
        ];
    }
}
