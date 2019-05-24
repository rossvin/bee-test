<?php
class Index extends Controller {

    public $username;
    public $email;
    public $status;
    public $item;
    public $pagination;
    public function __construct() {
        parent::__construct();


    }


    public function index($rows=3) {

        if($rows==3) {
        $start = 0;
    } else{
            $start = $rows - 3;
            $rows= $start;
        }





        $model = new Index_model();
        $item=$model->find1($start,$rows);

        $pagination = intval($model->count()/3) ;
        $this->view->pagination = $pagination;
        $this->view->item = $item;
        $this->view->render('Index');
    }

    public function add() {

            $this->view->render('Add');

    }
    public function write() {

        $username=$_POST['username-add'];
        $email=$_POST['email-add'];
        $task=$_POST['task-add'];

        $model = new Index_model();
        $model->add($username, $email,$task);
        header('Location: '.PATH);
    }


    public function edit() {
        $id=$_POST['id'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $task=$_POST['task'];
        $status=$_POST['status'];
        if(!$status){
        $status=0;
          }
        $model = new Index_model();
        $model->edit($username, $email,$task, $status,$id);


        header('Location: '.PATH);

    }

}