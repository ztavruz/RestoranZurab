<?php

namespace Engine;
use \RedBeanPHP\R as R;

use Engine\Categories;

class Goods{
    public function getGoods(){
        
        $goods = R::getAll("SELECT * FROM goods");
        return $goods;
    }

    public function getGoodsCategori($value1){
        $binds =[
            'categori_good'=> $value1
        ];
        $goods = R::getAll("SELECT * FROM goods WHERE categori_good = :categori_good", $binds);
        return $goods;
    }

    public function addGood($nameAddGood, $categoriForAddGoods){
        $binds =[
            'categoriForGood'=>$categoriForAddGoods
        ];
        $categoriForAddGoods = R::getRow("SELECT * FROM categories WHERE name_categories = :categoriForGood LIMIT 1", $binds);
        $newGood = R::dispense('goods');
        $newGood->name_good = $nameAddGood;
        $newGood->categori_good = $categoriForAddGoods['id'];
        R::store($newGood);
    }

    public function renameCategories($rename, $newName, $number){
        $binds =[
            'name' => $rename
        ];
        $transformCategories = R::getRow("SELECT * FROM categories WHERE name_categories = :name LIMIT 1", $binds);
        if($newName != "" && $number != "" ){
            $renameCategories = R::load('categories', $transformCategories['id']);
            $renameCategories->name_categories = $newName;
            $renameCategories->number_categories = $number;
            R::store($renameCategories);
        }elseif($newName != "" && $number == ""){
            $renameCategories = R::load('categories', $transformCategories['id']);
            $renameCategories->name_categories = $newName;
            R::store($renameCategories);
        }elseif($number != "" && $newName == ""){
            $renameCategories = R::load('categories', $transformCategories['id']);
            $renameCategories->number_categories = $number;
            R::store($renameCategories);
        }
    }
    public function transformGood($renameGood, $imgGood, $numberGood){
        $binds =[
            'renameGood'=> $renameGood,
            'imgGood'=> $imgGood,
            'numberGood'=> $numberGood
        ];
        $transformGood = R::getRow("SELECT * FROM goods WHERE name_goods = :name LIMIT 1", $binds);

    }

}

?>