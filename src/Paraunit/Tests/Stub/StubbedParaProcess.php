<?php

namespace Paraunit\Tests\Stub;


use Paraunit\Process\ParaunitProcessAbstract;

class StubbedParaProcess extends ParaunitProcessAbstract
{
    /**
     * @var string
     */
    protected $output;

    /**
     * @var string
     */
    protected $commandLine;

    /**
     * @var int
     */
    protected $exitCode = 0;

    /**
     * @var bool
     */
    protected $isToBeRetried;

    function __construct($commandLine = 'testCommandLine')
    {
        $this->commandLine = $commandLine;

        $this->testResults = [];
        $this->segmentationFaults = [];
        $this->unknownStatus = [];
        $this->fatalErrors = [];
        $this->errors = [];
        $this->failures = [];
    }

    /**
     * @return boolean
     */
    public function isToBeRetried()
    {
        return $this->isToBeRetried;
    }

    /**
     * @param boolean $isToBeRetried
     */
    public function setIsToBeRetried($isToBeRetried)
    {
        $this->isToBeRetried = $isToBeRetried;
    }

    /**
     * @return string
     */
    public function getCommandLine()
    {
        return $this->commandLine;
    }

    /**
     * @param string $output
     */
    public function setOutput($output)
    {
        $this->output = $output;
    }

    /**
     * @param int $exitCode
     */
    public function setExitCode($exitCode)
    {
        $this->exitCode = $exitCode;
    }

    /**
     * @return string
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * @return bool
     */
    public function isTerminated()
    {
        return true;
    }

    /**
     * @return mixed
     */
    public function start()
    {
        return;
    }

    /**
     * @return $this
     */
    public function restart()
    {
        return;
    }

    /**
     * @return bool
     */
    public function isRunning()
    {
        return false;
    }

    /**
     * @return int
     */
    public function getExitCode()
    {
        return $this->exitCode;
    }
}