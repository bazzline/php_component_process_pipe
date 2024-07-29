<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-11-07
 */

namespace Net\Bazzline\Component\ProcessPipe;

/**
 * Class ProcessPipe
 * @package Net\Bazzline\Component\ProcessPipe
 */
class Pipe implements PipeInterface
{
    /** @var array|ExecutableInterface[] */
    private $processes = [];

    /**
     * Adds one or more process to the pipe
     *
     * @throws InvalidArgumentException
     */
    public function __construct()
    {
        if (func_num_args() > 0) {
            call_user_func_array($this->pipe(...), func_get_args());
        }
    }

    /**
     * @param mixed $input
     * @return mixed
     * @throws ExecutableException
     */
    public function execute($input = null)
    {
        foreach ($this->processes as $process) {
            $input = $process->execute($input);
        }

        return $input;
    }

    /**
     * Adds one or more process to the pipe
     *
     * @param ExecutableInterface $process - or more
     * @param ExecutableInterface $_ [optional]
     * @throws InvalidArgumentException
     * @return $this
     */
    public function pipe(ExecutableInterface $process, $_ = null)
    {
        foreach (func_get_args() as $index => $process) {
            if ($process instanceof ExecutableInterface) {
                $this->processes[] = $process;
            } else {
                $message = 'Argument ' . $index . ' passed to ' . __METHOD__ .
                    '() must implement interface ' .
                    \Net\Bazzline\Component\ProcessPipe\ExecutableInterface::class .
                    ', instance of ' . $process::class . ' given';
                throw new InvalidArgumentException($message);
            }
        }

        return $this;
    }
}
