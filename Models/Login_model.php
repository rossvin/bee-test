<?php
class Login_model extends Model
{
    public function run() {

        $sth = $this->db->prepare("SELECT id FROM admin WHERE login = :login AND password = :password");
        $sth->execute(array(
            ':login' => $_POST['login'],
            ':password' => $_POST['password']
        ));

       $data = $sth->fetchAll();

        if($data) {
            Session::init();
            Session::set('loggedIn', true);

        } else {

          header('Location: '.PATH);
        }
    }
}