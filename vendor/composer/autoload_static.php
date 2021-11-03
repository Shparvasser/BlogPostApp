<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitae0829b3d09c5cac2772b254d6a67b60
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitae0829b3d09c5cac2772b254d6a67b60::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitae0829b3d09c5cac2772b254d6a67b60::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitae0829b3d09c5cac2772b254d6a67b60::$classMap;

        }, null, ClassLoader::class);
    }
}