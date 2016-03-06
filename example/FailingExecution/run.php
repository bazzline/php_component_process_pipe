<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-11-08 
 */

namespace Example\FailingExecution;

use Net\Bazzline\Component\ProcessPipe\ExecutableException;
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
        throw new ExecutableException(__METHOD__ . ' has failed');
    }
}

$pipe = new Pipe(
    new ProcessOne(),
    new ProcessTwo()
);

try {
    $pipe->execute();
} catch (ExecutableException $exception) {
    echo 'error occurred:' . PHP_EOL;
    echo $exception->getMessage() . PHP_EOL;
}
