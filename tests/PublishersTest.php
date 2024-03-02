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
                    'adminlte/css/adminlte.css',
                    'adminlte/img/AdminLTELogo.png',
                    'adminlte/js/adminlte.js',
                    'adminlte/js/adminlte.min.js.map',
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
                DataTablesPublisher::class,
                [
                    'datatables/js/dataTables.min.js',
                ],
            ],
            [
                DataTablesStylePublisher::class,
                [
                    'datatables/css/dataTables.bootstrap4.min.css',
                    'datatables/js/dataTables.bootstrap4.js',
                ],
            ],
            [
                FontAwesomePublisher::class,
                [
                    'font-awesome/css/all.min.css',
                    'font-awesome/css/svg-with-js.css',
                    'font-awesome/webfonts/fa-brands-400.ttf',
                    'font-awesome/webfonts/fa-solid-900.woff2',
                ],
            ],
            [
                JQueryPublisher::class,
                [
                    'jquery/jquery.min.js',
                ],
            ],
        ];
    }
}
