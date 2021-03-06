<?php

declare(strict_types=1);

use Nette\Configurator;

require __DIR__ . '/../vendor/autoload.php';

$configurator = new Configurator;

$configurator->setDebugMode(!file_exists(__DIR__ . '/.production'));
$configurator->enableTracy(__DIR__ . '/../log');

$configurator->setTimeZone('Europe/Prague');
$configurator->setTempDirectory(__DIR__ . '/../temp');

$configurator->addConfig(__DIR__ . '/config/config.neon');

if (file_exists(__DIR__ . '/config/config.local.neon')) {
	$configurator->addConfig(__DIR__ . '/config/config.local.neon');
}

return $configurator->createContainer();
