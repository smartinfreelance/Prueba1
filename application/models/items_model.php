<?php
class Items_model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function setItem($name, $description, $user_id)
    {
        $this->db->query("insert into items (name, description) values ('".$name."','".$description."')");
        $l_id = $this->db->query("Select * from items order by items.id desc limit 1");
        return $l_id->result();
        //$this->db->query("insert into items_users (id_user, id_item) values (".$user_id.", ".$l_id->id.")");

    }

    function setItemList($id_item, $id_list){
        $this->db->query("insert into lists_items (id_item,id_list) values (".$id_item.",".$id_list.")");
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

    function getItems($id_list)
    {
         $query =$this->db->query("select 
                               items.id as id,
                               items.name as name,
                               items.fecha_alta as fecha_alta,
                               lists_items.id_list as id_list
                            from 
                               items
                            inner join lists_items on lists_items.id_item = items.id
                            where lists_items.id_list = ".$id_list."
                            and items.estado = 0
                            and lists_items.estado = 0");
        return $query->result();   
    }

    function getItemInfo($id_item){
        $query =$this->db->query("select 
                                       items.id as id,
                                       items.name as name,
                                       items.description as description,
                                       items.fecha_alta as fecha_alta,
                                       lists_items.id_list as id_list
                                    from 
                                       items
                                    inner join lists_items on lists_items.id_item = items.id
                                    where items.id = ".$id_item."
                                    and items.estado = 0
                                    and lists_items.estado = 0");
        return $query->result();
    }

    function edit_item($id, $name, $description){
        $this->db->query("update items set name = '".$name."', description='".$description."' where id = ".$id);
        return 0;
    }

    function delete_item($id){
        $this->db->query("update items set estado = 1 where id = ".$id);
        return 0;
    }
    function delete_list_item($id, $id_list){
        $this->db->query("update lists_items set estado = 1 where id_item = ".$id." and id_list = ".$id_list);
        return 0;
    }

}

?>