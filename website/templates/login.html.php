<html>
	<body>
		<h1>Login</h1>
		<form method="post">
			Email: <input type="text" name="email" value="<?= (isset($email)) ? $email: "" ?>"><br>
			Passwort: <input type="password" name="password"><br>
			<input type="submit" value="Enter">
		</form>
	</body>
</html>