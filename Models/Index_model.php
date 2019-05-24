<?php
class Index_model extends Model
{


    public function __construct()
    {
        parent::__construct();

    }
    public function count()
    {
        $sql='SELECT count(*) FROM task';
        $coun=$this->db->query($sql);
        $coun=@implode($coun->fetch(PDO::FETCH_ASSOC));
        return $coun;
    }

    public function find1($start,$rows)
    {

        $sql = "SELECT * FROM task LIMIT $start,$rows";
        return $this->db->query($sql);

    }

    public function edit($name, $email,$task, $status=0, $id)
    {
        $dat = [
            'name' => $name,
            'email' => $email,
            'task' => $task,
            'status' => $status,
            'id' => $id,
        ];
        $sql = "UPDATE task SET username=:name, email=:email, task=:task,status=:status  WHERE id=:id";
        $data= $this->db->prepare($sql);
        $data->execute($dat);
    }

    public function lastId()  // последний id таблици БД
    {
        $id = $this->db->query('SELECT id FROM task ORDER BY id DESC LIMIT 1');
        $id = @implode($id->fetch(PDO::FETCH_ASSOC));
        return $id;
    }

    public function add($username, $email, $task)// запись в БД
    {
        $id = $this->lastId();
        $id++;

        $data = $this->db->prepare('INSERT INTO `task` (`id`,`username`,`email`,`task`,`status`) VALUES (:id,:username,:email,:task,:status)');
        $data->execute(array(
            ':id' => $id,
            ':username' => $username,
            ':email'=> $email,
            ':task'=>$task,
            ':status'=> 0,
        ));


    }

}
