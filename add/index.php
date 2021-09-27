<?php  
session_start();
$host="localhost";
$dbname="project";
$user="root";
$password="";




$conn=new PDO("mysql:host=$host;dbname=$dbname","$user","$password");
@$deco=$_POST["deco"];

$id= $_SESSION["id"];
@$categorie=$_POST["categorie"];
@$ville=$_POST["ville"];
@$zone =$_POST["zone"];
@$adresse=$_POST["adresse"];
@$code_postale=$_POST["code_postale"];
@$nom =$_POST["nom"];
@$telephone=$_POST["telephone"];
@$email=$_POST["email"];
@$prix=$_POST["prix"];
@$type_prix=$_POST["type_prix"];
@$transacssion=$_POST["transacssion"];
@$conditione=$_POST["conditione"];
@$titre=$_POST["titre"];
@$description=$_POST["description"];

@$publier=$_POST["publier"];
@$date=date("Y/m/d");
if (strlen($categorie)==0){
    $categorie="emploi";
}
if (strlen($categorie)==0){
    $ville="casablanca";
}
if (strlen($type_prix)==0){
    $type_prix="eur";
}
if (strlen($transacssion)==0){
    $transacssion="tout";
}
if (strlen($conditione)==0){
    $conditione="tout";
}
 //session id variable superglobalr
@$array=array($zone,$adresse,$code_postale,$nom,$telephone,$email,$prix,$titre,$description);
@$array_string=array("zone","adresse","code postale","nom","telephone","email","prix","titre","discription");
    @$k=0;
    @$message_error=array();
 if (isset($publier)){
 
     $j=0;
     $new_array=array();
     
     for($i=0; $i<count($array);$i++){
        if ($array[$i]==""){
            $k=1;
            $new_array[$j]=$array_string[$i];
            $j=$j+1;

            
            

            
        }
        
            
        }
     
     if ($k==0){
         $message_error=array();
         $err=0;

        if (strlen($telephone)<10){
            $message_error[$err]= "numero de telephone n'est pas correcte<br>";
            $err+=1;
        }

       if ((!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))){
            $message_error[$err]="email n'est pas correcte<br>";


       }


        }
      
    
    
    
    
    if (count($message_error)==0 and $k==0){
        $b = getimagesize($_FILES["userImage"]["tmp_name"]);
        if($b !== false){
            //Récupérer le contenu de l'image
            $file = $_FILES['userImage']['tmp_name'];
            $image = addslashes(file_get_contents($file));
           
        $sql = "INSERT INTO annonces (ID_user,categorie,ville,zones, adresse, code_postale,nom,telephone,email,prix,type_prix,transacssion,conditione,titre,discription,dates,image)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";            
                $insert=$conn->prepare($sql);
                $insert->execute([$id,
                $categorie,
                $ville,
                $zone,
                $adresse,
                $code_postale,
                $nom,
                $telephone,
                $email,
                $prix,
                $type_prix,
                $transacssion,
                $conditione,
                $titre,
                $description,
                $date,$image]);



                   
            

               

                    
                }else{
                    echo "Veuillez sélectionner une image à uploader.";
                }
            
    }

    
    

    }
    if (isset($deco)){
        session_destroy(); //On détruit le cookie de l'identifiant
        header("location:../bloger/index.php");

    }

     
        
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>mounia.me</title>
    <link rel="icon" href="Image/engineer.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="Project.css">

    <link href="https://fonts.googleapis.com/css2?family=Arizonia&family=Montserrat:wght@400;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" />
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200;700&family=Teko:wght@500&display=swap');
    </style>

</head>

