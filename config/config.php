<?php

$dir = [
    __DIR__ . '/../app/Models',
    __DIR__ . '/../app/Http',
    __DIR__ . '/../app/Console',
    __DIR__ . '/../database'
];

$iterator = Symfony\Component\Finder\Finder::create()
    ->files()
    ->name('*.php')
    ->exclude('Middleware')
    ->exclude('Requests')
    ->exclude('Commands')
    ->in($dir);

$options = [
    'theme'     => 'default',
    'title'     => 'PRC Documentação',
    'build_dir' => __DIR__ . '/../docs',
    'cache_dir' => __DIR__ . '/../storage/framework/cache',
];

$sami = new Sami\Sami($iterator, $options);

return $sami;