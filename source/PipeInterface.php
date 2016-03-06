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
     * Adds one or more process to the pipe
     *
     * @param ExecutableInterface $process - or more
     * @param ExecutableInterface $_ [optional]
     * @throws InvalidArgumentException
     * @return $this
     */
    public function pipe(ExecutableInterface $process, $_ = null);
} 