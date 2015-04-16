<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start extends CI_Controller {

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
	
	function Start(){
        parent::__construct();
        $this->load->model('User_personal_model',"user");
    }
	public function index()
	{
		$this->load->view('login/login');
	}

	public function login()
	{
		//Validacion Requerida
		// - Campos Completos
		// - Extension de los campos.
		// - Caracteres especiales

		$this->form_validation->set_rules('usuario', 'usuario', 'required|min_length[3]|max_length[32]');
		$this->form_validation->set_rules('pass', 'pass', 'required');

		$usuario = $this->user->verify($this->input->post('usuario'),$this->input->post('pass'));

		if (($this->form_validation->run() == FALSE) || ($usuario==0))
		{
			$this->load->view(
                'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
                array(
                    "modulo" => 'login',//Se le pasa el dato "modulo" con valor "login" al file "main"
                    "pagina" => 'login' //Se le pasa el dato "pagina" con valor "login" al file "main"
                )
            );
		}
		else
		{
			$usuario = $this->user->intenta_loguear($this->input->post('usuario'),$this->input->post('pass'));
			$datos = array("idusuario"=> $usuario[0]->id,"nombre"=> $usuario[0]->nombre,"user"=> $usuario[0]->user);
			$listas = $this->user->getLists($usuario[0]->id);
            $this->session->set_userdata($datos);
			$this->load->view(
                'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
                array(
                    "modulo" => 'principal',//Se le pasa el dato "modulo" con valor "login" al file "main"
                    "pagina" => 'panel', //Se le pasa el dato "pagina" con valor "login" al file "main"
                    "usuario" => $usuario[0],
                    "lists" => $listas
                )
            );
		}
			
		
	}

	public function panel(){
		if($this->session->userdata('idusuario')){
			$listas = $this->user->getLists($this->session->userdata('idusuario'));
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