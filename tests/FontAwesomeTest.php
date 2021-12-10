<?php

use Tatter\Frontend\Bundles\FontAwesomeBundle;
use Tatter\Frontend\Publishers\FontAwesomePublisher;
use Tests\Support\TestCase;

/**
 * @internal
 */
final class FontAwesomeTest extends TestCase
{
    public function testPublisher()
    {
        // Partial list of expected files to be published
        $expected = [
            'font-awesome/css/all.min.css',
            'font-awesome/css/svg-with-js.css',
            'font-awesome/webfonts/fa-brands-400.eot',
            'font-awesome/webfonts/fa-solid-900.woff2',
        ];

        $this->assertPublishesFiles(FontAwesomePublisher::class, $expected);
    }

    public function testBundle()
    {
        // Partial lists of expected files to be bundled
        $head = [
            'all.min.css',
        ];
        $body = [];

        $this->assertBundlesFiles(FontAwesomeBundle::class, $head, $body);
    }
}
