<?php
	session_start();

	$host = 'localhost';
	$user = 'USER';  // Replace with your actual database username
	$pw = '1234';    // Replace with your actual database password
	$dbName = 'users';
	$mysqli = new mysqli($host, $user, $pw, $dbName);

	$member_email = $_POST['email'];
	$member_pw_1 = $_POST['pw_1'];
	$member_name = $_POST['name'];
	$member_Phone = $_POST['Phone'];

	$sql = "INSERT INTO user_information (
			email,
			password,
			name,
			phone_number,
			id
		) VALUES (
			'$member_email',
			'$member_pw_1',
			'$member_name',
			'$member_Phone',
			'$member_email'
		)";

	if ($mysqli->query($sql)) {
		$_SESSION['email'] = $member_email; // Store the user's email in the session after successful registration
		echo '<script>alert("회원가입 성공")</script>';
	} else {
		echo '<script>alert("회원가입 실패. ' . $mysqli->error . '")</script>';
	}

	mysqli_close($mysqli);
?>
<script>
	location.href = "login.html";
</script>