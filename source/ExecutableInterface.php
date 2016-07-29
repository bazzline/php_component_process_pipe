<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-11-07 
 */

namespace Net\Bazzline\Component\ProcessPipe;

/**
 * Interface ExecutableInterface
 * @package Net\Bazzline\Component\ProcessPipe
 */
interface ExecutableInterface
{
    /**
     * @param mixed $input
     * @return mixed
     * @throws ExecutableException
     */
    public function execute($input = null);
} 
