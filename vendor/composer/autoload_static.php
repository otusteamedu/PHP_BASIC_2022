<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0171f1ecd9a457b1d2ff1d89d198b7fa
{
    public static $files = array (
        'e11e8057879e365ee8081c57ea842813' => __DIR__ . '/../..' . '/conn/dbconn.php',
        '5d80ba682afba25d348d62676196765b' => __DIR__ . '/../..' . '/src/functions.php',
        'da5403ba197c7638df37953b504c7bab' => __DIR__ . '/../..' . '/db/selectImage.php',
        '42367e5a9918566b4e083c9beeaf7aac' => __DIR__ . '/../..' . '/db/queryBook.php',
        'ab7dda99eae1c1945d1c6cc5b04002df' => __DIR__ . '/../..' . '/src/dir.php',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit0171f1ecd9a457b1d2ff1d89d198b7fa::$classMap;

        }, null, ClassLoader::class);
    }
}
