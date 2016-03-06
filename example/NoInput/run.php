<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-11-08 
 */

namespace Example\NoInput;

use Net\Bazzline\Component\ProcessPipe\ExecutableInterface;
use Net\Bazzline\Component\ProcessPipe\Pipe;

require_once __DIR__ . '/../../../vendor/autoload.php';

/**
 * Class ProcessOne
 */
class ProcessOne implements ExecutableInterface
{
    /**
     * @param mixed $input
     * @return mixed
     * @throws \Net\Bazzline\Component\ProcessPipe\ExecutableException
     */
    public function execute($input = null)
    {
        echo __METHOD__ . PHP_EOL;
        sleep(1);

        return $input;
    }
}

/**
 * Class ProcessTwo
 */
class ProcessTwo implements ExecutableInterface
{
    /**
     * @param mixed $input
     * @return mixed
     * @throws \Net\Bazzline\Component\ProcessPipe\ExecutableException
     */
    public function execute($input = null)
    {
        echo __METHOD__ . PHP_EOL;

        return $input;
    }
}

$pipe = new Pipe();
$processOne = new ProcessOne();
$processTwo = new ProcessTwo();

$pipe->pipe($processOne);
$pipe->pipe($processTwo);

$pipe->execute();
