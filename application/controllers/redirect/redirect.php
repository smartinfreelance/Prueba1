<?php


class Redirect extends CI_Controller
{
    function Redirect(){
        parent::__construct();
    }  
    
    function index()
    {
        if($this->session->userdata('idusuario')){
            $this->load->view(
                'main', //Dentro de la carpeta "backend" ubicada en "views" llama al file "main"
                array(
                    "modulo" => 'principal',//Se le pasa el dato "modulo" con valor "login" al file "main"
                    "pagina" => 'panel' //Se le pasa el dato "pagina" con valor "login" al file "main"
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

?>