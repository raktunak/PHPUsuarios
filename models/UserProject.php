<?php
include_once 'Model.php';


class userproject extends Model{
	
	protected $taula = "usuarisprojecte";
	
	function afegir($codiUser,$codiProject){
		$sql = "insert into usuarisprojecte(codiprojecte,codiusuari) values 
				 (:codiprojecte,:codiusuari) ";
		$ordre = $this->bd->prepare($sql);
		$ordre->bindValue(':codiprojecte',$codiProject);
		$ordre->bindValue(':codiusuari',$codiUser);
		$res = $ordre->execute();
		
		return $res;
	}
	
	function codiProject($codiUser){
		$sql = "select codiprojecte from usuarisprojecte where codiusuari =:codiuser";
		$ordre = $this->bd->prepare($sql);
		$ordre -> bindValue(":codiuser",$codiUser);
		$ordre -> execute();
		$res = $ordre->fetchAll(PDO::FETCH_ASSOC); 
		
		return $res;
	}
	
	function codiUser($codiProject){
		$sql = "select codiusuari from ".$this->taula." where codiprojecte =:codiprojecte";
		$ordre = $this->bd->prepare($sql);
		$ordre -> bindValue(":codiprojecte",$codiProject);
		$ordre -> execute();
		$res = $ordre->fetchAll(PDO::FETCH_ASSOC); 
		
		return $res;
	}
	
	function getProject($codiProject){
		$taula = "projectes";
		$sql="select nom from ".$taula." where codi=:codiProject";
		$ordre = $this->bd->prepare($sql);
		$ordre->bindValue(":codiProject",$codiProject);
		$ordre->execute();
		$res = $ordre->fetchAll(PDO::FETCH_ASSOC); 
		return $res;
		
	}

	function getUsuariProjecte($codiProject){
		
		$sql="SELECT usuaris.codi,usuaris.nom,usuarisprojecte.codiProjecte,usuaris.username FROM usuarisprojecte LEFT JOIN usuaris ON usuaris.codi = usuarisprojecte.codiusuari where usuarisprojecte.codiprojecte = ".$codiProject;
		$ordre = $this->bd->prepare($sql);
		$ordre->bindValue(":codiProject",$codiProject);
		$ordre->execute();
		$res = $ordre->fetchAll(PDO::FETCH_ASSOC); 
		return $res;
		
	}
	function getNotUsuariProjecte($codiProject){
	
		$sql = "SELECT usuaris.nom,usuaris.codi,usuaris.username FROM usuaris WHERE not EXISTS (SELECT usuarisprojecte.codiusuari from usuarisprojecte where usuarisprojecte.codiprojecte = :codiProject AND usuaris.codi = usuarisprojecte.codiusuari)";
		$ordre = $this->bd->prepare($sql);
		$ordre->bindValue(":codiProject",$codiProject);
		$ordre->execute();
		$res = $ordre->fetchAll(PDO::FETCH_ASSOC); 
		return $res;
		
	}

	function getUser($codiUsuari){
		$taula = "usuaris";
		$sql="select nom, username from ".$taula." where codi=:codiUsuari";
		$ordre = $this->bd->prepare($sql);
		$ordre->bindValue(":codiUsuari",$codiUsuari);
		$res = $ordre->execute();
		
		return $res;
		
	}

	function deleteUserProject($codiUsuari,$codiProject){
	
		$sql="delete from usuarisprojecte where codiUsuari = :codiUsuari and codiProjecte = :codiProject";
		$ordre = $this->bd->prepare($sql);
		$ordre->bindValue(":codiUsuari",$codiUsuari);
		$ordre->bindValue(":codiProject",$codiProject);
		$res = $ordre->execute();
		
		return $res;
		
	}

	
	function insertUsuariProjecte($codiUsuari,$codiProject){
	
	
		$sql="insert into usuarisprojecte (codiusuari,codiprojecte) values(:codiUsuari,:codiProject)";
		$ordre = $this->bd->prepare($sql);
		$ordre->bindValue(":codiUsuari",$codiUsuari);
		$ordre->bindValue(":codiProject",$codiProject);
		$res = $ordre->execute();
		//echo ($codiProject);
		return $res;
		
	}
	 function getAllProject() {
		$sql = "select * from projectes";	
			
			$ordre = $this->bd->prepare($sql);	
			$ordre->execute();   
			$res = $ordre->fetchAll(PDO::FETCH_ASSOC); 
			return $res;
	   }
	 function getAllUsuaris() {
		$sql = "select * from usuaris";	
			
			$ordre = $this->bd->prepare($sql);	
			$ordre->execute();   
			$res = $ordre->fetchAll(PDO::FETCH_ASSOC); 
			return $res;
	   }
	
}
?>