<?php

namespace Paraunit\Configuration;

/**
 * Class PhpCodeCoverageCompat
 * @package Paraunit\Configuration
 */
class PhpCodeCoverageCompat
{
    private static $map = array(
        '\\PHP_CodeCoverage' => 'SebastianBergmann\\CodeCoverage\\CodeCoverage',
    );

    /**
     * This function does a polyfill for the PHP_CodeCoverage package, because before 4.0 it doesn't use namespaces;
     * it also does a reverse-polyfill, since the coverage results may be generated by an older version
     */
    public static function load()
    {
        foreach (self::$map as $oldName => $newName) {
            self::loadIfNotPresent($oldName, $newName);
            self::loadIfNotPresent($newName, $oldName);
        }
    }

    /**
     * @param string $class
     * @param string $alias
     */
    private static function loadIfNotPresent($class, $alias)
    {
        if (! class_exists($alias)) {
            class_alias($class, $alias);
        }
    }
}
