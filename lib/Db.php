<?php

namespace App;


use PDO;

class Db{


        public $isCnx;
        private $datab;
      // Connexion à la base de données
       

         public function __construct($username="root",$password="root",$host="localhost",$dbname="jeukdo",$option = []){
                      $dsn = 'mysql:dbname='.$dbname.';charset=utf8;host='.$host;                      
                       try {
                             $this->datab = new PDO($dsn, $username, $password);
                           $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                        } 
                        catch (PDOException $e) {
                            throw new Exception($e->getMessage());
                        }
          $this->isCnx = TRUE; 
       }

	  // Disconnect from db
       public function Disconnect(){
         $this->datab = NULL;
         $this->isCnx = FALSE; 
       }
	  //Selectionner un ligne
             
          public function getRow($query,$param = []){
          try {
          	    $stmt = $this->datab->prepare($query);
          	    $stmt->execute($param);
                return $stmt->fetch();
          } catch (PDOException $e) {
          	
          	throw new Exception($e->getMessage());
          	
          }
       }
    

	  //selectionner des lignes

       public function getRows($query,$param = []){
        try {
          	    $stmt = $this->datab->prepare($query);
          	    $stmt->execute($param);
                
                return $stmt->fetchAll();
          } catch (PDOException $e) {
          	
          	throw new Exception($e->getMessage());
          	
          }
       }
	  //inserer un ligne

       public function insertRow($query,$param = []){
           try {
           	$stmt = $this->datab->prepare($query);
           	$stmt->execute($param);
           	return true;
           } catch (PDOException $e) {
           	
           	throw new Exception($e->getMessage());
           
           }
       }
	 //modifier un ligne
       public function updateRow($query,$param = []){
            return $this->insertRow($query,$param);
       }
	 //supprimer un ligne
       public function deleteRow($query,$param = []){
            return $this->insertRow($query,$param);
       }
}