<?php
ini_set('display_errors', 'On'); // сообщения с ошибками будут показываться
error_reporting(E_ALL); // E_ALL - отображаем ВСЕ ошибки
require_once 'lib.php';

$contextName = 'IFRAME';
require_once 'user-context-loader.inc.php';

$app = AppInstance::loadApp($accountId);

$isSettingsRequired = $app->status != AppInstance::ACTIVATED;

if ($isAdmin) {
    $states = jsonApi()->states();
    // $webhooks = jsonApi()->webhooklist();
    $statesValues = [];
    // $webhooklist = [];
    foreach ($states->states as $v) {
        $statesValues[] = $v;
    }
    // foreach ($webhooks as $z) {
    //     $webhooklist[] = $z;
    // }

}

require 'iframe1.html';
require 'webhook.php';
//echo '<pre>';
//print_r($app);
//echo '</pre>';




