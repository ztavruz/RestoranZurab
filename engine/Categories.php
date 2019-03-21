<?php

namespace Engine;
use \RedBeanPHP\R as R;

class Categories{

    public function getCurrentNameCategories($id){
        $nameCategories = R::getRow("SELECT * FROM categories WHERE id LIKE ? LIMIT 1", [$id]);
        return $nameCategories['name_categories'];
    }

    public function getCategories(){
        $categories = R::getAll("SELECT * FROM categories");
        return $categories;
    }

    public function addCategories($name){
        $binds =[
            'name' => $name
        ];
        $testCategories = R::getRow("SELECT * FROM categories WHERE name_categories = :name LIMIT 1", $binds);
        $newCategories = R::dispense('categories');
        $newCategories->nameCategories = $name;
        R::store($newCategories);
        if( $testCategories == null){
            $testCategories = R::getRow("SELECT * FROM categories WHERE name_categories = :name LIMIT 1", $binds);
            $newCategories = R::load('categories', $testCategories['id']);
            $newCategories->number_categories = $testCategories['id'];
            R::store($newCategories);
        }
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
        debug($newName);
        debug($number);
        debug($transformCategories);
    }

    public function deleteCategories($deleteName){
        $binds =[
            'name' => $deleteName
        ];
        $transformCategories = R:: getRow("SELECT * FROM categories WHERE name_categories = :name LIMIT 1", $binds);
            
        $deleteCategories = R::load('categories', $transformCategories['id']);
        R::trash($deleteCategories);
        // debug($transformCategories);
    }

    public function debug($str){
        echo "<pre>";
        var_dump($str);
        echo "</pre>";
    }

}