<!DOCTYPE html>
<html>
	<head>
	    <meta charset="UTF-8">
	    <title>Plan editieren</title>
	    <meta name="MakiJagodic">
	    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/paper/bootstrap.min.css">
	    <style>
	        body {padding-top: 20px; padding-bottom: 20px; }
	        .navbar {margin-bottom: 20px; }
	    </style>
	</head>
	<body>
	    <div class="container">
	        <!-- Static navbar -->
	        <div class="navbar navbar-default navbar-inverse" role="navigation">
	            <div class="container-fluid">
	                <div class="navbar-header">
	                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
	                        <span class="sr-only">Toggle navigation</span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                    </button>
	                    <a class="navbar-brand" href="#">INFA2A - Stundenplan</a>
	                </div>
	                
	                <div class="navbar-collapse collapse">
	                    <ul class="nav navbar-nav navbar-right">
	                    	<li><a href="index">Stundenplan</a></li>
	                    	<li><a href="edituser">Benutzer editieren</a></li>
	                        <li><a href="login">Abmelden</a></li>
	                    </ul>
	                </div>
	                Email:<?PHP if(isset($_SESSION['email'])){echo $_SESSION['email'];}?>
	            </div>
	        </div>
			
	        <h3>Edit Plan</h3>
	        	<?php 
                echo "Momentane Fächer: </br>";
                foreach ($faecher as $fach)
                {
                	?>
              		<?php
                	echo "{$fach->getId()} - {$fach->getBezeichnung()} - {$fach->getKuerzel()} </br>" ;
                	?>
                	<?php 
                }
                ?>
                <div>
                	<h3>Info:</h3>
                	<p>Der Lektions Tag hat die Nummer des Wochentages, an welchem die Lektion stattfindet.</p>
                </div>
	        <form method="post">
		        <table>
		        <?php 
		        	foreach ($lektionen as $lektion)
		        	{
		        		?>
		        		<tr> 
		                <td><h4>Fach (In Legende abgleichen)</h4></td>
		                <td><input type="hidden" name="id" value="<?php echo $lektion->getId(); ?>"></td>
		                <td><input type="text" name="fach" value="<?php echo $lektion->getFach(); ?>"></td>
			            </tr>
			            <tr> 
			                <td>LektionsTag</td>
			                <td></td>
			                <td><input type="text" name="lektionsTag" value="<?php echo $lektion->getLektionsTag(); ?>"></td>
			            </tr>
			            <tr> 
			                <td>Lektions Beginn</td>
			                <td></td>
			                <td><input type="text" name="lektionsBeginn" value="<?php echo $lektion->getLetkionsBeginn(); ?>"></td>
			            </tr>
			            <tr> 
			                <td>Lektions Ende</td>
			                <td></td>
			                <td><input type="text" name="lektionsEnde" value="<?php echo $lektion->getLetkionsEnde(); ?>"></td>
			            </tr>
			            
			            
		        		<?php
		        	}
		        ?>
		        <tr>
					<td><input type="submit" name="update" value="Speichern"></td>
					<td><input type="submit" name="cancle" value="Abbrechen"></td>
		       	</tr>
		        </table>
		    </form>
	    </div>
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>