<?php

namespace Tatter\Frontend\Bundles;

use Tatter\Frontend\Test\BundlesTestCase;

/**
 * @internal
 */
final class BundlesTest extends BundlesTestCase
{
    public function bundleProvider(): array
    {
        return [
            [
                AdminLTEBundle::class,
                [
                    'adminlte.min.css',
                    'bootstrap.min.css',
                    'jquery.min.js',
                ],
                [
                    'adminlte.min.js',
                ],
            ],
            [
                BootstrapBundle::class,
                [
                    'bootstrap.min.css',
                    'jquery.min.js',
                ],
                [
                    'bootstrap.bundle.min.js',
                ],
            ],
            [
                DataTablesBundle::class,
                [
                    'bootstrap.min.css',
                    'jquery.min.js',
                ],
                [
                    'bootstrap.bundle.min.js',
                    'dataTables.bootstrap4.min.js',
                    'jquery.dataTables.min.js',
                ],
            ],
            [
                FontAwesomeBundle::class,
                [
                    'all.min.css',
                ],
                [],
            ],
            [
                JQueryBundle::class,
                [
                    'jquery.min.js', // Note that unlike most JS files this goes in <head>
                ],
                [],
            ],
        ];
    }
}
