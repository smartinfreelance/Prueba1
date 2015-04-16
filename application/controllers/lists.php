<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lists extends CI_Controller {

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
	
	function Lists(){
        parent::__construct();
        $this->load->model("lists_model","lists");
        $this->load->model("items_model","items");
    }
	public function index()
	{

		$listas = $this->user->getLists($usuario[0]->id);
        $this->session->set_userdata($datos);
		$this->load->view(
            'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
            array(
                "modulo" => 'principal',//Se le pasa el dato "modulo" con valor "login" al file "main"
                "pagina" => 'panel', //Se le pasa el dato "pagina" con valor "login" al file "main"
                "lists" => $listas
            )
        );
	}

	public function add_list()
	{
		if($this->session->userdata('idusuario')){
			$this->load->view(
	                    'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
	                    array(
	                        "modulo" => 'lists',//Se le pasa el dato "modulo" con valor "login" al file "main"
	                        "pagina" => 'add' //Se le pasa el dato "pagina" con valor "login" al file "main"
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

	public function confirm_add_list()
	{
		if($this->session->userdata('idusuario')){
			$this->form_validation->set_rules('name', 'name', 'required|min_length[3]|max_length[32]');
			$this->form_validation->set_rules('description', 'description', 'max_length[250]');

			if (($this->form_validation->run() == FALSE))
			{
				$this->load->view(
		                    'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
		                    array(
		                        "modulo" => 'lists',//Se le pasa el dato "modulo" con valor "login" al file "main"
		                        "pagina" => 'add' //Se le pasa el dato "pagina" con valor "login" al file "main"
		                    )
		                );

			}else{
				$name = $this->input->post('name');
				$description = $this->input->post('description');
				$last_id = $this->lists->setList($name, $description, $this->session->userdata('idusuario'));

				$ret = $this->lists->setListUser($last_id[0]->id, $this->session->userdata('idusuario'));
				$listas = $this->lists->getLists($this->session->userdata('idusuario'));
	            
				$this->load->view(
	                'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
	                array(
	                    "modulo" => 'principal',//Se le pasa el dato "modulo" con valor "login" al file "main"
	                    "pagina" => 'panel', //Se le pasa el dato "pagina" con valor "login" al file "main"
	                    "lists" => $listas
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

	public function edit_list($id_list){
		if($this->session->userdata('idusuario')){
			$list = $this->lists->getListInfo($id_list);
			$this->load->view(
                'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
                array(
                    "modulo" => 'lists',//Se le pasa el dato "modulo" con valor "login" al file "main"
                    "pagina" => 'edit', //Se le pasa el dato "pagina" con valor "login" al file "main"
                    "list" => $list[0]
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

	public function confirm_edit_list(){
		if($this->session->userdata('idusuario')){
			$this->form_validation->set_rules('name', 'name', 'required|min_length[3]|max_length[32]');
			$this->form_validation->set_rules('description', 'description', 'max_length[250]');
			

			if (($this->form_validation->run() == FALSE))
			{

				$list = $this->lists->getListInfo($this->input->post('id'));
				$this->load->view(
		                    'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
		                    array(
		                        "modulo" => 'lists',//Se le pasa el dato "modulo" con valor "login" al file "main"
		                        "pagina" => 'edit', //Se le pasa el dato "pagina" con valor "login" al file "main"
		                        "list" => $list[0]
		                    )
		                );

			}else{
				$ret = $this->lists->edit_list($this->input->post('id'), $this->input->post('name'), $this->input->post('description'))	;
				$listas = $this->lists->getLists($this->session->userdata('idusuario'));
	            
				$this->load->view(
	                'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
	                array(
	                    "modulo" => 'principal',//Se le pasa el dato "modulo" con valor "login" al file "main"
	                    "pagina" => 'panel', //Se le pasa el dato "pagina" con valor "login" al file "main"
	                    "lists" => $listas
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

	public function delete_list($id_list){
		if($this->session->userdata('idusuario')){
			$list = $this->lists->getListInfo($id_list);
			$this->load->view(
                'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
                array(
                    "modulo" => 'lists',//Se le pasa el dato "modulo" con valor "login" al file "main"
                    "pagina" => 'delete', //Se le pasa el dato "pagina" con valor "login" al file "main"
                    "list" => $list[0]
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

	public function confirm_delete_list(){
		if($this->session->userdata('idusuario')){
            $ret = $this->lists->delete_list($this->input->post('id'));
			$listas = $this->lists->getLists($this->session->userdata('idusuario'));
            
			$this->load->view(
                'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
                array(
                    "modulo" => 'principal',//Se le pasa el dato "modulo" con valor "login" al file "main"
                    "pagina" => 'panel', //Se le pasa el dato "pagina" con valor "login" al file "main"
                    "lists" => $listas
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

	public function see_list($id){
		if($this->session->userdata('idusuario')){
            $items = $this->items->getItems($id);
			$this->load->view(
                'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
                array(
                    "modulo" => 'principal',//Se le pasa el dato "modulo" con valor "login" al file "main"
                    "pagina" => 'panel', //Se le pasa el dato "pagina" con valor "login" al file "main"
                    "lists" => $items
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