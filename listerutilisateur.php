<!DOCTYPE html>
<html>
        <head>
        <Title>utilisateur</Title> 
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        </head>
        <body>
        <div class="container">
        <?php
         $fp =fopen('newuser.txt','r');
         echo'<table class="table">
         <tr>
         <thead class="thead-dark">
         <th scope="col">Login</th>
         <th scope="col">Nom</th>
         <th scope="col">Tel</th>
         <th scope="col">Adresse</th>
         <th scope="col">Profil</th>
         <th scope="col">Statut</th>
         </tr>
         </thead>
         '; 
         while (!feof($fp)){   
          $ligne=fgets($fp);
          $user=explode(",",$ligne);
          $c=count( $user);
          echo  '<tr>';
          for($i=0; $i<$c-2; $i++)
          {
            echo  '<td>' .$user[$i]. '</td>';
          }
          echo  '<td>' .'<a href="modifStatut.php?log='.$user[0].'">'.$user[5].'</a>'.'</td>';
          echo  "</tr>";  
        }
          fclose($fp);
        ?>  
        </div> 
    </body>
</html>
 