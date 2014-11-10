<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-11-07 
 */

namespace Net\Bazzline\Component\ProcessPipe;

/**
 * Class ProcessPipe
 * @package De\Leibelt\ProcessPipeline
 */
class Pipe implements PipeInterface
{
    /** @var array|ExecutableInterface[] */
    private $processes;

    /**
     * @param ExecutableInterface $process
     * [@param ExecutableInterface $process]
     */
    public function __construct()
    {
        $this->processes = array();

        if (func_num_args() > 0) {
            call_user_func_array(array($this, 'pipe'), func_get_args());
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
     * @param ExecutableInterface $process
     * @return $this
     */
    public function pipe(ExecutableInterface $process)
    {
        foreach (func_get_args() as $process) {
            if ($process instanceof ExecutableInterface) {
                $this->processes[] = $process;
            }
        }

        return $this;
    }
}