<?php
class Login extends Controller {

    public function __construct() {
        parent::__construct();

    }

    public function index() {
        $this->view->render('Login');
    }

    public function run() {
        $model = new Login_model();
        $model->run();
        header('Location: '.PATH);

    }

    public function logout() {

        Session::destroy();
        header('Location: '.PATH);
        exit();
    }
}