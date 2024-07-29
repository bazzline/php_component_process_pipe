# Process Pipe Component in PHP

This free as in freedom component ease up creation of a [pipe](http://en.wikipedia.org/wiki/Pipeline_(computing)) for processes in php.

Indeed, it is a [pseudo pipeline](http://en.wikipedia.org/wiki/Pipeline_(software)#Pseudo-pipelines) (process collection or process batch) since the php process is single threaded so far.

Currently, there is no plan to bloat the code base with an implementation of [STDIN](http://en.wikipedia.org/wiki/Standard_streams#Standard_input_.28stdin.29), [STDOUT](http://en.wikipedia.org/wiki/Standard_streams#Standard_output_.28stdout.29) or [STDERR](http://en.wikipedia.org/wiki/Standard_streams#Standard_error_.28stderr.29).
Errors can be handled by the thrown exception. Input is defined by the ExecutableInterface, as well as the output (return value).

The build status of the current master branch is tracked by Travis CI:
[![Build Status](https://travis-ci.org/bazzline/php_component_process_pipe.png?branch=master)](http://travis-ci.org/bazzline/php_component_process_pipe)
[![Latest stable](https://img.shields.io/packagist/v/net_bazzline/php_component_process_pipe.svg)](https://packagist.org/packages/net_bazzline/php_component_process_pipe)

The scrutinizer status are:
[![code quality](https://scrutinizer-ci.com/g/bazzline/php_component_process_pipe/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bazzline/php_component_process_pipe/)

The versioneye status is:
[![dependencies](https://www.versioneye.com/user/projects/54613c39a23e418458000006/badge.svg?style=flat)](https://www.versioneye.com/user/projects/54613c39a23e418458000006)

Downloads:
[![Downloads this Month](https://img.shields.io/packagist/dm/net_bazzline/php_component_process_pipe.svg)](https://packagist.org/packages/net_bazzline/php_component_process_pipe)

It is also available at [openhub.net](http://www.openhub.net/p/720386).

Changelog can be found [here](CHANGELOG.md).

## Why?

* separate complex operations into simpler
* easy up unit testing for smaller processes
* separate responsibility (data generator/transformer/validator/flow manipulator)
* create process chains you can read in the code (separate integration code from operation code)
* no dependencies (except you want to join the development team)

## Examples

* [no input](https://github.com/bazzline/php_component_process_pipe/blob/master/example/NoInput/run.php)
* [input array](https://github.com/bazzline/php_component_process_pipe/blob/master/example/InputArray/run.php)
* [failing execution](https://github.com/bazzline/php_component_process_pipe/blob/master/example/FailingExecution/run.php)
* [input generator](https://github.com/bazzline/php_component_process_pipe/blob/master/example/InputGenerator/run.php)
* [input transformer](https://github.com/bazzline/php_component_process_pipe/blob/master/example/InputTransformer/run.php)
* [input validator](https://github.com/bazzline/php_component_process_pipe/blob/master/example/InputValidator/run.php)
* [data flow manipulator](https://github.com/bazzline/php_component_process_pipe/blob/master/example/DataFlowManipulator/run.php)

## Install

### By Hand

    mkdir -p vendor/net_bazzline/php_component_process_pipe
    cd vendor/net_bazzline/php_component_process_pipe
    git clone https://github.com/bazzline/php_component_process_pipe

### With [Packagist](https://packagist.org/packages/net_bazzline/php_component_process_pipe)

    composer require net_bazzline/php_component_process_pipe:dev-master

## Usage

### By using the pipe method for multiple process

```php
use Net\Bazzline\Component\ProcessPipe\ExecutableException;
use Net\Bazzline\Component\ProcessPipe\InvalidArgumentException;
use Net\Bazzline\Component\ProcessPipe\Pipe;

try {
    $pipe = new Pipe();
    
    $pipe->pipe(
        new ProcessOne(), 
        new ProcessTwo()
    );
    
    $output = $pipe->execute($input);
} catch (ExecutableException) {
    //handle process exception
} catch (InvalidArgumentException) {
    //handle pipe exception
}
```
### By using the pipe method once for each process

```php
use Net\Bazzline\Component\ProcessPipe\ExecutableException;
use Net\Bazzline\Component\ProcessPipe\InvalidArgumentException;
use Net\Bazzline\Component\ProcessPipe\Pipe;

try {
    $pipe = new Pipe();
    
    $pipe->pipe(new ProcessOne());
    $pipe->pipe(new ProcessTwo());
    
    $output = $pipe->execute($input);
} catch (ExecutableException) {
    //handle process exception
} catch (InvalidArgumentException) {
    //handle pipe exception
}
```

### By instantiation

```php
use Net\Bazzline\Component\ProcessPipe\ExecutableException;
use Net\Bazzline\Component\ProcessPipe\InvalidArgumentException;
use Net\Bazzline\Component\ProcessPipe\Pipe;

try {
    $pipe = new Pipe(
        new ProcessOne(),
        new ProcessTwo()
    );
    
    $output = $pipe->execute($input);
} catch (ExecutableException) {
    //handle process exception
} catch (InvalidArgumentException) {
    //handle pipe exception
}
```

### By doing all

```php
use Net\Bazzline\Component\ProcessPipe\ExecutableException;
use Net\Bazzline\Component\ProcessPipe\InvalidArgumentException;
use Net\Bazzline\Component\ProcessPipe\Pipe;

try {
    $pipe = new Pipe(
        new ProcessOne(),
        new ProcessTwo()
    );
    
    $pipe->pipe(new ProcessThree());
    $pipe->pipe(
        new ProcessFour(),
        new ProcessFive()
    );

    $output = $pipe->execute($input);
} catch (ExecutableException) {
    //handle process exception
} catch (InvalidArgumentException) {
    //handle pipe exception
}
```

## API

[API](http://www.bazzline.net/4fedd5481f448035b78eda04155168a08e3ee5b5/index.html) is available at [bazzline.net](http://www.bazzline.net).

## Development notes

After code changes, please run:

```bash
composer check
./vendor/bin/rector process
./vendor/bin/php-cs-fixer fix source
```

## Links

### Thanks to

* [ralf westphal](http://ralfw.de/)
* [the architects napkin](https://leanpub.com/thearchitectsnapkin-derschummelzettel)

### Other pipe implementations

* [pipes](https://github.com/vkartaviy/pipes)
* [php-pipeline](https://github.com/JosephMoniz/php-pipeline)
* [php-pipeline-lib](https://github.com/phppro/php-pipeline-lib)
* [warmans pipeline](https://github.com/warmans/pipeline)
* [piper](https://github.com/yuya-takeyama/piper)
* [tacone pipes](https://github.com/tacone/pipes)
* [plumber](https://github.com/jadell/plumber)

## Final Words

Star it if you like it :-). Add issues if you need it. Pull patches if you enjoy it. Write a blog entry if you use it. [Donate something](https://gratipay.com/~stevleibelt) if you love it :-].
