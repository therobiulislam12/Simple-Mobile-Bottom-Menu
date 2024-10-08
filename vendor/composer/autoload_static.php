<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd8b2cdabc3dd6064ba86beef3aabfbe3
{
    public static $files = array (
        '06dbe268fc03782f82989f8dfe6dd054' => __DIR__ . '/../..' . '/includes/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Mobile\\Menu\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Mobile\\Menu\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd8b2cdabc3dd6064ba86beef3aabfbe3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd8b2cdabc3dd6064ba86beef3aabfbe3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd8b2cdabc3dd6064ba86beef3aabfbe3::$classMap;

        }, null, ClassLoader::class);
    }
}
