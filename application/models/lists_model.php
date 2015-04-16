<?php
class Lists_model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function setList($name, $description, $user_id)
    {
        $this->db->query("insert into lists (name, description) values ('".$name."','".$description."')");
        $l_id = $this->db->query("Select * from lists order by lists.id desc limit 1");
        return $l_id->result();
        //$this->db->query("insert into lists_users (id_user, id_list) values (".$user_id.", ".$l_id->id.")");

    }

    function setListUser($id_list, $id_user){
        $this->db->query("insert into lists_users (id_user,id_list) values (".$id_user.",".$id_list.")");
        return 0;
    }

    function intenta_loguear($usuario, $pass){
        $query= $this->db->query("select 
                                    users.id as id,
                                    users.user as user, 
                                    users.nombre as nombre 
                                from 
                                    users 
                                where users.user = '".$usuario."' 
                                and users.pass = md5('".$pass."')");
        return $query->result();
    }

    function insert_entry()
    {
        $this->title   = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->insert('entries', $this);
    }

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

    function getLists($id_user)
    {
         $query =$this->db->query("select 
                               lists.id as id,
                               lists.name as name,
                               lists.fecha_alta as fecha_alta
                            from 
                               lists
                            inner join lists_users on lists_users.id_list = lists.id
                            inner join users on lists_users.id_user = users.id
                            where lists_users.id_user = ".$id_user."
                            and lists.estado = 0
                            and lists_users.estado = 0
                            and users.estado = 0");
        return $query->result();   
    }

    function getListInfo($id_list){
        $query =$this->db->query("select 
                                       lists.id as id,
                                       lists.name as name,
                                       lists.description as description,
                                       lists.fecha_alta as fecha_alta
                                    from 
                                       lists
                                    where lists.id = ".$id_list."
                                    and lists.estado = 0");
        return $query->result();
    }

    function edit_list($id, $name, $description){
        $this->db->query("update lists set name = '".$name."', description='".$description."' where id = ".$id);
        return 0;
    }

    function delete_list($id){
        $this->db->query("update lists set estado = 1 where id = ".$id);
        return 0;
    }

}

?>