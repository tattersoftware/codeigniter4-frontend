<?php

use CodeIgniter\CodingStandard\CodeIgniter4;
use Nexus\CsConfig\Factory;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->files()
    ->in([
        __DIR__ . '/src/',
        __DIR__ . '/tests/',
    ])
    ->exclude([
        'build',
        'Views',
    ])
    ->append([
        __FILE__,
        __DIR__ . '/rector.php',
    ]);

$overrides = [
    'php_unit_data_provider_name'        => false,
    'php_unit_data_provider_return_type' => false,
    'php_unit_data_provider_static'      => false,
    // 'declare_strict_types' => true,
    // 'void_return'          => true,
];

$options = [
    'finder'    => $finder,
    'cacheFile' => 'build/.php-cs-fixer.cache',
];

return Factory::create(new CodeIgniter4(), $overrides, $options)->forProjects();
