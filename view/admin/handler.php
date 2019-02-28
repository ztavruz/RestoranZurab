<?php

require(__DIR__."./../../vendor/autoload.php");
require(__DIR__."./../../api/database/connection.php");

use Engine\Cards;
use \RedBeanPHP\R as R;

$name = $_POST['nameCategories'];

$id = $_POST['id'];

$rename = $_POST['renameCategories'];
$newName = $_POST['newNameCategories'];
$number = $_POST['numberCategories'];

$deleteName = $_POST['deleteCategories'];

$categories = new Cards;

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

?>
<script>
    window.location.href = window.location.origin + "/admin";
</script>

<?php
function debug($str){
    echo "<pre>";
    var_dump($str);
    echo "</pre>";
}
?>