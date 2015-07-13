<?php

namespace Paraunit\Process;

use Symfony\Component\Console\Formatter\OutputFormatterStyle;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

/**
 * Class SymfonyProcessWrapper
 * @package Paraunit\Process
 */
class SymfonyProcessWrapper extends ParaunitProcessAbstract
{

    /**
     * @var Process
     */
    protected $process;


    /**
     * @param $commandLine
     */
    function __construct($commandLine)
    {
        parent::__construct($commandLine);
        $this->process = new Process($commandLine);
    }

    /**
     * @return bool
     */
    public function isTerminated()
    {
        return $this->process->isTerminated();
    }

    /**
     *
     */
    public function start()
    {
        $this->process->start();
    }

    /**
     * @return mixed
     */
    public function getOutput()
    {
        return $this->process->getOutput();
    }

    /**
     * @return mixed
     */
    public function getExitCode()
    {
        return $this->process->getExitCode();
    }

    /**
     * @return $this
     */
    public function restart()
    {
        $this->reset()->start();

        return $this;

    }

    /**
     * @return $this
     */
    public function reset()
    {
        // RESET DELLO STATO
        parent::reset();

        $this->process = new Process($this->process->getCommandLine());

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommandLine()
    {
        return $this->process->getCommandLine();
    }

    /**
     * @return mixed
     */
    public function isRunning()
    {
        return $this->process->isRunning();
    }


}