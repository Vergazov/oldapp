<?php

require_once 'lib.php';

$chosenstatus = $_POST['chosenstatus'];
$ignorestatuses = $_POST['ignorestatuses'];


loginfo('UPDATE-SETTINGS', "Saved status: " .  $chosenstatus .  " ignore status: " .  print_r($ignorestatuses,true));
//loginfo('UPDATE-ID', "Saved id: " .  $id .  " ignore id: " .  print_r($ignoreid,true));
loginfo('POST', print_r($_POST,true));

$accountId = $_POST['accountId'];

$app = AppInstance::loadApp($accountId);
$app->chosenstatus = $chosenstatus;
$app->ignorestatuses = $ignorestatuses;

$notify = $app->status != AppInstance::ACTIVATED;
$app->status = AppInstance::ACTIVATED;

// так как PUT - идемпотентный метод, можем дергать несколько раз или можем только один раз при первой активации дергать
//if ($notify) {
    vendorApi()->updateAppStatus(cfg()->appId, $accountId, $app->getStatusName());
//}

$app->persist();

echo 'Настройки обновлены, перезагрузите приложение';
