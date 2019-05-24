<?php
class View {
    public function __construct() {

    }


    public function render($name, $noInclude = false)
    {
        if ($noInclude == true) {
            require 'Views/' . $name . '.php';
        } else {
            require 'header.php';
            require 'Views/' . $name . '.php';
            require 'footer.php';
        }
    }
}
