<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-11-10 
 */

namespace Test\Net\Bazzline\Component\ProcessPipe;

use Net\Bazzline\Component\ProcessPipe\Pipe;

/**
 * Class PipeTest
 * @package Test\Net\Bazzline\Component\ProcessPipe
 */
class PipeTest extends TestCase
{
    //begin of tests
    public function testConstructNoProcess()
    {
        $pipe = new Pipe();
        $pipe->execute();
    }

    public function testConstructWithSingleProcess()
    {
        $this->markTestIncomplete();
    }

    public function testConstructWithMultipleProcess()
    {
        $this->markTestIncomplete();
    }

    public function testPipeNoProcess()
    {
        $pipe = $this->getNewPipe();
        $pipe->execute();
    }

    public function testPipeWithSingleProcess()
    {
        $this->markTestIncomplete();
    }

    public function testPipeWithMultipleProcess()
    {
        $this->markTestIncomplete();
    }

    public function testPipeWithFailingProcess()
    {
        $this->markTestIncomplete();
    }

    public function testPipeWithNoInput()
    {
        $this->markTestIncomplete();
    }

    public function testPipeWithNoOutput()
    {
        $this->markTestIncomplete();
    }

    public function testPipeWithInputAndOutput()
    {
        $this->markTestIncomplete();
    }
    //end of tests

    //begin of helper
    /**
     * @return Pipe
     */
    private function getNewPipe()
    {
        return new Pipe();
    }
    //begin of helper
}