<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc0d1aa8be3287fac193f6c1a14780f4c
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Inc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc0d1aa8be3287fac193f6c1a14780f4c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc0d1aa8be3287fac193f6c1a14780f4c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}