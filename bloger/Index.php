<?php


include "../connection/connection.php";



if(!(@$_SESSION["nom"])){
    @$_SESSION["nom"]="guest    ";
  }
@$btn=$_POST["button"];

if (isset($btn)){

    if (!($_SESSION["id"])){
        header("location:../loginn/index.php");
        $_SESSION["add"]=1;
    }
    else{
        header("location:../add/index.php");
    }

    
}

@$deco=$_POST["product_id"];
if (isset($deco)){
    session_destroy(); //On détruit le cookie de l'identifiant
    header("location:./index.php");
}

@$id=$_SESSION["id"];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blooger</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="./css/all.css">


    <!-- --------- Owl-Carousel ------------------->

    <!-- ------------ AOS Library ------------------------- -->
    <link rel="stylesheet" href="./css/aos.css">

    <!-- Custom Style   -->
    <link rel="stylesheet" href="./css/Style.css">


</head>

<body>

    <!-- ----------------------------  Navigation ---------------------------------------------- -->
<form method="POST" action="index.php">
    <section class="main">
        <nav class="nav">
            <a href="#" class="logo">
                <img src="https://img.icons8.com/color/48/000000/m.png" />ounia.ma
            </a>

            <ul class="menu">
                <li><a href="../loginn/index.php" class="active">S'inscrire</a></li>
                <li><a href="../loginn/index.php#sign-up" >Se connecter</a></li>

                <li><a href=""> About</a></li>
                <li><a href="#contacte">Contact</a></li>
                
                <li><i class="uil uil-user icon"> </i><span style="color:white ;font-size:20px" > <?php  echo $_SESSION["nom"]        ?></span>
                <button id="div-02" value="deconnexion" name="product_id" style="background-color: #fc6f41;border-radius:15px;margin-left:16px " > <i class="uil uil-sign-out-alt  icon"> </i></button>
                

                </li>


            </ul>
        </nav>
        <div class="main-heading" >
            <h1>Faire de bonnes affaires avec Mounia.ma</h1>
            <p>Le site d’annonce Maroc pour faire de bonnes affaires.Vous êtes à la recherche d’un nouvel ordinateur ? Vous aimeriez trouver la voiture de vos rêves, à un prix aussi bas que possible ? C’est le souhait de nombreuses personnes, et si vous
                en faites partie.</p>
            <input type="submit" class="main-btn" name="button" value="Ajouter Votre Annonce">
        </div>
    </section>

    <!-- ------------x---------------  Navigation --------------------------x------------------- -->

    <!----------------------------- Main Site Section ------------------------------>

    <main>

        <!------------------------ Site Title ---------------------->



        <!------------x----------- Site Title ----------x----------->

        <!-- --------------------- Blog Carousel ----------------- -->



        <!-- ----------x---------- Blog Carousel --------x-------- -->

        <!-- ---------------------- Site Content -------------------------->

        <section class="containere">
            <div class="site-content">
                <div class="posts">
                    <h1 class="hclas">dernières annonces </h1>
                    <?php
                    
                    if($_SESSION["nom"]!="guest    "){
                    $boucle=" SELECT  * FROM annonces where ID_user!=$id ORDER BY RAND() ";
                    $ins=$conn->query($boucle); 
                    while($data = $ins->fetch(PDO::FETCH_ASSOC)){
                        
                    $categorie=$data["categorie"];
                    $ville=$data["ville"];
                    $zone=$data["zones"];
                    $adresse=$data["adresse"];
                    $code_postale=$data["code_postale"];
                     $nom=$data["nom"];
                    $telephone=$data["telephone"];
                    $email=$data["email"];
                    $prix=$data["prix"];
                     $type_prix=$data["type_prix"];
                     $transacssion=$data["transacssion"];
                    $conditione=$data["conditione"];
                    $titre=$data["titre"];
                    $description=$data["discription"];
                    $date=$data["dates"];
                     $image=$data["image"];
                    
                    
                    echo 
                    "<div class='card'>

                        
                        <div id='containere'>

                            <div class='product-details'>




                                <h1>$titre</h1>
                                <span class='hint-star star'>
                            <i class='fa fa-star' aria-hidden='true'></i>
                            <i class='fa fa-star' aria-hidden='true'></i>
                            <i class='fa fa-star' aria-hidden='true'></i>
                            <i class='fa fa-star' aria-hidden='true'></i>
                            <i class='fa fa-star' aria-hidden='true'></i> 
                                    </span>

                                <p class='information'> $description</p>



                                <div class='control'>

                                    <button class='btnn'>
                                    <span class='price'> $prix $type_prix </span>
                            <span class='shopping-cart'><i class='fa fa-shopping-cart' aria-hidden='true'></i></span>
                            <span class='buy'>Get now</span>
                            </button>

                                </div>

                            </div>

                            <div class='product-image'>

                                
                            '<img src='data:image/jpeg;base64," .  base64_encode($data["image"])  . "' />'
                             alt=''>


                                <div class='info'>
                                    <h2> informations</h2>
                                    <ul>
                                        <li><strong>categorie:$categorie  </strong> </li>
                                        <li><strong>ville:$ville  </strong></li>
                                        <li><strong>conditione:$conditione </strong></li>
                                        <li><strong>transacssion:$transacssion </strong></li>
                                        <li><strong>date:$date de pub: </strong></li>
                                        <li><strong>email:$email </strong></li>
                                        <li><strong>telephone:$telephone </strong></li>

                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    " ;}
                    }
                    else{
                        
                            $boucle=" SELECT  * FROM annonces ORDER BY RAND() limit 5 ";
                            $ins=$conn->query($boucle); 
                            while($data = $ins->fetch(PDO::FETCH_ASSOC)){
                                
                            $categorie=$data["categorie"];
                            $ville=$data["ville"];
                            $zone=$data["zones"];
                            $adresse=$data["adresse"];
                            $code_postale=$data["code_postale"];
                             $nom=$data["nom"];
                            $telephone=$data["telephone"];
                            $email=$data["email"];
                            $prix=$data["prix"];
                             $type_prix=$data["type_prix"];
                             $transacssion=$data["transacssion"];
                            $conditione=$data["conditione"];
                            $titre=$data["titre"];
                            $description=$data["discription"];
                            $date=$data["dates"];
                             $image=$data["image"];
                            
                            
                            echo 
                            "<div class='card'>
        
                                
                                <div id='containere'>
        
                                    <div class='product-details'>
        
        
        
        
                                        <h1>$titre</h1>
                                        <span class='hint-star star'>
                                    <i class='fa fa-star' aria-hidden='true'></i>
                                    <i class='fa fa-star' aria-hidden='true'></i>
                                    <i class='fa fa-star' aria-hidden='true'></i>
                                    <i class='fa fa-star' aria-hidden='true'></i>
                                    <i class='fa fa-star' aria-hidden='true'></i> 
                                            </span>
        
                                        <p class='information'> $description</p>
        
        
        
                                        <div class='control'>
        
                                            <button class='btnn'>
                                            <span class='price'> $prix $type_prix </span>
                                    <span class='shopping-cart'><i class='fa fa-shopping-cart' aria-hidden='true'></i></span>
                                    <span class='buy'>Get now</span>
                                    </button>
        
                                        </div>
        
                                    </div>
        
                                    <div class='product-image'>
        
                                        
                                    '<img src='data:image/jpeg;base64," .  base64_encode($data["image"])  . "' />'
                                     alt=''>
        
        
                                        <div class='info'>
                                            <h2> informations</h2>
                                            <ul>
                                                <li><strong>categorie:$categorie  </strong></li>
                                                <li><strong>ville:$ville  </strong></li>
                                                <li><strong>conditione:$conditione </strong></li>
                                                <li><strong>transacssion:$transacssion </strong></li>
                                                <li><strong>date:$date de pub: </strong></li>
                                                <li><strong>email:$email </strong></li>
                                                <li><strong>telephone:$telephone </strong></li>
        
                                            </ul>
                                        </div>
                                    </div>
        
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            " ;}
                    }

                    ?>

                    

                  

                    


                </div>
                <aside class="sidebar">
                    <div class="category">
                        <h2>Category</h2>
                        <ul class="category-list">
                            <li class="list-items" data-aos="fade-left" data-aos-delay="100">
                                <a href="#"> Emploi</a>
                                <span>(05)</span>
                            </li>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="200">
                                <a href="#">Matériels professionnel</a>
                                <span>(02)</span>
                            </li>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="300">
                                <a href="#">Véhicules</a>
                                <span>(07)</span>
                            </li>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="400">
                                <a href="#">Immobilier</a>
                                <span>(01)</span>
                            </li>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="500">
                                <a href="#">Ventes diverses</a>
                                <span>(08)</span>
                            </li>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="500">
                                <a href="#">Jardin et Outils de bricolage</a>
                                <span>(08)</span>
                            </li>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="500">
                                <a href="#"> Services</a>
                                <span>(08)</span>
                            </li>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="500">
                                <a href="#"> Animaux </a>
                                <span>(08)</span>
                            </li>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="500">
                                <a href="#"> Rencontres</a>
                                <span>(08)</span>
                            </li>
                        </ul>
                    </div>
                    <div class="popular-post">
                        <h2>mes annonce</h2>
                        <?php
                        if( @$_SESSION["nom"]!="guest    "){
                        $boucle2=" SELECT  * FROM annonces where ID_user=$id ORDER BY RAND() ";
                        $ins2=$conn->query($boucle2); 
                        while($data = $ins2->fetch(PDO::FETCH_ASSOC)){
                            
                        
                       
                       
                        
                        
                         
                        
                       
                       
                         
                        
                        
                       $titre=$data["titre"];
                        $description=$data["discription"];
                        $date=$data["dates"];
                         $image=$data["image"];
                        
                            echo 
                        "
                        <div class='removed'>
                            <div class='post-content'>
                                <span class='remove'><i class='uil uil-times icon'></i></span>
                                <span class='edit'><i class='uil uil-edit-alt icon'></i></span>
                                <div class='post-image'>
                                    <div>
                                    '<img src='data:image/jpeg;base64," . base64_encode($data["image"])  . "' />'
                                        
                                    </div>
                                    <div class='post-info flex-row'>
                                        <span><i class='fas fa-calendar-alt text-gray'></i>&nbsp;&nbsp;$date</span>
                                        <span>2 Commets</span>
                                    </div>
                                </div>
                                <div class='post-title'>
                                    <a href='#'>$description</a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        ";

                        }
                    }
                    else{
                        echo "vous n'êtes pas connecté";
                    }
                        ?>
                        
                       

                        <div class="wrapper " id="contacte">
                            <h1>contact </h1>
                            <br>
                            <br>
                            <div class="form">
                                <br>
                                <div class="secondaryTitle title">Please fill this form to contact us.</div>
                                <input type="text" class="name formEntry" placeholder="Name" />
                                <input type="text" class="email formEntry" placeholder="Email" />
                                <textarea class="message formEntry" placeholder="Message"></textarea>
                                <input type="checkbox" class="termsConditions" value="Term">
                                <label class="hello" style="color: grey;margin-right:20px ;" for="terms "> I Accept the Terms of Use & Privacy Policy.</label><br>
                                <button class="submit formEntry" onclick="thanks()">Send</button>

                            </div>

                            ?>

                    </div>
                    <div>




                    </div>
                </aside>
            </div>
        </section>

        <!-- -----------x---------- Site Content -------------x------------>

    </main>
    
<n/form>

    <!---------------x------------- Main Site Section ---------------x-------------->


    <!-- --------------------------- Footer ---------------------------------------- -->

    <!-- -------------x------------- Footer --------------------x------------------- -->

    <!-- Jquery Library file -->
    <script src="./js/Jquery3.4.1.min.js"></script>

    <!-- --------- Owl-Carousel js ------------------->
    <script src="./js/owl.carousel.min.js"></script>

    <!-- ------------ AOS js Library  ------------------------- -->
    <script src="./js/aos.js"></script>

    <!-- Custom Javascript file -->
    <script src="./js/main.js"></script>
  

</body>

</html>