<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit19b121f02b8726d5d8f6b25e64b2e128
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Invoidea\\Categorymodule\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Invoidea\\Categorymodule\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit19b121f02b8726d5d8f6b25e64b2e128::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit19b121f02b8726d5d8f6b25e64b2e128::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit19b121f02b8726d5d8f6b25e64b2e128::$classMap;

        }, null, ClassLoader::class);
    }
}
