<?php

namespace Engine;

class View{

    private $page;

    public function __construct($url){
        $this->page = $url;
        // echo $this->libsCss();
    }

    // public function render(){
    //     return  require(VIEW_DIR."/{$this->page}/index.php");
    // }
    
    private function libsJs(){
        $libs = scandir(LIBS_DIR."/js");
        $libs = array_diff($libs, ['.','..']);
        $libsStr;
        foreach ($libs as $lib) {
            $libsStr .= "<script src=\"/libs/js/${lib}\"></script>";
        }
        
        return $libsStr;
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

    public function render(){
        $page = file_get_contents(VIEW_DIR."/{$this->page}/index.php");
        $page = preg_replace("#\{\{.*libsCss.*\}\}#", $this->libsCss(), $page);
        $page = preg_replace("#\{\{.*libsJs.*\}\}#", $this->libsJs(), $page);
        echo $page;
    }
}