<?php

namespace Tatter\Frontend\Bundles;

use Tatter\Assets\Test\BundlesTestCase;

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
                    'adminlte.css',
                    'bootstrap.min.css',
                ],
                [
                    'adminlte.js',
                    'bootstrap.bundle.min.js',
                ],
            ],
            [
                BootstrapBundle::class,
                [
                    'bootstrap.min.css',
                ],
                [
                    'bootstrap.bundle.min.js',
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
                ListJSBundle::class,
                [],
                [
                    'list.min.js',
                ],
            ],
        ];
    }
}
