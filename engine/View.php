<?php

namespace Engine;

class View{

    private $page;
    public $title;

    public function __construct($url){
        $this->page = $url;
        $this->title = $url;
    }

    private function libsCss(){
        $libs = scandir(LIBS_DIR."/css");
        $libs = array_diff($libs, ['.','..']);
        $libsStr;
        foreach ($libs as $lib) {
            $libsStr .= "<link rel=\"stylesheet\" href=\"/libs/css/${lib}\">";
        }
        return $libsStr;
    }
    
    public function libsJs(){
        $libs = scandir(LIBS_DIR."/js");
        $libs = array_diff($libs, ['.','..']);
        $libsStr;
        foreach($libs as $lib){
            $libsStr .= "<script src='/libs/js/{$lib}'></script>";
        }
        return $libsStr;
    }

    public function loadJs(){
        if(preg_match("#showAllGoods#", $this->page)){
            $link = preg_replace("#^.*.$#", "showAllGoods", $this->page);
            return "<script src='/view/{$link}/script.js'></script>";
        }
        return "<script src='/view/{$this->page}/script.js'></script>";
    }

    public function loadCss(){
        if(preg_match("#showAllGoods#", $this->page)){
            $link = preg_replace("#^.*.$#", "showAllGoods", $this->page);
            return "<link rel=\"stylesheet\" href=\"/view/{$link}/style.css\">";
        }
        return "<link rel=\"stylesheet\" href=\"/view/{$this->page}/style.css\">"; 
    }

    public function render(){
        ob_start();

        if(preg_match("#showAllGoods#", $this->page)){
            require(VIEW_DIR."/{$this->page}");
        }else{
            require(VIEW_DIR."/{$this->page}/index.php");
        }
    
        
        $page = ob_get_clean();

        // $header = require(VIEW_DIR."/blocks/header.php");  

        // debug($header);
        $css = $this->loadCss();
        $js = $this->loadJs();
        $libsCss = $this->libsCss();
        $libsJs = $this->libsJs();
        $title = $this->title;
        echo $this->page;
       require(VIEW_DIR."/layout.php");
    }
}