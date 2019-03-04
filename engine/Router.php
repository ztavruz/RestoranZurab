<?php

namespace Engine;

class Router{

    private $url;

    public function __construct(){  
        $this->url = $this->getUrl();
    }

    private function getUrl(){
        $url = $_SERVER['REQUEST_URI'];
        $url = trim($url, "/");
        $url =  preg_replace("#\?.*$#", null, $url); 
        if($url == ""){
            $url = "main";
        }
        return $url;
    }

    private function pageExist(){
        $views = scandir(VIEW_DIR);
        $views = array_diff($views, ['.','..']);

        foreach($views as $view){
            if($view == $this->url){
                return true;
            }
            if($view == preg_replace("#(^.*.$)#","showAllGoods", $this->url) ){
                return true;
            }
        }

        return false;
    }

    public function run(){
        if($this->pageExist()){

            $view = new View($this->url);
            return $view->render();
            
        }else{
            echo "Страница не найдена"; 
            echo $this->url;
        }
    }

}