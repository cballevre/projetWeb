<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 27/05/2018
 * Time: 22:37
 */
session_start();

/**
 * Encrypte le site en UTF-8
 */
header('Content-Type: text/html; charset=utf-8');

/**
 * Require les chemins de base
 */
require __DIR__ . '/paths.php';