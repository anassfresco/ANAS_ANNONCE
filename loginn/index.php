<?php 
session_start();
include("connexion.php");



@$name=$_POST["name"];
@$email=$_POST["email"];
@$pass=$_POST["pass"];
@$login=$_POST["login"];
@$message="";
@$loginn=$_POST["loginn"];
@$emaile=$_POST["emaile"];
@$passe=$_POST["passe"];

if(isset($login)){
	

	if(empty($message)){
		include("connexion.php");
		$req=$conn->prepare("SELECT id FROM  user WHERE email=? LIMIT 1");
		$req->setFetchMode(PDO::FETCH_ASSOC);
		$req->execute(array($email));
		$tab=$req->fetchAll();
		if(count($tab)>0){
			$message="<li>Login existe deja !</li>";
		}
		else{
			$ins=$conn->prepare("INSERT INTO user (nom,email,pass) VALUES(?,?,?)");
			$ins->execute(array($name,$email,md5($pass)));
      
		}
	}
     
      
     


}

if(isset($loginn)){
  @$message="";


      //The SQL query.
      $sql = "SELECT COUNT(*) AS num FROM user WHERE email =:email " ;


      //Prepare the SQL stateme
      $stmt = $conn->prepare($sql);

      //Bind our email value to the :email parameter.
      $stmt->bindValue(':email', $emaile);

      //Execute the statement.
      $stmt->execute();

      //Fetch the row / result.
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      //If num is bigger than 0, the email already exists.
      if($row['num'] > 0){
        
          $stmt = $conn->prepare("SELECT id,nom FROM user WHERE email=?");

          $stmt->execute([$emaile]); 
          $user = $stmt->fetch();
         
          $_SESSION["nom"]=$user[1];
          $_SESSION["id"]=$user[0];
          if (!($_SESSION["add"])){
          header("location:../bloger/index.php");}
          else{
            header("location:../add/index.php");
          }
        } 
        else {
            $message="email ou mot de passe n'est pas correct";
          }
          

          
         
} 






?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body> 
    <div class="container" id="sign-in" id="sign-up">
      <div class="forms-container">
        <div class="signin-signup">
          <form method="post" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="emaile" placeholder="Username ou email"  required <?php echo $emaile?>/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="passe" placeholder="Password" required <?php echo $passe?> />
            </div>
            <input type="submit" href="../bloger/index.php"value="Login" name="loginn" class="btn solid" />
            <p style="color:blue"> <?php echo $message ?></p>
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="https://web.facebook.com/?_rdc=1&_rdr" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="https://mobile.twitter.com/login" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="https://accounts.google.com/o/oauth2/auth/oauthchooseaccount?response_type=code&access_type=online&client_id=705410132988.apps.googleusercontent.com&redirect_uri=https%3A%2F%2Flogin.france-ioi.org%2Foauth_client%2Fcallback%2Fgoogle&state=4df8XsabxR3uS7AbbqfjpOIToSsWYHtMaeWaCrg7&scope=openid%20profile%20email&approval_prompt=auto&openid.realm=https%3A%2F%2Flogin.france-ioi.org&flowName=GeneralOAuthFlow" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="https://www.linkedin.com/login/" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
          <form method="post" class="sign-up-form ">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" required name="name"  <?php echo $name?> />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email"  name="email"placeholder="Email" required <?php echo $email?> />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="pass"  required <?php echo $pass?> />
            </div>
            <input  href="sign-in" type="submit" class="btn" value="Sign up" name="login" />
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="https://web.facebook.com/?_rdc=1&_rdr" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="www.twitter.com" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="www.google.com" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="www.linkedin.com" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
                  
            

        </div>
       
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Pas encore de compte ? Créer votre  compte facilement
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Vous avez deja un compte ? Veuillez se connecter!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>