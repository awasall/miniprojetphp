<!DOCTYPE html>
<html>
        <head>
        <Title>Produit</Title> 
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        </head>
        <body>
       
        <div class="container">
        <?php
         $fp =fopen('prod.txt','r');
        
         echo'<table class="table">
         <tr>
         <thead class="thead-dark">
         <th scope="col">NOM</th>
         <th scope="col">Prix Unitaire</th>
         <th scope="col">Quantité</th>
         <th scope="col">Montant</th>
         </tr>
         </thead>
         '; 
         while (!feof($fp)){
                      
          $ligne=trim(fgets($fp));
          $produit=explode(",",$ligne);
          echo  '<tr>';
          if($produit[2]<10) 
          {
            for($i=0; $i<count( $produit); $i++)
           {
             echo '<td class="bg-danger">' .$produit[$i]. '</td>';
            }
        }
        else{
          for($i=0; $i<count( $produit); $i++)
          {

            echo  '<td>' .$produit[$i]. '</td>';
          }
        }
             echo  "</tr>";  
          }
          fclose($fp);
        ?>  
        </div> 
    </body>
</html>
