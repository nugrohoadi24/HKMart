<?php
require __DIR__.'/../vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$ServiceAccount=ServiceAccount::fromJsonFile(__DIR__.'/skripsiAdiHK.json');

$firebase = (new factory)
            ->withServiceAccount($ServiceAccount)
            ->withDatabaseUri('https://skripsiadihk.firebaseio.com/')
            ->create();

$database = $firebase->getDatabase();
session_start();
?>