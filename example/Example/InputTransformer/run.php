<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-11-08 
 */

namespace Example\InputTransformer;

use Net\Bazzline\Component\ProcessPipe\ExecutableException;
use Net\Bazzline\Component\ProcessPipe\ExecutableInterface;
use Net\Bazzline\Component\ProcessPipe\Pipe;
use stdClass;

require_once __DIR__ . '/../../../vendor/autoload.php';

/**
 * Class ObjectToArrayTransformer
 */
class ObjectToArrayTransformer implements ExecutableInterface
{
    /**
     * @param mixed $input
     * @return mixed
     * @throws \Net\Bazzline\Component\ProcessPipe\ExecutableException
     */
    public function execute($input = null)
    {
        if (!is_object($input)) {
            throw new ExecutableException('input must be instance of object');
        }

        $array = array();

        foreach (get_object_vars($input) as $property => $value) {
            $array[$property] = $value;
        }

        return $array;
    }
}

/**
 * Class ArrayToJSONTransformer
 * @package De\Leibelt\ProcessPipe\Example\WithDataTransformer
 */
class ArrayToJSONTransformer implements ExecutableInterface
{
    /**
     * @param mixed $input
     * @return mixed
     * @throws ExecutableException
     */
    public function execute($input = null)
    {
        if (!is_array($input)) {
            throw new ExecutableException('input must be an array');
        }

        return json_encode($input);
    }
}

$pipe = new Pipe(
    new ObjectToArrayTransformer(),
    new ArrayToJSONTransformer()
);

$object = new stdClass();

$object->foo = 'bar';
$object->bar = 'foo';
$object->foobar = 'barfoo';

echo $pipe->execute($object) . PHP_EOL;
