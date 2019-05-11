<?php
session_start();
?>
<!DOCTYPE html>
<html>
        <head>
        <Title>AUTHENTIFICATION</Title> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
         </head>
         <body>
         <div class="container">
         <header>
         <h1 class="text-center">AUTHENTIFICATION</h1>
         <header>
         <form  action='#' method='POST'>
  
  <div class="form-group">
 
    <input type="password"  name="password" class="form-control" id="password" placeholder="Entrer votre nouveau mot de pass">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" name="connexion" class="btn btn-primary">Connexion</button>
  
  </div>
  </form>
<?php
              
                if (isset ($_POST['connexion']))
                {
                    $fp =fopen('newuser.txt','r');
                    $dl=fopen('delete.txt','w');
                  $password=$_POST['password'];
                    $lp=false;
                    while (!feof($fp)){
                      $ligne=trim(fgets($fp));
                      $user=explode(",",$ligne);
                      if($user[0]==$_SESSION['login']){
                        $user[6]=$password;
                        
                    }
                    $modif=$user[0].",".$user[1].",".$user[2].",".$user[3].",".$user[4].",".$user[5].",".$user[6]."\n";
                        $newline=$newline.$modif; 
                    }
  fputs($dl,trim($newline));
   fclose($fp);
    fclose($dl);
    $fp='newuser.txt';
    $dl='delete.txt';
    unlink($fp);
    rename($dl,$fp);
 }
                    
                     
                    
                ?>
                
  
        
            
            
           </body>
   </html>         
