<!DOCTYPE html>
<html>
        <head>
        <Title>Rechercherproduit</Title> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
         </head>
         <body>
         
         <form class="form-inline" action="" method="POST">
         <div class="container">
  <div class="form-group">
    <label for="quantite">Quantité</label>
    <input type="number"  name="quantite" class="form-control" id="quantite" placeholder="Enter un seuil de quantité">
    <input type="number"  name="pmin" class="form-control" id="pmin" placeholder="Enter prix minimum">
    <input type="number"  name="pmax" class="form-control" id="pmax" placeholder="Enter prix maximum">
  <button type="submit" name="rechercher" class="btn btn-primary">Rechercher</button>

  </div>
  </div>
</form>
<div class="container">
<?php

$fp =fopen('prod.txt','r');
        if (isset ($_POST['rechercher']))
        {
            $qt=$_POST['quantite'];
            $min=$_POST['pmin'];
            $max=$_POST['pmax'];
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
            while (!feof($fp))
            {
              $ligne=fgets($fp);
          $produit=explode(",",$ligne);
                if ((!empty ($_POST['quantite'])) and (empty ($_POST['pmin'])) and (empty ($_POST['pmax']))){
               if($qt<=$produit[2]) 
               {
                echo '<tr>';
           
                if($produit[2]<10) 
          {
            for($i=0; $i<count( $produit); $i++)
           {
             echo '<td class="bg-danger">' .$produit[$i]. '</td>';
            }
                  }else
                  {
                    for($i=0; $i<count( $produit); $i++)
                    
                    {
                      echo '<td>' .$produit[$i]. '</td>';
                    }
                  }
                echo "</tr>";
               }
            }
            else if ((!empty ($_POST['pmin'])) and (empty ($_POST['quantite'])) and (empty ($_POST['pmax']))){
                if($min<$produit[1]){
                echo '<tr>';
                if($produit[2]<10) 
          {
            for($i=0; $i<count( $produit); $i++)
           {
             echo '<td class="bg-danger">' .$produit[$i]. '</td>';
            }
                  }else
                  {
                    for($i=0; $i<count( $produit); $i++)
                    {
                      echo '<td>' .$produit[$i]. '</td>';
                    }
                  }
                echo "</tr>";

               }
            }
            else if ((!empty ($_POST['pmax'])) and (empty ($_POST['pmin'])) and (empty ($_POST['quantite']))){

               if($max>$produit[1]){
                echo '<tr>';
                if($produit[2]<10) 
          {
            for($i=0; $i<count( $produit); $i++)
           {
             echo '<td class="bg-danger">' .$produit[$i]. '</td>';
            }
                  }else
                  {
                    for($i=0; $i<count( $produit); $i++)
                    {
                      echo '<td>' .$produit[$i]. '</td>';
                    }
                  }
                echo "</tr>";

               }
            }
            else if( (!empty ($_POST['pmin'])) and (!empty ($_POST['pmax'])) and (empty ($_POST['quantite']))){
                if($min<$max){
                    if($min<$produit[1] && $max>$produit[1]){
                   
                        echo '<tr>';
                        if($max>$produit[1]){
                          echo '<tr>';
                          if($produit[2]<10) 
                    {
                      for($i=0; $i<count( $produit); $i++)
                     {
                       echo '<td class="bg-danger">' .$produit[$i]. '</td>';
                      }
                            }else
                          {
                            for($i=0; $i<count( $produit); $i++)
                            {
                              echo '<td>' .$produit[$i]. '</td>';
                            }
                          }
                        echo "</tr>";
                       }
                }
                else{
                    echo"le prix minimum ne doit pas dépassé le prix maximum";
                }   
            }
            
        else if( (!empty ($_POST['quantite'])) and (!empty ($_POST['pmin'])) and (!empty ($_POST['pmax']))){
               
            if ($qt<=$produit[2] && ( $min<$produit[$i][1] && $max>$produit[1])){
               echo '<tr>';
               if($produit[2]<10) 
                    {
                      for($i=0; $i<count( $produit); $i++)
                     {
                       echo '<td class="bg-danger">' .$produit[$i]. '</td>';
                      }
                            }else
              {
                for($i=0; $i<count( $produit); $i++)
                {
                  echo '<td>' .$produit[$i]. '</td>';
                }
              }
                echo "</tr>";

               }
            }
            }
        }
                
      }             
		
        fclose($fp);
        
            ?>
            </div>
           </body>
   </html>         