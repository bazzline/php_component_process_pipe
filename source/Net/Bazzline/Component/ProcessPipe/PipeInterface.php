<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-11-07 
 */

namespace Net\Bazzline\Component\ProcessPipe;

/**
 * Interface PipeInterface
 * @package De\Leibelt\ProcessPipeline
 */
interface PipeInterface extends ExecutableInterface
{
    /**
     * @param ExecutableInterface $process - or more
     * @throws InvalidArgumentException
     * @return $this
     */
    public function pipe(ExecutableInterface $process);
} 