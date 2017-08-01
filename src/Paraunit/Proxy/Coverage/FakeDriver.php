<?php
declare(strict_types=1);

namespace Paraunit\Proxy\Coverage;

use SebastianBergmann\CodeCoverage\Driver\Driver;

/**
 * Class FakeDriver
 * @package Paraunit\Proxy\Coverage
 */
class FakeDriver implements Driver
{
    public function start($determineUnusedAndDead = true)
    {
        throw new \RuntimeException('This is a fake implementation, it shouldn\'t be used!');
    }

    public function stop()
    {
        throw new \RuntimeException('This is a fake implementation, it shouldn\'t be used!');
    }
}