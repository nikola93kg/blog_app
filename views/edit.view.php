<nav class="navbar navbar-expand navbar-light bg-light">
    <a href="index.php" class="navbar-brand">Blogger</a>
    <ul class="navbar-nav ml-auto">
        <?php if (isset($_SESSION['loggedUser'])) : ?>
            <li class="nav-item">
                <a href="add_post.php" class="nav-link">Add Post</a>
            </li>
            <li class="nav-item">
                <a href="logout.php" class="nav-link">Logout</a>
            </li>
            <li class="nav-item">
                <a href="korisnik.php" class="btn btn-warning"><?= $_SESSION['loggedUser']->name; ?></a>
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
            <div class="card mb-5 bg-light">
                <form action="edit_record.php" method="post" class="">
                    <div class="card-header">
                        <input type="text" name="title" value="<?php echo $post_podaci->title; ?>">
                        <input type="hidden" name="id" value="<?php echo $post_podaci->id ?>">
                    </div>
                    <div class="card-body">
                        <textarea name="desc" class="text-center" rows="4" cols="60"><?php echo $post_podaci->description; ?></textarea>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info float-right mb-2">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>