<?php
class Error404 extends Controller {

    public function __construct() {
        parent::__construct();

        $this->view->render('Error');
    }
}