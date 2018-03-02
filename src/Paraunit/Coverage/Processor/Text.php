<?php

declare(strict_types=1);

namespace Paraunit\Coverage\Processor;

use Paraunit\Configuration\OutputFile;
use SebastianBergmann\CodeCoverage\CodeCoverage;

/**
 * Class Text
 * @package Paraunit\Proxy\Coverage
 */
class Text extends AbstractText
{
    /** @var OutputFile */
    private $targetFile;

    /**
     * Text constructor.
     * @param OutputFile $targetFile
     */
    public function __construct(OutputFile $targetFile)
    {
        parent::__construct();
        $this->targetFile = $targetFile;
    }

    /**
     * @param CodeCoverage $coverage
     * @throws \RuntimeException
     */
    public function process(CodeCoverage $coverage)
    {
        file_put_contents(
            $this->targetFile->getFilePath(),
            $this->getTextCoverage($coverage)
        );
    }

    public static function getConsoleOptionName(): string
    {
        return 'text';
    }
}