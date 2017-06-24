<!DOCTYPE html>
<html>
	<head>
	    <meta charset="UTF-8">
	    <title>Stundenplan</title>
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
	                    <?php
	                    	if ($rolleid[0] == 2)
	                    	{
                    		?>
	                    		<li><a href="editplan">Plan editieren</a></li>
	                        	<li><a href="edituser">Benutzer editieren</a></li>
                    		<?php 	                    		
	                    	}
	                    ?>
	                    
	                        <li><a href="login">Abmelden</a></li>
	                    </ul>
	                </div>
	                Email:<?PHP if(isset($_SESSION['email'])){echo $_SESSION['email'];}?>
	            </div>
	        </div>
	
	        <h3>Stundenplan</h3>
	        <div class="table-responsive">
	            <table class="table table-striped">
	                <thead>
	                    <tr>
	                        <th class="text-center">Montag</th>
	                        <th class="text-center">Dienstag</th>
	                        <th class="text-center">Mittwoch</th>
	                        <th class="text-center">Donnerstag</th>
	                        <th class="text-center">Freitag</th>
	                    </tr>
	                </thead>
	                <tbody>
	                <?php 
	                echo "Momentane Fächer: </br>";
	                foreach ($faecher as $fach)
	                {
	                	?>
	                	<tr>
	              		<?php
	                	echo "{$fach->getId()} - {$fach->getBezeichnung()} - {$fach->getKuerzel()} </br>" ;
	                	?>
	                	</tr>
	                	<?php 
	                }
	                ?>
	                <tr>
	                	<?php 
	                		$lektionsTag = 1;
	                    	foreach ($lektionen as $lektion) {
	                    		if ($lektion->getLektionsTag() == $lektionsTag)
	                    		{
	                    			?>
	                    			<tr>
	                    			<?php 
	                    		}
	                    		else
	                    		{
	                    			$lektionsTag = $lektion->getLektionsTag();
	                    			?>
	                    			<td>
	                    			<?php 
	                    		}
	                    		
	                    		echo "Lektionstag: {$lektion->getLektionsTag()}Fach: {$lektion->GetFach()}, {$lektion->getLetkionsBeginn()} - {$lektion->getLetkionsEnde()}";
	                    		 
	                    	}
                        ?>
                        </tr>
	                </tbody>
	            </table>
	        </div>
	    </div>
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>