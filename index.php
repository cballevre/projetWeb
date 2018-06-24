<?php


/**
 * Configuration de l'url
 */
require './config/bootstrap.php';

require 'core/Autoloader.php';
Core\Autoloader::register();

use Core\Routing\Dispatcher;

/**
 * Initialise le dispatcher
 */
$dispatcher = new Dispatcher();
