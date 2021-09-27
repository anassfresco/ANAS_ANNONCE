


<?php
    session_start();
    $host="localhost";
    $dbname="project";
    $user="root";
    $password="";
    
    
    
    
    $conn=new PDO("mysql:host=$host;dbname=$dbname","$user","$password");
    
    // Vérifier la connexion
    
    


    
?>
<?php $MyPDO = $conn->query("SELECT * FROM annonces ORDER BY RAND()"); 

while($data = $MyPDO->fetch(PDO::FETCH_ASSOC)){
    echo "<img src='data:image/jpg;base64," .  base64_encode($data["image"])  . "' />";

}
 ?>