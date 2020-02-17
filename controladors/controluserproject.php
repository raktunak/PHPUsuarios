<?php

class controluserproject{
	private $userproject;
	private $missatge;
		
	function __construct() {
        
        if (!isset($_SESSION['username'])) {
            header('Location: index.php?control=controllogin');
            exit;
        } 
        
       

        include_once 'models/UserProject.php';
        $this->userproject = new UserProject();
        $this->missatge = "";
	}
	
	function index(){
        $codi=$_GET["codi"];
        $res = $this->userproject->getUsuariProjecte($codi);
        $res2 = $this->userproject->getNotUsuariProjecte($codi);
        
		if(isset($_SESSION["users"])){
			$res3 = $_SESSION["users"];
		}
        $missatge = $this->missatge;
		
		
        include_once 'vistes/templates/header.php';
        include_once 'vistes/userproject/llista.php';
        include_once 'vistes/templates/footer.php';
    }
    
    function deleteUserProject(){
        $codigoUsuario = $_GET['codigoUsuario'];
        $codigoProjecto = $_GET['codi'];
        $test = $this->userproject->deleteUserProject($codigoUsuario,$codigoProjecto);
        $this->index();
    }

    function putaMierda(){

    }
    function inserUserProject(){
        $codigoProjecto = $_GET['codi'];

        foreach ($_GET['codigoUsuarios'] as  $codigoUsuario) {
            
            $test = $this->userproject->insertUsuariProjecte($codigoUsuario,$codigoProjecto);
            //echo $test;
        }

       $this->index();
        
    }
	
	function projectsUs(){
        
                        if (isset($_SESSION['codi'])) {
                            $codiUser=$_SESSION['codi'];                            
                        }         
        $codisP = $this->userproject->codiProject($codiUser);
        $projectes= $this->userproject->getAllProject();
        include_once 'vistes/normal/templates/header.php';
        include_once 'vistes/userproject/llistaUsPr.php';
        include_once 'vistes/normal/templates/footer.php';   
	}
	function usuarisPro(){
        if (isset($_SESSION['codi'])) {
            $codiUser=$_SESSION['codi'];                            
        } 
       
        $codiProject=$_GET['codiProject'];
        $codiUser=$_GET['codiUser'];
    
        $codigosU = $this->userproject->codiUser($codiProject);
        $usuaris= $this->userproject->getAllUsuaris();
        include_once 'vistes/normal/templates/header.php';
        include_once 'vistes/userproject/llistaPrUs.php';
        include_once 'vistes/normal/templates/footer.php';   
	}
	
	
}
?>