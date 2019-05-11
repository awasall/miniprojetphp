<!DOCTYPE html>
<html>
        <head>
        <Title>Modifier</Title> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
         </head>
         <body>
         <div class="container">
         <header>
         <h1 >ModifierProduit</h1>
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
  
  <button type="submit" name="modifier" class="btn btn-primary">Modifier</button>
  </div>
  </div>
</form>

<?php
 
 //$stock='stock.txt';
  if(isset($_POST['modifier'])){
    $fp=fopen('prod.txt','r');
 $stc =fopen('stock.txt','w');
 
    $ndp=$_POST['np'];
    $put=$_POST['pu'];
    $qt=$_POST['quantite'];
    $n=10;
    $montant=$put*$qt;
    while (!feof($fp))
            {
              $ligne=(fgets($fp));
              $produit=explode(",",$ligne);
              if( strcasecmp($ndp,$produit[0])==0){
                    
                    fputs($stc,$ndp.",".$put.",".$qt.",".$montant."\n");   
                }
                else{
                  fputs($stc,$ligne);
                }
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
            fclose($fp);
            fclose($stc);
            $fp='prod.txt';
            $stc='stock.txt';
            unlink($fp);
          rename($stc,$fp);
          $fp =fopen('prod.txt','r');
            fseek($fp,0);
            while (!feof($fp)){
                         
             $ligne=trim(fgets($fp));
             $produit=explode(",",$ligne);
             echo  '<tr>';
             if($produit[2]<10) 
             {
               for($i=0; $i<count( $produit); $i++)
              {
                if($produit[$i]!=""){ echo '<td class="bg-danger">' .$produit[$i]. '</td>';}
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
  }
  else{
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
  }
            ?>
            </div>
            </body>
            </html>