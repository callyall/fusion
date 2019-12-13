<?php
define('PHP_START', microtime(true));

use Cubex\Cubex;
use PackagedUi\FusionDemo\DemoUiApplication;

$projectRoot = dirname(__DIR__);
$loader = require_once($projectRoot . '/vendor/autoload.php');

try
{
  $cubex = new Cubex($projectRoot, $loader);
  $cubex->handle(new DemoUiApplication($cubex), true);
}
catch(Throwable $e)
{
  die('Unable to handle your request');
}
