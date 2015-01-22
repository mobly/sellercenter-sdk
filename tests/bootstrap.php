<?php

error_reporting(-1);
date_default_timezone_set('UTC');

// Include autoloader from composer
$loader = require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
$loader->addPsr4('SellerCenter\\Test\\SDK\\', __DIR__);
