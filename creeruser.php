<!DOCTYPE html>
<html>
        <head>
        <Title>Creer utilisateur</Title> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
         </head>
         <body>
         <div class="container">
         <header>
         <h1 class="text-center">créer utilisateur</h1>
         <header>
         <form  action='#' method='POST'>
        
  <div class="form-group">
  <input type="text"  name="login" class="form-control" id="login" placeholder="Entrer un login">
    </div>
    <div class="form-group">
  <input type="text"  name="nom" class="form-control" id="nom" placeholder="Entrer un nom">
    </div>
    <div class="form-group">
  <input type="numeric"  name="telephone" class="form-control" id="telephone" placeholder="Enter un numéro de téléphone">
    </div>
    <div class="form-group">
  <input type="text"  name="adresse" class="form-control" id="adresse" placeholder="Enter une adresse">
    </div>
    <div class="form-group">
  <input type="text"  name="profil" class="form-control" id="profil" placeholder="Enter le profil">
    </div>
  <div class="form-group">
    <input type="password"  name="password" class="form-control" id="password" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" name="inscription" class="btn btn-primary">Inscription</button>
  
  </div>
  </form>

<?php
               $fp =fopen('newuser.txt','a+');
          
                //if (isset ($_POST['inscription']))
                //{
                  $login=$_POST['login'];
                  $nom=$_POST['nom'];
                  $telephone=$_POST['telephone'];
                  $adresse=$_POST['adresse'];
                  $profil=$_POST['profil'];
                  $password=$_POST['password'];
                    $lp=false;
                    while (!feof($fp))
                    {
                      $ligne=trim(fgets($fp));
                      $user=explode(",",$ligne);
                      
                      if($user[0]==$login ){
                        $lp=true;
                      
                     }
                    }

                    if($lp==true && isset($_POST['inscription'])){
                        echo" Ce login existe déja";
                        
                    }
                    echo'<table class="table">
                    <tr>
                    <thead class="thead-dark">
                    <th scope="col">login</th>
                    <th scope="col">nom</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Profil</th>
                    <th scope="col">Statut</th>
                    </tr>
                    </thead>
                    ';
                    $statut="Bloquer";
                    if($lp==false && isset($_POST['inscription'])){
                      fputs($fp,"\n".$login.",".$nom.",".$telephone.",".$adresse.",".$profil.",".$statut.",".$password);
                    }
                    fseek($fp,0);
                    while (!feof($fp)){
                     $ligne=trim(fgets($fp));
                     $user=explode(",",$ligne);
                     echo  '<tr>';
                     for($i=0; $i<count( $user)-1; $i++)
                     {
                      
                      if($user[$i]!="") {echo  '<td>' .$user[$i]. '</td>';}
                     }
                        echo  "</tr>";  
                     }
                  echo'</table>';
                   
                          fclose($fp);
                ?>
                
  
        
                </div>
            
           </body>
   </html>         
