<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-11-09
 */

namespace Example\DataFlowManipulator;

use Net\Bazzline\Component\ProcessPipe\ExecutableException;
use Net\Bazzline\Component\ProcessPipe\ExecutableInterface;
use Net\Bazzline\Component\ProcessPipe\Pipe;

require_once __DIR__ . '/../../../vendor/autoload.php';

/**
 * Class ArrayProcess
 * @package De\Leibelt\ProcessPipe\Example\DataFlowManipulator
 */
class ArrayProcess implements ExecutableInterface
{
    /**
     * @param mixed $input
     * @return mixed
     * @throws ExecutableException
     */
    public function execute($input = null)
    {
        $input[] = __METHOD__;

        return $input;
    }
}

/**
 * Class StringProcess
 * @package De\Leibelt\ProcessPipe\Example\DataFlowManipulator
 */
class StringProcess implements ExecutableInterface
{
    /**
     * @param mixed $input
     * @return mixed
     * @throws ExecutableException
     */
    public function execute($input = null)
    {
        $input .= PHP_EOL . __METHOD__;

        return $input;
    }
}

/**
 * Class DataFlowManipulator
 */
class DataFlowManipulator implements ExecutableInterface
{
    /** @var ArrayProcess */
    private $arrayProcess;

    /** @var StringProcess */
    private $stringProcess;

    /**
     * @param ArrayProcess $process
     * @return $this
     */
    public function setArrayProcess(ArrayProcess $process)
    {
        $this->arrayProcess = $process;

        return $this;
    }

    /**
     * @param StringProcess $process
     * @return $this
     */
    public function setStringProcess(StringProcess $process)
    {
        $this->stringProcess = $process;

        return $this;
    }

    /**
     * @param mixed $input
     * @return mixed
     * @throws \Net\Bazzline\Component\ProcessPipe\ExecutableException
     */
    public function execute($input = null)
    {
        if (is_array($input)) {
            return $this->arrayProcess->execute($input);
        } else if (is_string($input)) {
            return $this->stringProcess->execute($input);
        } else {
            throw new ExecutableException('input must be from type of array or string');
        }
    }
}

$dataFlowManipulator = new DataFlowManipulator();
$dataFlowManipulator->setArrayProcess(new ArrayProcess())
    ->setStringProcess(new StringProcess());

$pipe = new Pipe($dataFlowManipulator);

$output = $pipe->execute('Hello World');
echo 'string' . PHP_EOL;
echo var_export($output, true) . PHP_EOL;

$output = $pipe->execute(array('Hello World'));
echo 'array' . PHP_EOL;
echo var_export($output, true) . PHP_EOL;
