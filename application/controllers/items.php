<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	function Items(){
        parent::__construct();
        $this->load->model("lists_model","list");
        $this->load->model("items_model","items");
    }
	public function index()
	{

		$itemas = $this->user->getItems($usuario[0]->id);
        $this->session->set_userdata($datos);
		$this->load->view(
            'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
            array(
                "modulo" => 'items',//Se le pasa el dato "modulo" con valor "login" al file "main"
                "pagina" => 'panel', //Se le pasa el dato "pagina" con valor "login" al file "main"
                "items" => $itemas
            )
        );
	}

	public function add_item($id_list)
	{
		if($this->session->userdata('idusuario')){
			$this->load->view(
	                    'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
	                    array(
	                        "modulo" => 'items',//Se le pasa el dato "modulo" con valor "login" al file "main"
	                        "pagina" => 'add', //Se le pasa el dato "pagina" con valor "login" al file "main"
	                        "id_list" => $id_list
	                    )
	                );
		}else{
			$this->load->view(
                    'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
                    array(
                        "modulo" => 'login',//Se le pasa el dato "modulo" con valor "login" al file "main"
                        "pagina" => 'login' //Se le pasa el dato "pagina" con valor "login" al file "main"
                    )
                );
		}
	}

	public function confirm_add_item()
	{
		if($this->session->userdata('idusuario')){
			$this->form_validation->set_rules('name', 'name', 'required|min_length[3]|max_length[32]');
			$this->form_validation->set_rules('description', 'description', 'max_length[250]');

			if (($this->form_validation->run() == FALSE))
			{
				$this->load->view(
		                    'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
		                    array(
		                        "modulo" => 'items',//Se le pasa el dato "modulo" con valor "login" al file "main"
		                        "pagina" => 'add', //Se le pasa el dato "pagina" con valor "login" al file "main"
	                        	"id_list" => $this->input->post('id_list')
		                    )
		                );

			}else{
				$name = $this->input->post('name');
				$description = $this->input->post('description');
				$id_list = $this->input->post('id_list');
				$last_id = $this->items->setItem($name, $description, $this->session->userdata('idusuario'));
				$ret = $this->items->setItemList($last_id[0]->id, $id_list);

				$this->see_items($id_list);

				/*$items = $this->items->getItems($this->session->userdata('idusuario'));
	            
				$this->load->view(
	                'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
	                array(
	                    "modulo" => 'items',//Se le pasa el dato "modulo" con valor "login" al file "main"
	                    "pagina" => 'panel', //Se le pasa el dato "pagina" con valor "login" al file "main"
	                    "items" => $items,
	                    "idList" => $id_list
	                )
	            );*/

			}
		}else{
			$this->load->view(
                    'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
                    array(
                        "modulo" => 'login',//Se le pasa el dato "modulo" con valor "login" al file "main"
                        "pagina" => 'login' //Se le pasa el dato "pagina" con valor "login" al file "main"
                    )
                );
		}
	}

	public function edit_item($id_item,$id_list){
		if($this->session->userdata('idusuario')){
			$item = $this->items->getItemInfo($id_item);
			$this->load->view(
                'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
                array(
                    "modulo" => 'items',//Se le pasa el dato "modulo" con valor "login" al file "main"
                    "pagina" => 'edit', //Se le pasa el dato "pagina" con valor "login" al file "main"
                    "item" => $item[0],
                    "id_list" => $id_list
                )
            );


		}else{
			$this->load->view(
                'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
                array(
                    "modulo" => 'login',//Se le pasa el dato "modulo" con valor "login" al file "main"
                    "pagina" => 'login' //Se le pasa el dato "pagina" con valor "login" al file "main"
                )
            );

		}
	}

	public function confirm_edit_item(){
		if($this->session->userdata('idusuario')){
			$this->form_validation->set_rules('name', 'name', 'required|min_length[3]|max_length[32]');
			$this->form_validation->set_rules('description', 'description', 'max_length[250]');
			

			if (($this->form_validation->run() == FALSE))
			{

				$item = $this->items->getItemInfo($this->input->post('id'));
				$this->load->view(
		                    'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
		                    array(
		                        "modulo" => 'items',//Se le pasa el dato "modulo" con valor "login" al file "main"
		                        "pagina" => 'edit', //Se le pasa el dato "pagina" con valor "login" al file "main"
		                        "item" => $item[0],
		                        "id_list" => $this->input->post('id_list')
		                    )
		                );

			}else{
				$ret = $this->items->edit_item($this->input->post('id'), $this->input->post('name'), $this->input->post('description'))	;
				$items = $this->items->getItems($this->input->post('id_list'));
	            
				$this->load->view(
	                'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
	                array(
	                    "modulo" => 'items',//Se le pasa el dato "modulo" con valor "login" al file "main"
	                    "pagina" => 'panel', //Se le pasa el dato "pagina" con valor "login" al file "main"
	                    "items" => $items,
	                    "idList" => $this->input->post('id_list')
	                )
	            );

			}


		}else{
			$this->load->view(
                'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
                array(
                    "modulo" => 'login',//Se le pasa el dato "modulo" con valor "login" al file "main"
                    "pagina" => 'login' //Se le pasa el dato "pagina" con valor "login" al file "main"
                )
            );

		}
	}

	public function delete_item($id_item,$id_list){
		if($this->session->userdata('idusuario')){
			$item = $this->items->getItemInfo($id_item);
			$this->load->view(
                'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
                array(
                    "modulo" => 'items',//Se le pasa el dato "modulo" con valor "login" al file "main"
                    "pagina" => 'delete', //Se le pasa el dato "pagina" con valor "login" al file "main"
                    "item" => $item[0],
                    "idList" => $id_list
                )
            );


		}else{
			$this->load->view(
                'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
                array(
                    "modulo" => 'login',//Se le pasa el dato "modulo" con valor "login" al file "main"
                    "pagina" => 'login' //Se le pasa el dato "pagina" con valor "login" al file "main"
                )
            );

		}
	}

	public function confirm_delete_item(){
		if($this->session->userdata('idusuario')){
            $ret = $this->items->delete_item($this->input->post('id'));
            $ret = $this->items->delete_list_item($this->input->post('id'),$this->input->post('id_list'));
			
			$items = $this->items->getItems($this->input->post('id_list'));
            
			$this->load->view(
                'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
                array(
                    "modulo" => 'items',//Se le pasa el dato "modulo" con valor "login" al file "main"
                    "pagina" => 'panel', //Se le pasa el dato "pagina" con valor "login" al file "main"
                    "items" => $items,
                    "idList" => $this->input->post('id_list')
                )
            );
        }else{
        	$this->load->view(
                'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
                array(
                    "modulo" => 'login',//Se le pasa el dato "modulo" con valor "login" al file "main"
                    "pagina" => 'login' //Se le pasa el dato "pagina" con valor "login" al file "main"
                )
            );
        }

	}

	public function see_items($id){
		if($this->session->userdata('idusuario')){
            $items = $this->items->getItems($id);
			$this->load->view(
                'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
                array(
                    "modulo" => 'items',//Se le pasa el dato "modulo" con valor "login" al file "main"
                    "pagina" => 'panel', //Se le pasa el dato "pagina" con valor "login" al file "main"
                    "items" => $items,
                    "idList" => $id
                )
            );

        }else{
        	$this->load->view(
                'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
                array(
                    "modulo" => 'login',//Se le pasa el dato "modulo" con valor "login" al file "main"
                    "pagina" => 'login' //Se le pasa el dato "pagina" con valor "login" al file "main"
                )
            );
		}
	}

	public function deslogin(){

		if($this->session->userdata('idusuario')){
            $datos = array("idusuario"=> '',"nombre"=> '',"user"=> '');
			$this->session->unset_userdata($datos);
			$this->load->view(
                    'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
                    array(
                        "modulo" => 'login',//Se le pasa el dato "modulo" con valor "login" al file "main"
                        "pagina" => 'login' //Se le pasa el dato "pagina" con valor "login" al file "main"
                    )
                );
        }else{
            $this->load->view(
                    'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
                    array(
                        "modulo" => 'login',//Se le pasa el dato "modulo" con valor "login" al file "main"
                        "pagina" => 'login' //Se le pasa el dato "pagina" con valor "login" al file "main"
                    )
                );
        }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */