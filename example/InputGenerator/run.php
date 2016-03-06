<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-11-08 
 */

namespace Example\InputGenerator;

use Net\Bazzline\Component\ProcessPipe\ExecutableInterface;
use Net\Bazzline\Component\ProcessPipe\Pipe;

require_once __DIR__ . '/../../../vendor/autoload.php';

/**
 * Class DataGeneratorProcess
 */
class DataGeneratorProcess implements ExecutableInterface
{
    /**
     * @param mixed $input
     * @return mixed
     * @throws \Net\Bazzline\Component\ProcessPipe\ExecutableException
     */
    public function execute($input = null)
    {
        $input = array();
        $input[] = array(
            microtime(true),
            'debug',
            'new generated log data'
        );

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
        $input[] = array(
            microtime(true),
            'debug',
            'hello world'
        );

        return $input;
    }
}

$pipe = new Pipe(
    new DataGeneratorProcess(),
    new ProcessTwo()
);

$output = $pipe->execute();

foreach ($output as $log) {
    echo '[' . $log[0] . '] [' . $log[1] . '] - ' . $log[2] . PHP_EOL;
}
