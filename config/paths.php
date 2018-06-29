<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 27/05/2018
 * Time: 22:37
 */

/**
 * Utiliser DS pour séparer different dossier avec un slash
 */
if(!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

/**
 * Utiliser WEBROOT afin d'avoir le chemin de base projet
 */
define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));

/**
 * Utiliser ROOT afin d'avoir le chemin absolute de base projet
 */
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

/**
 *
 */
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);

/**
 * URL du site
 */
define('URL', 'https://' . $_SERVER['SERVER_NAME']);