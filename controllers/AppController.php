<?php

class AppController {
    
    function index(){
        require_once "./views/view_header.php";
        require_once "./views/view_home.php";
        require_once "./views/view_footer.php";
    }

    function helloworld(){
        require_once "./views/view_helloWorld.php";
    }
    
    
}

?>
