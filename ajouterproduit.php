<!DOCTYPE html>
<html>
        <head>
        <Title>Ajouter</Title> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
         </head>
         <body>
         <div class="container">
         <header>
         <h1 >Ajouter Produit</h1>
         <header>
         <form  action="" method="POST">
    <div class="col-9">
      <input type="text"  name="np" class="form-control" id="np" placeholder="saisir un produit">
    </div>
    <div class="col-9">
      <input type="number"  name="pu" class="form-control" id="pu" placeholder="Enter prix unitaire">
    </div>

  
  <div class="col-9">
    
    <input type="number"  name="quantite" class="form-control" id="qt" placeholder="saisir quantite">
  </div>
  
  <button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>
  </div>
  </div>
</form>

<?php
 
  $fp =fopen('prod.txt','a+');
  
/*if (isset($_POST['ajouter']))
{*/
 
    $ndp=$_POST['np'];
    $put=$_POST['pu'];
    $qt=$_POST['quantite'];
    $n=10;
    $montant=$put*$qt;
    $t=false;
   
    while (!feof($fp))
            {
              $ligne=trim(fgets($fp));
              $produit=explode(",",$ligne);
              if( strcasecmp($ndp,$produit[0])==0){
                    $t=true;
                }
            }
            if($t==true && isset($_POST['ajouter'])){
                echo 'ce produit exist deja';
            }

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
            if($t==false && isset($_POST['ajouter'])){
              fputs($fp,"\n".$ndp.",".$put.",".$qt.",".$montant);
            }
            fseek($fp,0);
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
              
              if($produit[$i]!="") {echo  '<td>' .$produit[$i]. '</td>';}
             }
           }
                echo  "</tr>";  
             }
          echo'</table>';

fclose($fp);
            ?>
            </div>
            </body>
            </html>