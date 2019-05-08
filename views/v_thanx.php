<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

error_reporting(E_ERROR | E_WARNING );

include("header.php");  

?>

<div class="container-fluid">
	<div class="row event_info">
		<div class="col-sm-4">
		</div>
		<div class="col-sm-4">
			Thanx 
			<?php 
				$i = 0;
				
				echo "<table>";
				
				echo $_SESSION['person'][2];
				
				foreach( $_SESSION['person'] as $key => $value)
				{
					echo "<tr><td>";
					echo $key;
					echo "</td><td>";
					echo $value;	
					echo "</td></tr>";
					
					next($_SESSION['person']);						
					$i++;
				}
				
				echo "</table>";
			?>
		</div>
		<div class="col-sm-4">
		</div>
	</div>
	<div class="row event_info">
		<div class="col-sm-4">
		</div>
		<div class="col-sm-4">
			Bacon ipsum dolor amet jerky frankfurter chicken, pork loin meatloaf kevin salami meatball. Ribeye kielbasa ham hock, shoulder ham sirloin cupim. Tail picanha tongue, sausage biltong cupim turkey tenderloin ground round ham hock pork chop andouille beef corned beef. Ground round meatloaf hamburger ribeye jerky sausage beef ribs shoulder ham swine porchetta beef shank sirloin kevin. Ribeye alcatra ground round bacon. Capicola ham hock turducken jowl doner leberkas, turkey kevin bresaola short loin. Beef porchetta spare ribs tail pastrami, sirloin swine ham meatball drumstick ham hock pork belly cupim bresaola.
		</div>
		<div class="col-sm-4">
		</div>
	</div>
	<div class="row event_info">
		<div class="col-sm-4">
		</div>
		<div class="col-sm-4">
Pig beef rump pork belly filet mignon chuck. Leberkas short ribs swine boudin shankle ball tip sausage pork salami pork loin. Shankle corned beef turducken tongue. Porchetta biltong ribeye alcatra spare ribs fatback.
		</div>
		<div class="col-sm-4">
		</div>
	</div>

</div>

<?php include("footer.php"); ?>