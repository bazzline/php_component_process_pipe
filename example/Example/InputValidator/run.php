<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-11-09
 */

namespace Example\InputValidator;

use Net\Bazzline\Component\ProcessPipe\ExecutableException;
use Net\Bazzline\Component\ProcessPipe\ExecutableInterface;
use Net\Bazzline\Component\ProcessPipe\Pipe;
use Exception;

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
        $input .= ' ' . __METHOD__;

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
        if (!is_array($input)) {
            throw new ExecutableException('input must be type of array');
        }

        $input[] = __METHOD__;

        return $input;
    }
}

$input = 'string';

$pipe = new Pipe();

$pipe->pipe(
    new ProcessOne(),
    new ProcessTwo()
);

try {
    $output = $pipe->execute($input);
    echo $output . PHP_EOL;
} catch (Exception $exception) {
    echo 'caught exception with message: ' . $exception->getMessage() . PHP_EOL;
}