<body class="container-fluid body_section">
<form  action="index.php" enctype="multipart/form-data"
        method="post" >

    <head>
        <nav>
            <a href="#" class="logo">
                <img src="https://img.icons8.com/color/48/000000/m.png" />OUNIA.ma
            </a>

            <ul class="menu">
                <li><a href="../loginn/index.php" class="active">Se connecter</a></li>
                <li><a href="../bloger/index.php">acceuil</a></li>

                <li><a href="#about"> About</a></li>
                <li style="margin-right:60px"><a href="#about">Contact</a></li>
               
                <li><i class="uil uil-user icon"></i>
                    <?php echo $_SESSION["nom"] ?>
                </li>
                <button class="deco" value="deconnexion" name="deco" style="background-color: rgb(122, 122, 186);font-size:15px;border-radius:15px;margin-left:16px "> <i class="uil uil-sign-out-alt  icon" style="color:white" > </i></button>


            </ul>
        </nav>
    </head>


    <div class="container2">

        <div class="main-container">
            <div class="main">
                <section id=Projects class="Section1">
                    <div class="row">

                        <div class="col-lg-6 col-md-6 project-heading">
                            <ul class="welcome">
                                <li>
                                    <input type="checkbox" />
                                    <div class="welcome2">W</div>
                                </li>
                                <li>
                                    <input type="checkbox" />
                                    <div class="welcome2">E</div>
                                </li>
                                <li>
                                    <input type="checkbox" />
                                    <div class="welcome2">L</div>
                                </li>
                                <li>
                                    <input type="checkbox" />
                                    <div class="welcome2">C</div>
                                </li>
                                <li>
                                    <input type="checkbox" />
                                    <div class="welcome2">O</div>
                                </li>
                                <li>
                                    <input type="checkbox" />
                                    <div class="welcome2">M</div>
                                </li>
                                <li>
                                    <input type="checkbox" />
                                    <div class="welcome2">E</div>
                                </li>
                            </ul>
                            <p class="p-text">Sélectionnez votre catégorie ci-dessus, Renseignez les informations sur votre annonce : titre, prix, description, photos et localisation. Indiquez vos infos de contact : noms, téléphone.....puis cliquez sur 'publier'
                            </p>

                        </div>
                        <div class="col-lg-6 col-md-6">
                            <img class="projectimage" src="undraw_Add_tasks_re_s5yj (3).svg" alt="">
                        </div>
                    </div>

                </section>


            </div>

        </div>



    </div>

    <main>

        
            <section>
                <div class="first comp">
                    <h1 style="margin-bottom:60px; font-family:'Cairo', sans-serif; font-size:40px;font-weight:bold">
                        Publier une nouvelle annonce
                    </h1>
                    <div class="option1">

                        <div class="ca" id="backg1">
                            <div class="title">

                                <p class="type">Sélectionner une catégorie*</p>
                            </div>
                            <select class="catego " name="categorie " value=<?php echo $name;?>>
                        <option>
                        <i class="uil uil-user icon"></i>Emploi
                        </option>
                        <option>
                            Matériels professionnel
                        </option>
                        <option>
                            Véhicules
                        </option>
                        <option>
                            Immobilier
                        </option>
                        <option>
                            Ventes diverses
                        </option>
                        <option>
                            Jardin et Outils de bricolage
                        </option>
                        <option>
                            Services
                        </option>
                        <option>
                            Animaux
                        </option>
                        <option>
                            Rencontres
                        </option>
                    </select>
                        </div>

                    </div>
                    <div class="ca" id="backg">
                        <div class="title">

                            <p class="type">Où se trouve votre article?*</p>
                        </div>

                        <select class="catego" name="ville"  value=<?php echo $ville;?>>
                        <option>
                            Grand Casablanca
                        </option>
                        <option>
                            Chaouia-Ouardigha
                        </option>
                        <option>
                            Doukkala-Abda
                        </option>
                        <option>
                            Fès-Boulemane
                        </option>
                        <option>
                            Gharb-Chrarda-Beni Hssen
                        </option>
                        <option>
                            Guelmim-Es Semara
                        </option>
                        <option>
                            Marrakech-Tensift-Al Haouz
                        </option>
                        <option>
                            Meknès-Tafilalet
                        </option>
                        <option>
                            l'Oriental
                        </option>
                        <option>
                            Rabat-Salé-Zemmour-Zaër
                        </option>
                        <option>
                            Souss-Massa-Draâ
                        </option>
                        <option>
                            Tadla-Azilal
                        </option>
                        <option>
                            Tanger-Tétouan
                        </option>
                        <option>
                            Taza-Al Hoceïma-Taounate
                        </option>
                        <option>
                            Laayoune-Boujdour-Sakia-Hamra
                        </option>
                        <option>
                            Oued-Eddahab-Lagouira
                        </option>
                        <option>
                            tout le maroc
                        </option>
                       
                    </select>

                        <div class="content1">
                        <div>
                                <label>Zone de ville</label><br>
                                <input type="text"  name="zone" id="zone" value=<?php echo $zone;?>>


                            </div>
                            
                            <div>
                                <label>Adresse</label><br>
                                <input type="text" name="adresse"  value=<?php echo $adresse;?>>


                            </div>
                            <div>
                                <label> 
                                Code Postal</label><br>
                                <input type="text" name="code_postale" value=<?php echo $code_postale;?>>


                            </div>

                        </div>

                    </div>

                    <div class="ca" id="backg1">

                        <div class="content2">
                            <div>
                                <label>votre nom</label><br>
                                <input type="text" name="nom"  value=<?php echo $nom;?>>


                            </div>
                            <div>
                                <label> 
                                Téléphone portable*</label><br>
                                <input type="text" name="telephone" value=<?php echo $telephone;?>>


                            </div>
                            <div class="email">
                                <div>
                                    <label> 
                                </label> E-mail*
                                    <br>
                                    <input type="text" name="email" value=<?php echo $email;?>>

                                </div>


                            </div>

                        </div>


                    </div>
                    <div class="ca" id="backg">
                        <div class="title">

                            <p class="type">prix</p>
                        </div>
                        <div class="content2">

                            <DIV>

                                <span class="optionclass">
                            <select name="type_prix "  id="euro" class="child">
                                <option class="id1">EUR (EUR)</option>
                                <option class="id1">MAD (DH)</option>
                               <option class="id1">USD ($)</option>
                            </select>
                            </span><span class="text1">
                                <input type="text" list="euro" name="prix"  value=<?php echo $prix;?>  >
                            </span>

                            </DIV>






                        </div>
                        <div class="content9 " style="text-indent:20px">
                            <div>
                                <lablel class="label4">Transaction
                                </lablel><br><br>
                                <select name="transacssion"> 
                                <option>Tout</option>
                                <option>Vente</option>
                                <option>Acheter</option>
                                <option>Location</option>
                                <option>Echange</option>
    
                                
                            </select>


                            </div>
                            <div>
                                <lablel class="label4">Condition
                                </lablel><br><br>
                                <select name="conditione "> 
    
                                <option>Tout</option>
                                <option>Nouveau</option>
                                <option>Utilisé</option>
                                
    
                                
                            </select>


                            </div>


                        </div>




                    </div>
                    <div class="ca" id="backg1">



                        <div class="description">
                            <p>Titre </p>
                            <input type="text" name="titre"  value=<?php echo $titre;?>>
                            <p>Description
                            </p>
                            <div class="input-description">
                                <input type="text" name="description"  value=<?php echo $description;?>>>
                            </div>
                        </div>





                    </div>
                    <div class="ca" id="backg">
                        <div class="file">
                            <div class="photo">
                                <p>Photos</p>
                                <span>Vous pouvez télécharger jusqu'à 8 images par annonces</span>
                            </div>
                            <br>
                            <div id="dropContainer">
                                <p style="text-align: center; margin-top: 150px;">Drop files here to upload</p>
                            </div>
                            <p>Should update here: <span><input name="userImage" type="file" > </span></p>

                        </div>
                    </div>

                    <div class="submit">
                        <input type="submit" value="Publier"  name="publier">
                    </div>

                </div>

            </section>
        </form>

                <?php 
                if ( $k!=0){
                    
                    foreach ($new_array as $erreur){
                        
                        echo "<span style='color:black;text-align:center ;font-size:40px; font-family: EB Garamond, serif'>le champ de $erreur est vide <br></span>";
                        
                    }
                }
                else{
                    foreach ($message_error as $error1){
                        echo $error1;
                    }
                }
                ?>
            </div>
     
 





    </main>
   

    </script>
    <footer>
    <div class="page-wrapper">
    <div id="waterdrop"></div>
    <footer>
      <div class="footer-top">
        <div class="pt-exebar">

        </div>
        <div class="container" id="about">
          <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 footer-col-3">
              <div class="widget footer_widget">
                <h5 class="footer-title">Address</h5>
                <div class="gem-contacts">
                  <div class="gem-contacts-item gem-contacts-address">Norsys Afrique:<br> 
                  Lot. Koutoubia villa n°38 et 39, Quartier Amerchich, Marrakech 40000
                  </div>
                  <div class="gem-contacts-item gem-contacts-phone"><i class="fa fa-phone" aria-hidden="true"></i> Phone: <a href="">05243-00462</a></div>

                  <div class="gem-contacts-item gem-contacts-address mt-2">A propos:<br> Crée en 1996 à Marrakech, Norsys  Afrique, filiale du groupe Norsys, s’est spécialisée dans la réalisation de développement orientée sur les nouvelles technologies. Norsys Afrique est ainsi devenue un centre de développement du Groupe NORSYS.
                   .</div>
                  <div class="gem-contacts-item gem-contacts-phone"><i class="fa fa-phone" aria-hidden="true"></i> Phone: <a>05243-00462</a></div>

                </div>
              </div>

            </div>
            <div class="col-12 col-lg-6 col-md-6 col-sm-12">
              <div class="row">
                <div class="col-6 col-lg-6 col-md-6 col-sm-6">
                  <div class="widget footer_widget">
                    <h5 class="footer-title">Recent News</h5>
                    <ul class="posts  styled">
                      <li class="clearfix gem-pp-posts">
                        <div class="gem-pp-posts-text">
                          <div class="gem-pp-posts-item">
                            <a href="#">Want to get Your Project
                            </a>
                          </div>
                          <div class="gem-pp-posts-date">Norsys développe des applications métiers spécifiques pour ses clients et a toujours été pionnière dans les développements web, se spécialisant dans ce domaine dès sa création en 1994.</div>
                        </div>
                      </li>
                      <li class="clearfix gem-pp-posts">
                        <div class="gem-pp-posts-text">
                          <div class="gem-pp-posts-item">
                            <a href="#">Now we are in Faridabad,Now we are in DaudNagar.
                            </a>
                          </div>
                          <div class="gem-pp-posts-date">Call    (+212)5 24 30 04 62,</br> (+33) 3 69 61 82 59  </div>
                        </div>
                      </li>
                      <li class="clearfix gem-pp-posts">
                        <div class="gem-pp-posts-text">
                          <div class="gem-pp-posts-item">
                            <a href="">Mail:
                            </a>
                          </div>
                          <div class="gem-pp-posts-date">direction_naf@norsys.fr</div>
                        </div>
                      </li>

                    </ul>
                  </div>
                </div>
                <div class="col-6 col-lg-6 col-md-6 col-sm-6">
                  <div class="widget">
                    <h5 class="footer-title">Email Us</h5>
                    <div class="textwidget">
                      <div role="form" class="wpcf7" id="wpcf7-f4-o1" lang="en-US" dir="ltr">

                        <form method="post" class="wpcf7-form" novalidate="novalidate">

                          <div class="contact-form-footer">
                            <p><span class="wpcf7-form-control-wrap your-first-name"><input type="text" name="your-first-name" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Your name"></span></p>
                            <p><span class="wpcf7-form-control-wrap your-email_1"><input type="email" name="your-email_1" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email" aria-invalid="false" placeholder="Your email"></span></p>
                            <p><span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Your message"></textarea></span></p>
                            <div><input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit"><span class="ajax-loader"></span></div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-3 col-md-5 col-sm-12 footer-col-4">
              <div class="widget widget_gallery gallery-grid-4">
                <h5 class="footer-title">Our Gallery</h5>
                <ul class="magnific-image">

                  <li><a class="magnific-anchor"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScY5Bk96lHjkDrIwynmC98hgVAojqsuIO1rg&usqp=CAU" alt=""></a></li>
                  <li><a class="magnific-anchor"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScY5Bk96lHjkDrIwynmC98hgVAojqsuIO1rg&usqp=CAU" alt=""></a></li>
                  <li><a class="magnific-anchor"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScY5Bk96lHjkDrIwynmC98hgVAojqsuIO1rg&usqp=CAU" alt=""></a></li>
                  <li><a class="magnific-anchor"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScY5Bk96lHjkDrIwynmC98hgVAojqsuIO1rg&usqp=CAU" alt=""></a></li>
                  <li><a class="magnific-anchor"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScY5Bk96lHjkDrIwynmC98hgVAojqsuIO1rg&usqp=CAU" alt=""></a></li>
                  <li><a class="magnific-anchor"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScY5Bk96lHjkDrIwynmC98hgVAojqsuIO1rg&usqp=CAU" alt=""></a></li>
                  <li><a class="magnific-anchor"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScY5Bk96lHjkDrIwynmC98hgVAojqsuIO1rg&usqp=CAU" alt=""></a></li>
                  <li><a class="magnific-anchor"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScY5Bk96lHjkDrIwynmC98hgVAojqsuIO1rg&usqp=CAU" alt=""></a></li>
                  <li><a class="magnific-anchor"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScY5Bk96lHjkDrIwynmC98hgVAojqsuIO1rg&usqp=CAU" alt=""></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </footer>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script src="https://daniellaharel.com/raindrops/js/raindrops.js"></script>

 <script> jQuery('#waterdrop').raindrops({color:'#1c1f2f', canvasHeight:150, density: 0.1, frequency: 20});


</script> 



</body>


</html>