<?php

namespace Engine;
use \RedBeanPHP\R as R;

use Engine\Categories;

class Goods{
    public function getGoods(){
        
        $goods = R::getAll("SELECT * FROM goods");
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

}

?>