<?php
//define("USE_STREAMING_TEMPLATES", true);
/**
 * Initialization file for template files
 *
 * This file is automatically included as a result of $config->prependTemplateFile
 * option specified in your /site/config.php.
 *
 * You can initialize anything you want to here. In the case of this beginner profile,
 * we are using it just to include another file with shared functions.
 *
 */

include_once("./_func.php"); // include our shared functions

$config->styles->append(hash_templatefile('styles/lib/bootstrap-grid.min.css'));
$config->styles->append(hash_templatefile('styles/theme/theme.css'));
$config->styles->append(hash_templatefile('styles/lib/font-awesome.css'));
$config->styles->append(hash_templatefile('styles/lib/fuelux.css'));
$config->styles->append(hash_templatefile('styles/main.css'));

$config->scripts->append(hash_templatefile('scripts/lib/jquery.js'));
$config->scripts->append(hash_templatefile('scripts/lib/popper.js'));
$config->scripts->append(hash_templatefile('scripts/lib/bootstrap.min.js'));
$config->scripts->append(hash_templatefile('scripts/lib/jquery-validate.js'));
$config->scripts->append(hash_templatefile('scripts/lib/fuelux.js'));
$config->scripts->append(hash_templatefile('scripts/custom.js'));

$config->applogo = $pages->get('/')->images->first();

$page->hidenav = false;
