<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6afbce5c8c7078002ccac7bbcce5cc19
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6afbce5c8c7078002ccac7bbcce5cc19::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6afbce5c8c7078002ccac7bbcce5cc19::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
