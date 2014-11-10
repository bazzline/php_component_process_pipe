# Process Pipe Component in PHP

This component easy up creation of a [pipe](http://en.wikipedia.org/wiki/Pipeline_(computing)) for processes in php.

Indeed, it is a [pseudo pipeline](http://en.wikipedia.org/wiki/Pipeline_(software)#Pseudo-pipelines) (process collection or process batch) since the php process is single threaded so far.

Currently, there is no plan to bloat the code base with an implementation of [STDIN](http://en.wikipedia.org/wiki/Standard_streams#Standard_input_.28stdin.29), [STDOUT](http://en.wikipedia.org/wiki/Standard_streams#Standard_output_.28stdout.29) or [STDERR](http://en.wikipedia.org/wiki/Standard_streams#Standard_error_.28stderr.29).
Errors can be handled by the thrown exception. Input is defined by the ExecutableInterface, as well as the output (return value).


@todo
The build status of the current master branch is tracked by Travis CI:
[![Build Status](https://travis-ci.org/bazzline/php_component_process_pipe.png?branch=master)](http://travis-ci.org/bazzline/php_component_process_pipe)
[![Latest stable](https://img.shields.io/packagist/v/net_bazzline/php_component_process_pipe.svg)](https://packagist.org/packages/net_bazzline/php_component_process_pipe)


@todo
The scrutinizer status are:
[![code quality](https://scrutinizer-ci.com/g/bazzline/php_component_process_pipe/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bazzline/php_component_process_pipe/) | [![code coverage](https://scrutinizer-ci.com/g/bazzline/php_component_process_pipe/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/bazzline/php_component_process_pipe/) | [![build status](https://scrutinizer-ci.com/g/bazzline/php_component_process_pipe/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bazzline/php_component_process_pipe/)

@todo
The versioneye status is:
[![dependencies](https://www.versioneye.com/user/projects/53e48c23e0a229172f000146/badge.svg?style=flat)](https://www.versioneye.com/user/projects/53e48c23e0a229172f000146)

Downloads:
[![Downloads this Month](https://img.shields.io/packagist/dm/net_bazzline/php_component_process_pipe.svg)](https://packagist.org/packages/net_bazzline/php_component_process_pipe)

@todo
It is also available at [openhub.net](http://www.openhub.net/p/718154).

# Examples

* [no input](https://github.com/bazzline/php_component_process_pipe/tree/master/example/Example/NoInput/run.php]
* [input array](https://github.com/bazzline/php_component_process_pipe/tree/master/example/Example/InputArray/run.php]
* [failing execution](https://github.com/bazzline/php_component_process_pipe/tree/master/example/Example/FailingExecution/run.php]
* [input generator](https://github.com/bazzline/php_component_process_pipe/tree/master/example/Example/InputGenerator/run.php]
* [input transformer](https://github.com/bazzline/php_component_process_pipe/tree/master/example/Example/InputTransformer/run.php]
* [input validator](https://github.com/bazzline/php_component_process_pipe/tree/master/example/Example/InputValidator/run.php]
* [data flow manipulator](https://github.com/bazzline/php_component_process_pipe/tree/master/example/Example/DataFlowManipulator/run.php]

# Install

## Manuel

    mkdir -p vendor/net_bazzline/php_component_process_pipe
    cd vendor/net_bazzline/php_component_process_pipe
    git clone https://github.com/bazzline/php_component_process_pipe

## With [Packagist](https://packagist.org/packages/net_bazzline/php_component_process_pipe)

    composer require net_bazzline/php_component_process_pipe:dev-master

# Usage

## By using the pipe method for multiple process

```php
$pipe = new Pipe();

$pipe->pipe(
    new ProcessOne(), 
    new ProcessTwo()
);

$output = $pipe->execute($input);

```
## By using the pipe method once for each process

```php
$pipe = new Pipe();

$pipe->pipe(new ProcessOne());
$pipe->pipe(new ProcessTwo());

$output = $pipe->execute($input);
```

## By instantiation

```php
$pipe = new Pipe(
    new ProcessOne(),
    new ProcessTwo()
);

$output = $pipe->execute($input);
```


# API

Thanks to [apigen](https://github.com/apigen/apigen), the api is available in the [document](https://github.com/bazzline/php_component_process_pipe/blob/master/document/index.html) section or [online](http://code.bazzline.net/).

# History

* [1.0.1](https://github.com/bazzline/php_component_process_pipe/tree/1.0.1) - not released yet
* [1.0.0](https://github.com/bazzline/php_component_process_pipe/tree/1.0.0) - not released yet
    * initial release

# Links

* [pipes](https://github.com/vkartaviy/pipes)
* [php-pipeline](https://github.com/JosephMoniz/php-pipeline)
* [php-pipeline-lib](https://github.com/phppro/php-pipeline-lib)
