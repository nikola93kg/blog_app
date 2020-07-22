<?php require_once "partials/top.php" ?>

<nav class="navbar navbar-expand navbar-light bg-light">
	<a href="" class="navbar-brand">Blogger</a>
	<ul class="navbar-nav ml-auto">
		<li class="nav-item">
			<a href="index.php" class="nav-link">Back to Blog</a>
		</li>
	</ul>
</nav>

<div class="jumbotron text-center">
	<h4>Login/Register</h4>
</div>
<div class="container">
	<div class="row">
		<div class="col-6">
			<h4>Login</h4>
			<form action="login_register.php" method="post">
				<input type="email" name="login_email" placeholder="email" required class="form-control" autocomplete="off"><br>
				<input type="password" name="login_password" placeholder="password" class="form-control" required><br>
				<button class="form-control btn btn-primary" name="loginBtn">Login</button>
			</form>
			<?php if ($user->loggedUser) : ?>
				<div class="alert alert-success">Uspesno logovanje. <a href="index.php">Idi na blog.</a></div>
			<?php elseif (isset($_POST['loginBtn'])) : ?>
				<div class="alert alert-danger">Username ili password pogresni.</div>
			<?php endif; ?>
		</div>
		<div class="col-6">
			<h4>Register</h4>
			<form action="login_register.php" method="post">
				<input type="text" name="register_name" placeholder="name" class="form-control" autocomplete="off" required><br>
				<input type="email" name="register_email" placeholder="email" required class="form-control" autocomplete="off"><br>
				<input type="password" name="register_password" placeholder="password" class="form-control" required><br>
				<input type="password" name="register_password_repeat" placeholder="repeat password" class="form-control" required><br>
				<button class="form-control btn btn-warning" name="registerBtn">Register</button>
			</form>
			<?php if ($user->register_result) : ?>
				<div class="alert alert-success">Uspesna registracija. Ulogujte se.</div>
			<?php endif ?>
			<?php if (isset($_GET['error_pass'])): ?>
				<div class="alert alert-danger">Lozinke se ne podudaraju.</div>
			<?php endif ?>
		</div>
	</div>
</div>

<?php require_once "partials/bottom.php" ?>