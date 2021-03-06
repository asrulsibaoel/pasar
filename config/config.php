<?php

use Zend\Expressive\ConfigManager\ConfigManager;
use Zend\Expressive\ConfigManager\PhpFileProvider;
use App\Http\Routes;
use App\Module\User\Config as UserConfig;
use App\Module\Product\Config as ProductConfig;
use App\Projection\Config as ProjectionConfig;

$configManager = new ConfigManager([
    new PhpFileProvider('config/autoload/{{,*.}global,{,*.}local}.php'),
    Routes::class,
    UserConfig::class,
    ProductConfig::class,
    ProjectionConfig::class,
], 'data/config-cache.php');

return new ArrayObject($configManager->getMergedConfig());
