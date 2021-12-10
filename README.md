# Tatter\Frontend

Opinionated suite of frontend tech for CodeIgniter 4

[![](https://github.com/tattersoftware/codeigniter4-frontend/workflows/PHPUnit/badge.svg)](https://github.com/tattersoftware/codeigniter4-frontend/actions/workflows/test.yml)
[![](https://github.com/tattersoftware/codeigniter4-frontend/workflows/PHPStan/badge.svg)](https://github.com/tattersoftware/codeigniter4-frontend/actions/workflows/analyze.yml)
[![](https://github.com/tattersoftware/codeigniter4-frontend/workflows/Deptrac/badge.svg)](https://github.com/tattersoftware/codeigniter4-frontend/actions/workflows/inspect.yml)
[![Coverage Status](https://coveralls.io/repos/github/tattersoftware/codeigniter4-frontend/badge.svg?branch=develop)](https://coveralls.io/github/tattersoftware/codeigniter4-frontend?branch=develop)

## Description

This library leverages [Tatter\Assets](https://github.com/tattersoftware/codeigniter4-assets)
alongside the framework's [Publisher Library](https://codeigniter4.github.io/CodeIgniter4/libraries/publisher.html#)
to automate asset discovery and HTML tag injection for an opinionated selection of frontend solutions.

## Installation

Install easily via Composer to take advantage of CodeIgniter 4's autoloading capabilities
and always be up-to-date:
```bash
composer require tatter/frontend
```

Or, install manually by downloading the source files and adding the directory to
**app/Config/Autoload.php**.

Once the files are downloaded and included in the autoload run the framework's `publish`
command to inject all assets into your front controller path:
```bash
php spark publish
```

## Included Solutions

### Asset Libraries

* [FontAwesome](https://fontawesome.com) - Popular icon set and toolkit for vector icons and social logos
* [jQuery](https://jquery.com) - A fast, small, and feature-rich JavaScript library

### Support Libraries

* [League\CommonMark](https://packagist.org/packages/league/commonmark)
* [Tatter\Assets](https://packagist.org/packages/tatter/assets)
* [Tatter\Menus](https://packagist.org/packages/tatter/menus)
* [Tatter\Themes](https://packagist.org/packages/tatter/themes)

## Configuration

*For full configuration details see the [Assets docs](https://github.com/tattersoftware/codeigniter4-assets).*

Enable the `AssetsFilters` on any "after" routes where you want tags applied. To apply
them everywhere simply add to `$globals`. **app/Config/Filters.php**:
```php
    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
        ],
        'after'  => [
            'assets',
        ],
    ];
```

Then create or edit your `Assets` config file and add each bundle for the routes where you
want them to be applied. **app/Config/Assets.php**:
```php
<?php

namespace Config;

use Tatter\Frontend\Bundles\AdminLTEBundle;
use Tatter\Frontend\Bundles\BootstrapBundle;
use Tatter\Frontend\Bundles\FontAwesomeBundle;

class Assets extends \Tatter\Assets\Config\Assets
{
    public $routes = [
        '*' => [
            BootstrapBundle::class,
            FontAwesomeBundle::class,
        ],
        'admin/*' => [
        	AdminLTEBundle::class,
        	ChartJSBundle::class,
        ],
        'files/upload' => [
        	DropzoneJSBundle::class,
        ]
    ];
}
```

Note that each Bundle includes its dependency (e.g. AdminLTE includes Bootstrap, Bootstrap
includes jQuery), so while there is no harm in repeating assets it is also unnecessary.
This does not extend to optional plugins, e.g. if you want to use FontAwesome in AdminLTE
you will need to include both.

## Versioning

The intent is to maintain two major versions of this library for an indefinite amount of
time until AdminLTE 4 is fully released and stable for production use. The core differences
will be around the dependency stack for AdminLTE, Bootstrap, and jQuery.

| Library version | Bootstrap version  | AdminLTE version  | jQuery |
| --------------: | -----------------: | ----------------: | :----: |
| `1.x`           | `4.x`              | `3.x`             | Yes    |
| `2.x`           | `5.x`              | `4.x`             | No     |
