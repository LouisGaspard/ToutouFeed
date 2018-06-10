<?php
include("head.php");

?>
<?php
$fichier1 = fopen('latitude.txt','r');
$ligne1 = fgets($fichier1);
fclose($fichier1);


$fichier2 = fopen('longitude.txt','r');
$ligne2 = fgets($fichier2);
fclose($fichier2);
?>




<p class="geolocalisation"><a href="https://www.google.fr/maps/@<?php echo $ligne1; ?>,<?php echo $ligne2; ?>,15z" width='600' height='450' frameborder='0' style='border:0' allowfullscreen>GoogleMap</a></p>

<?php
include("foot.php");
?>
