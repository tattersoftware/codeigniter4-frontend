<?php

namespace Tatter\Frontend\Publishers;

use Tatter\Frontend\FrontendPublisher;
use Tests\Support\TestCase;

/**
 * @internal
 */
final class PublishersTest extends TestCase
{
    /**
     * @dataProvider publisherProvider
     *
     * @param class-string<FrontendPublisher> $class
     * @param string[]                        $expected
     */
    public function testPublishesFiles(string $class, array $expected): void
    {
        $publisher = new $class();
        $result    = $publisher->publish();

        // Verify that publication succeeded
        $this->assertTrue($result);
        $this->assertSame([], $publisher->getErrors());
        $this->assertNotSame([], $publisher->getPublished());

        // Check for each of the expected files
        foreach ($expected as $path) {
            $file = $this->config->directory . $this->config->vendor . $path;
            $this->assertFileExists($file);
        }
    }

    public function publisherProvider()
    {
        return [
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
                    'datatables/js/jquery.dataTables.js',
                    'datatables/types/types.d.ts',
                ],
            ],
            [
                DataTablesStylePublisher::class,
                [
                    'datatables/css/dataTables.bootstrap4.min.css',
                    'datatables/images/sort_asc_disabled.png',
                    'datatables/js/dataTables.bootstrap4.js',
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
            [
                JQueryPublisher::class,
                [
                    'jquery/jquery.min.js',
                ],
            ],
        ];
    }
}
