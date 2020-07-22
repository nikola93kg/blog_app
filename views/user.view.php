<?php require_once "partials/top.php" ?>
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
                <a href="user.php" class="btn btn-warning"><?= $_SESSION['loggedUser']->name; ?></a>
            </li>
        <?php else : ?>
            <li class="nav-item">
                <a href="login_register.php" class="nav-link">Login/Register</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
<div class="jumbotron">
    <h3 class="text-center"><?= $korisnik->name ?></h3>
</div>
<div class="row text-center">
    <div class="col-4 offset-4 mb-2">
        <div class="card">
            <div class="card-header">
                <?= $postovi_korisnika->title; ?>
            </div>
            <div class="card-body">
                    <?= $postovi_korisnika->description; ?>
            </div>
            <div class="card-footer">
                    <?php $date = date_create($postovi_korisnika->created_at);
                                  echo date_format($date, "d M Y. H:i"); 
                    ?>
            </div>
        </div>
    </div>
</div>

<div id="carouselExampleIndicators" class="carousel slide m-auto" data-ride="carousel" style="width: 400px;">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://images.pexels.com/photos/3014011/pexels-photo-3014011.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://images.pexels.com/photos/3608533/pexels-photo-3608533.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://images.pexels.com/photos/4350202/pexels-photo-4350202.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="d-block w-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<?php require_once "partials/bottom.php" ?>