
<?php 

$db_DNS="mysql:host=localhost;dbname=project";
$user="root";
$db_pass='';

//require 'configuration.php';
try{
	$conn= new PDO($db_DNS,$user,$db_pass);
    
	

}
catch(PDOException $e){
	echo 'aucune connexion '.$e->getMessage();
}

?>
