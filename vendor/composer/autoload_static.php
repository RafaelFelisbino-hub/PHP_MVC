<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitab8b00d8a681e33d0cde8e5a43e875e2
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitab8b00d8a681e33d0cde8e5a43e875e2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitab8b00d8a681e33d0cde8e5a43e875e2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitab8b00d8a681e33d0cde8e5a43e875e2::$classMap;

        }, null, ClassLoader::class);
    }
}
