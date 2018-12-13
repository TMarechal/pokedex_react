<?php 
   header("content-type:image/png"); 
   $x=400; 
   $y=300;
//hgjhfgfnhfngfn 
   $img = imagecreatetruecolor($x,$y); 
   $gris = imagecolorallocate($img,220,220,220); 
   $bleu = imagecolorallocate($img,0,0,200); 
   imagefill($img,0,0,$gris);  
   imagepng($img); 
?> 
