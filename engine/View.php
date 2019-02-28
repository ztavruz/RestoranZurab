<?php

namespace Engine;

class View{

    private $page;
    public $title;

    public function __construct($url){
        $this->page = $url;
        $this->title = $url;
        // echo $this->libsCss();
    }

    // public function render(){
    //     return  require(VIEW_DIR."/{$this->page}/index.php");
    // }

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
        return "<script src='/view/{$this->page}/script.js'></script>";
    }

    public function loadCss(){
        return "<link rel=\"stylesheet\" href=\"/view/{$this->page}/style.css\">"; 
    }

    public function render(){
        ob_start();
        require(VIEW_DIR."/{$this->page}/index.php");
        $page = ob_get_clean();
        $css = $this->loadCss();
        $js = $this->loadJs();
        $libsCss = $this->libsCss();
        $libsJs = $this->libsJs();
        $title = $this->title;

       require(VIEW_DIR."/layout.php");
    }
}