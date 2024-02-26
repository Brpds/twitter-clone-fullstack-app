<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit99d5594549c4b01e33bad6afae5a1dd1
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MF\\' => 3,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MF\\' => 
        array (
            0 => __DIR__ . '/..' . '/MF',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit99d5594549c4b01e33bad6afae5a1dd1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit99d5594549c4b01e33bad6afae5a1dd1::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}