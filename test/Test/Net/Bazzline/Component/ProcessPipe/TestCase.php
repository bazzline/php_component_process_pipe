<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-11-10 
 */

namespace Test\Net\Bazzline\Component\ProcessPipe;

use Mockery;
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
} 