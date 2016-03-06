<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-11-10
 */

namespace Test\Net\Bazzline\Component\ProcessPipe;

use Net\Bazzline\Component\ProcessPipe\Pipe;
use stdClass;

/**
 * Class PipeTest
 * @package Test\Net\Bazzline\Component\ProcessPipe
 */
class PipeTest extends TestCase
{
    //begin of tests
    public function testConstructNoProcess()
    {
        new Pipe();
    }

    public function testConstructWithSingleProcess()
    {
        new Pipe($this->getMockOfProcess());
    }

    public function testConstructWithMultipleProcess()
    {
        new Pipe(
            $this->getMockOfProcess(),
            $this->getMockOfProcess()
        );
    }

    /**
     * @expectedException \Net\Bazzline\Component\ProcessPipe\InvalidArgumentException
     * @expectedExceptionMessage Argument 1 passed to Net\Bazzline\Component\ProcessPipe\Pipe::pipe() must implement interface Net\Bazzline\Component\ProcessPipe\ExecutableInterface, instance of stdClass given
     */
    public function testConstructWithInvalidArguments()
    {
        new Pipe(
            $this->getMockOfProcess(),
            new stdClass()
        );
    }

    public function testPipeWithSingleProcess()
    {
        $pipe = $this->getNewPipe();
        $pipe->pipe($this->getMockOfProcess());
    }

    /**
     * @expectedException \Net\Bazzline\Component\ProcessPipe\InvalidArgumentException
     * @expectedExceptionMessage Argument 2 passed to Net\Bazzline\Component\ProcessPipe\Pipe::pipe() must implement interface Net\Bazzline\Component\ProcessPipe\ExecutableInterface, instance of stdClass given
     */
    public function testPipeWithInvalidArguments()
    {
        $pipe = $this->getNewPipe();
        $pipe->pipe(
            $this->getMockOfProcess(),
            $this->getMockOfProcess(),
            new stdClass()
        );
    }

    public function testPipeWithMultipleProcess()
    {
        $pipe = $this->getNewPipe();
        $pipe->pipe(
            $this->getMockOfProcess(),
            $this->getMockOfProcess()
        );
    }

    /**
     * @expectedException \Net\Bazzline\Component\ProcessPipe\ExecutableException
     * @expectedExceptionMessage unit test
     */
    public function testExecuteWithFailingProcess()
    {
        $process = $this->getMockOfProcess();
        $pipe = $this->getNewPipe();

        $process->shouldReceive('execute')
            ->once()
            ->andThrow('Net\Bazzline\Component\ProcessPipe\ExecutableException', 'unit test');

        $pipe->pipe($process);
        $pipe->execute();
    }

    public function testExecuteWithNoInput()
    {
        $expectedOutput = __LINE__;
        $process = $this->getMockOfProcess();
        $pipe = $this->getNewPipe();

        $process->shouldReceive('execute')
            ->once()
            ->andReturn($expectedOutput);

        $pipe->pipe($process);
        $output = $pipe->execute();

        $this->assertEquals($expectedOutput, $output);
    }

    public function testExecuteWithNoOutput()
    {
        $process = $this->getMockOfProcess();
        $pipe = $this->getNewPipe();

        $process->shouldReceive('execute')
            ->once();

        $pipe->pipe($process);
        $output = $pipe->execute();

        $this->assertNull($output);
    }

    public function testExecuteWithInputAndOutput()
    {
        $expectedOutput = __LINE__;
        $input = __LINE__;
        $process = $this->getMockOfProcess();
        $pipe = $this->getNewPipe();

        $process->shouldReceive('execute')
            ->once()
            ->with($input)
            ->andReturn($expectedOutput);

        $pipe->pipe($process);
        $output = $pipe->execute($input);

        $this->assertEquals($expectedOutput, $output);
    }
    //end of tests
}
