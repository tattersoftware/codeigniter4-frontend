<?php

namespace Tatter\Frontend\Bundles;

use CodeIgniter\Publisher\Publisher;
use Tatter\Frontend\FrontendBundle;
use Tests\Support\TestCase;

/**
 * @internal
 */
final class BundlesTest extends TestCase
{
    private $didPublish = false;

    /**
     * Publishes all files once so they are
     * available for bundles.
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Make sure everything is published
        if (! $this->didPublish) {
            foreach (Publisher::discover() as $publisher) {
                $publisher->publish();
            }

            $this->didPublish = true;
        }
    }

    /**
     * @dataProvider bundleProvider
     *
     * @param class-string<FrontendBundle> $class
     * @param string[]                     $expectedHeadFiles
     * @param string[]                     $expectedBodyFiles
     */
    public function testBundlesFiles(string $class, array $expectedHeadFiles, array $expectedBodyFiles): void
    {
        $bundle = new $class();
        $head   = $bundle->head();
        $body   = $bundle->body();

        foreach ($expectedHeadFiles as $file) {
            $this->assertStringContainsString($file, $head);
        }

        foreach ($expectedBodyFiles as $file) {
            $this->assertStringContainsString($file, $body);
        }
    }

    public function bundleProvider()
    {
        return [
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
