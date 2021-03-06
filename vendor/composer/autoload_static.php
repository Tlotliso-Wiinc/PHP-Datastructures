<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5f956e6e686eadd8dcd9b4570c1ab574
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Trees\\' => 6,
        ),
        'O' => 
        array (
            'OrderedStructures\\' => 18,
        ),
        'M' => 
        array (
            'Maps\\' => 5,
        ),
        'L' => 
        array (
            'LinkedLists\\' => 12,
            'LinearStructures\\' => 17,
        ),
        'I' => 
        array (
            'Interfaces\\' => 11,
        ),
        'G' => 
        array (
            'Graphs\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Trees\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Trees',
        ),
        'OrderedStructures\\' => 
        array (
            0 => __DIR__ . '/../..' . '/OrderedStructures',
        ),
        'Maps\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Maps',
        ),
        'LinkedLists\\' => 
        array (
            0 => __DIR__ . '/../..' . '/LinkedLists',
        ),
        'LinearStructures\\' => 
        array (
            0 => __DIR__ . '/../..' . '/LinearStructures',
        ),
        'Interfaces\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Interfaces',
        ),
        'Graphs\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Graphs',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5f956e6e686eadd8dcd9b4570c1ab574::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5f956e6e686eadd8dcd9b4570c1ab574::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
