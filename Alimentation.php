<?php
session_start();

$db = json_decode(file_get_contents("db.json"));

if(!empty($_POST['doses']))
{
	//echo $_POST["doses"];
	file_put_contents("doses.txt", intval($_POST['doses']));
	$_SESSION['info']->animal->last = time();
	
	
	for($i = 0; $i < count($db->people); $i++)
		if($db->people[$i]->email == $_SESSION['info']->email)
			$db->people[$i] = $_SESSION['info']; 
	file_put_contents("db.json", json_encode($db));
}

include ("head.php");
?>

<form action="" method="post">

	<p class="alimentation">
		Veuillez entrer le nombre de dose ci-dessous :
		<br/><br/>
		<input  name="doses" type="text" placeholder="1">&nbsp; dose(s)
		<br/><br/><input type="submit" value="Distribuer">
		<br/><br/>
		<?php
		$difference = (time() - $_SESSION['info']->animal->last);
		$seconds = $difference % 60;            //seconds
		$difference = floor($difference / 60);
		$min = $difference % 60;              // min
		$difference = floor($difference / 60);
		$hours = $difference;  //hours

		echo "Dernière distribution de " . intval(file_get_contents("doses.txt")) . " doses il y a  $hours h, $min min, $seconds s pour " . $_SESSION['info']->animal->nom; 
		?>
	</p>
</form>

<?php
include ("foot.php");
?>