<?php require_once "partials/top.php" ?>

<nav class="navbar navbar-expand navbar-light bg-light">
	<a href="" class="navbar-brand">Blogger</a>
	<ul class="navbar-nav ml-auto">
		<?php if (isset($_SESSION['loggedUser'])) : ?>
			<li class="nav-item">
				<a href="add_post.php" class="nav-link">Add Post</a>
			</li>
			<li class="nav-item">
				<a href="logout.php" class="nav-link">Logout</a>
			</li>
			<li class="nav-item">
				<a href="user.php" class="btn btn-warning"><?= $_SESSION['loggedUser']->name; ?></a>
			</li>
		<?php else : ?>
			<li class="nav-item">
				<a href="login_register.php" class="nav-link">Login/Register</a>
			</li>
		<?php endif; ?>
	</ul>
</nav>
<div class="jumbotron text-center">
	<h4 class="mb-4">Blogger Posts</h4>
	<img src="img/blogger.svg" alt="" style="height: 200px;">
</div>
<div class="container">
	<div class="row">
		<div class="col-8 offset-2">
			<?php foreach ($posts as $post) : ?>
				<div class="card m-2 bg-light">
					<div class="card-header">
						<h3><?= $post->title; ?>
							<small class="float-right">
								<?php if (
									isset($_SESSION['loggedUser']) &&
									$post->user_id == $_SESSION['loggedUser']->id
								) : ?>
									<a href="index.php?post_id=<?= $post->id ?>" class="btn btn-sm btn-danger">Remove</a>
								<?php endif ?>
							</small>
						</h3>
					</div>
					<div class="card-body">
						<p><?= $post->description; ?></p>
					</div>
					<div class="card-footer">
						<button class="btn btn-info btn-sm float-right">
							<?= $post->created_at ?>
						</button>
						<button class="btn btn-warning btn-sm float-left">
							<?= $user->getUserWithId($post->user_id)->name; ?>
						</button>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>

<?php require_once "partials/bottom.php" ?>