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
		<div align="center" class="container">
			<h1>Passwort ändern</h1>
			<form method="post">
				<div align="center">
					<div>
						Email: <input type="text" name="email" value="<?= (isset($email)) ? $email: "" ?>"><br>
					</div>
					<div>
						Neues Passwort: <input type="password" name="password"><br>
					</div>
					<input type="submit" name="edituser" id="edituser" value="Speichern">
					<input type="submit" name="showLogin" id="showLogin" value="Abbrechen">
				</div>
			</form>
		</div>
	</body>
</html>