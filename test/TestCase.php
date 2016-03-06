<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-11-10
 */

namespace Test\Net\Bazzline\Component\ProcessPipe;

use Mockery;
use Net\Bazzline\Component\ProcessPipe\Pipe;
use PHPUnit_Framework_TestCase;

/**
 * Class TestCase
 * @package Test\Net\Bazzline\Component\ProcessPipe
 */
class TestCase extends PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        Mockery::close();
    }

    //begin of helper
    /**
     * @return Mockery\MockInterface|\Net\Bazzline\Component\ProcessPipe\ExecutableInterface
     */
    protected function getMockOfProcess()
    {
        return Mockery::mock('Net\Bazzline\Component\ProcessPipe\ExecutableInterface');
    }

    /**
     * @return Pipe
     */
    protected function getNewPipe()
    {
        return new Pipe();
    }
    //begin of helper
}
