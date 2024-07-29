<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\ValueObject\PhpVersion;

return RectorConfig::configure()
  ->withPaths([
      __DIR__ . '/example',
      __DIR__ . '/source',
      __DIR__ . '/test'
    ])
    // uncomment to reach your current PHP version
    ->withPhpSets(php83: true)
    ->withPreparedSets(deadCode: true, codeQuality: true)
    ->withTypeCoverageLevel(0);
