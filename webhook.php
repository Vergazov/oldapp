<?php
require_once 'lib.php'; 
    
//$requesthook = file_get_contents('php://input');
//$hook = json_decode($requesthook);
//loginfo('test: ', print_r($hook,true));

//$link = $hook->events[0]->meta->href;
$link = 'https://online.moysklad.ru/api/remap/1.2/entity/supply/2fdef6c2-e964-11ec-0a80-09490016d118';
//$accountId = $hook->events[0]->accountId;
$accountId = '8571aaa0-e265-11ec-0a80-058e00004b16';
//
$app = AppInstance::loadApp($accountId);

$customerOrder = JsonApi()->getcustomerOrderObject($link); // объект заказа покупателя
//loginfo('test: ', print_r($customerOrder,true));

$customerOrderProductObject = JsonApi()->getEntity($customerOrder->positions->meta->href); // объект positions заказа покупателя
//loginfo('test: ', print_r($customerOrderProductObject,true));

$customerOrderProductsArr = $customerOrderProductObject->rows; 
//loginfo('test: ', print_r($customerOrderProductsArr,true));

$customerOrderProductsList = JsonApi()->getcustomerOrderProductsList($customerOrderProductsArr); // список товаров заказа покупателя
//loginfo('customerOrderProductsList: ', print_r($customerOrderProductsList,true));

$customerOrderProductsId = JsonApi()->getId($customerOrderProductsList); //список  id товаров заказа покупателя
//loginfo('customerOrderProductsList: ', print_r($customerOrderProductsId,true));

$customerOrderProductsQuantity = JsonApi()->getcustomerOrderProductsQuantity($customerOrderProductsArr); // количество товара в заказах покупателя
//loginfo('test: ', print_r($customerOrderProductsQuantity,true));

$purchaseOrdersArr = $customerOrder->purchaseOrders;
$purchaseorderObects =  JsonApi()->getPurchaseorderObjects($purchaseOrdersArr); //Заказы поставщику// массив, хранящий в себе объекты всех привязанных к заказу покупателя, заказов поставщику
//loginfo('test1234', print_r($purchaseorderObects,true));

$positionsObjects = jsonApi()->getPositionsObjects($purchaseorderObects); //Оюъекты всех приемок
//loginfo('test1234', print_r($positionsObjects,true));



//$supplyProductList = jsonApi()->getProductList($positionsObjects); // список ссылок на приемки
////loginfo('test1234', print_r($supplyProductList,true));
//
//$supplyProductsId = JsonApi()->getId($supplyProductList); //список id каждой приемки
////loginfo('idList', print_r($supplyProductsId,true));
//
//$productQuantity = jsonApi()->getProductQuantity($positionsObjects); // количество товара в приемках
////loginfo('test1234', print_r($productQuantity,true));
//
//$result1 = JsonApi()->array_combine_($customerOrderProductsQuantity, $customerOrderProductsId);
//debug($result1);

//$result2 = JsonApi()->array_combine_($productQuantity, $supplyProductsId);
//debug($result2);
//$result = array_diff($customerOrderProductsId, $supplyProductsId);
//$result = array_diff($customerOrderProductsId, $supplyProductsId);
//
//debug($result);





//if($result) {
//    echo'Не все позиции пришли на склад, статус не меняется';
//    
//}else{
//    echo 'Все позиции из заказа покупателя на складе, меняем статус';
//}

/*Что реализовать:

 * Добавить массив с количеством для приемки
 *  
 * 
 */


















        
















