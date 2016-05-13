<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<base href="<?php echo site_url(); ?>">
</head>
<body>
	<form action="welcome/check_login" method="post">
		<p>
			用户名：<input type="text" name="uname">
		</p>
		<p>
			密码：<input type="password" name="pwd">
		</p>
		<p>
			<input type="submit" value="登录">
		</p>
	</form>
</body>
</html>