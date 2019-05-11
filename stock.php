<?php
$stock='stock.txt';
$fp =fopen('produit.txt','r');
$stc =fopen('stock.txt','a+');
$st=false;
while (!feof($fp))
            {
              $ligne=trim(fgets($fp));
              $produit=explode(",",$ligne);
              if( strcasecmp($ndp,$produit[0])==0){
                fputs($stc,"\n".$ndp.",".$put.",".$qt.",".$montant);    
                }
                else{
                    fputs($stc,"\n".$produit[0].",".$produit[1].",".$produit[2].",".$produit[3]);
                }
            }
            fclose($fp);
            fclose($stc);
          unlink($fp);
          rename($stc,$fp);
            




?>