<?php

namespace Paraunit\Runner;

use Paraunit\Configuration\EnvVariables;
use Paraunit\Lifecycle\ProcessEvent;
use Paraunit\Process\AbstractParaunitProcess;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class Pipeline
 * @package Paraunit\Runner
 */
class Pipeline
{
    /** @var EventDispatcherInterface */
    private $dispatcher;

    /** @var AbstractParaunitProcess */
    private $process;

    /** @var int */
    private $number;

    /**
     * Pipeline constructor.
     * @param EventDispatcherInterface $dispatcher
     * @param int $number
     */
    public function __construct(EventDispatcherInterface $dispatcher, int $number)
    {
        $this->dispatcher = $dispatcher;
        $this->number = $number;
    }

    public function execute(AbstractParaunitProcess $process)
    {
        if (! $this->isFree()) {
            throw new \RuntimeException('This pipeline is not free');
        }

        $this->process = $process;
        $this->process->start([
            EnvVariables::PIPELINE_NUMBER => $this->number,
        ]);
    }

    public function isFree(): bool
    {
        return $this->process === null;
    }

    /**
     * @return bool
     */
    public function isTerminated(): bool
    {
        if ($this->isFree()) {
            return true;
        }

        if ($this->process->isTerminated()) {
            $this->handleProcessTermination();

            return true;
        }

        return false;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    private function handleProcessTermination()
    {
        $this->dispatcher->dispatch(ProcessEvent::PROCESS_TERMINATED, new ProcessEvent($this->process));
        $this->process = null;
    }
}
