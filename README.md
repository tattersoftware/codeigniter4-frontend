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

### Bootstrap and Versioning

This dependency stack includes Bootstrap support for both versions 4 and 5. By default
Composer will select the highest available version but it is a good idea to lock to one by
requiring `twbs/bootstrap` with an explicit version:
* Version 4: `composer require twbs/bootstrap:^4.0`
* Version 5: `composer require twbs/bootstrap:^5.0`

AdminLTE and other Bootstrap-specific libraries will adjust accordingly.

## Included Solutions

### Asset Libraries

* [AdminLTE](https://adminlte.io) (via [Tatter\AdminLTE](https://packagist.org/packages/tatter/adminlte)) - Admin Dashboard Template
* [Bootstrap](https://getbootstrap.com) (via [Tatter\Bootstrap](https://packagist.org/packages/tatter/bootstrap))  - Mobile-first front-end CSS framework directed at responsive web development
* [ChartJS](https://www.chartjs.org) - Simple yet flexible JavaScript charting for designers & developers
* [DataTables](https://datatables.net) - To enhance the accessibility of data in HTML tables
* [Dropzone](https://www.dropzonejs.com) - Open source library for drag’n’drop file uploads with image previews
* [FontAwesome](https://fontawesome.com) - Popular icon set and toolkit for vector icons and social logos

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

use Tatter\AdminLTE\Bundles\AdminLTEBundle;
use Tatter\Bootstrap\Bundles\BootstrapBundle;
use Tatter\Frontend\Bundles\ChartJSBundle;
use Tatter\Frontend\Bundles\DropzoneJSBundle;
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
