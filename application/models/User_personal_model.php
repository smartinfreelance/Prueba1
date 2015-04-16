<?php
class User_personal_model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function verify($usuario, $pass)
    {
        $query = $this->db->query("select * from users where users.user = '".$usuario."' and users.pass = md5('".$pass."')");
		if ($query->num_rows() > 0)
		{
		   	return 1;
		}else{
			return 0;
		}
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
         $query= $this->db->query("select 
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

}

?>