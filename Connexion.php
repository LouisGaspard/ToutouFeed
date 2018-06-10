<?php
session_start();
if(!empty($_POST['mail']) && !empty($_POST['pass']))
{
	$db = json_decode(file_get_contents("db.json"));
	$people = $db->people;
	//print_r($people);

	foreach($people as $person)
	{
		if($person->email == $_POST['mail'] && $person->pw == md5($_POST['pass']))
		{
			$_SESSION['connected'] = 1;
			$_SESSION['info'] = $person;
			
		}
	}
}

if ($_SESSION['connected'] !=1) include("head.php");
else header("Location: index.php");

?>

<form action="" method="post">
	<p  style="margin-top: 54px;"  class="connect">
		email :
		<input  name="mail"  type="email">
		&nbsp;&nbsp;&nbsp;mot de passe :
		<input  name="pass"  type="password">
		<input type="submit" value="Connexion">
	</p>
</form>

<?php
include("foot.php");
?>
