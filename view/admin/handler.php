<?php

require(__DIR__."./../../vendor/autoload.php");
require(__DIR__."./../../api/database/connection.php");

use Engine\Categories;
use Engine\Goods;
use \RedBeanPHP\R as R;

// ДАННЫЕ ДЛЯ РЕДАКТИРОВАНИЯ КАТЕГОРИЙ ТОВАРОВ
$categories = new Categories;
$goods = new Goods;
// debug($goods->addGood());

$name =         $_POST['nameCategories'];
$id =           $_POST['id'];
$rename =       $_POST['renameCategories'];
$newName =      $_POST['newNameCategories'];
$number =       $_POST['numberCategories'];
$deleteName =   $_POST['deleteCategories'];

// ДАННЫЕ ДЛЯ РЕДАКТИРОВАНИЯ ТОВАРОВ
$nameAddGood         = $_POST['nameAddGood'];
$categoriForAddGoods = $_POST['categoriForAddGoods'];

debug($nameAddGood);
debug($categoriForAddGoods);
//РЕДАКТИРОВАНИЕ КАТЕГОРИИ
if($name != null){
    $categories->addCategories($name);
    // debug($categories);
}
if($rename != null ){
    $categories->renameCategories($rename, $newName, $number);

}
if($deleteName != null){
    $categories->deleteCategories($deleteName);
}

//РЕДАКТИРОВАНИЕ ТОВАРА
if($nameAddGood != null && $categoriForAddGoods != null){
    $goods->addGood($nameAddGood, $categoriForAddGoods);
}

?>
<!-- <script>
    window.location.href = window.location.origin + "/admin";
</script> -->

<?php
function debug($str){
    echo "<pre>";
    var_dump($str);
    echo "</pre>";
}
?>