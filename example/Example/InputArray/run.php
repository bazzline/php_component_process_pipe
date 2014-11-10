<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-11-08 
 */

namespace Example\InputArray;

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
        $input['name'] = 'bar';
        $input['steps'][] = __METHOD__;
        $input['times'][] = microtime(true);

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
        $input['name'] = 'foobar';
        $input['steps'][] = __METHOD__;
        $input['times'][] = microtime(true);

        return $input;
    }
}

$input = array(
    'name' => 'foo',
    'steps' => array(),
    'times' => array()
);
$pipe = new Pipe();

$pipe->pipe(
    new ProcessOne(),
    new ProcessTwo()
);

echo 'input' . PHP_EOL;
echo var_export($input, true) . PHP_EOL;

$output = $pipe->execute($input);

echo 'output' . PHP_EOL;
echo var_export($output, true) . PHP_EOL;
