<!--<nav class="navbar navbar-expand-lg navbar-light bg-light">-->
<!--    <div class="container-fluid">-->
<!--        <a class="navbar-brand" href="/">Skadi</a>-->
<!--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"-->
<!--                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">-->
<!--            <span class="navbar-toggler-icon"></span>-->
<!--        </button>-->
<!--        <div class="collapse navbar-collapse" id="navbarNavDropdown">-->
<!--            -->
<!--                <ul class="navbar-nav">-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link active" aria-current="page" href="/">Home</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="/posts/user/--><? //= $_SESSION['user']['id'] ?><!--/">My posts</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="/posts/create">Create post</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item dropdown">-->
<!--                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"-->
<!--                           data-bs-toggle="dropdown" aria-expanded="false">-->
<!--                            Admin page-->
<!--                        </a>-->
<!--                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">-->
<!--                            <li><a class="dropdown-item" href="/user/admin/">Action</a></li>-->
<!--                            <li><a class="dropdown-item" href="#">Another action</a></li>-->
<!--                            <li><a class="dropdown-item" href="#">Something else here</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            --><?php //else: ?>
<!--                <ul class="navbar-nav">-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link active" aria-current="page" href="#">Home</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            --><?php //endif; ?>
<!--        </div>-->
<!--    </div>-->
<!--</nav>-->

<!--<style>-->
<!--    .search {-->
<!--        width: 300px; /* Ширина поля с кнопкой */-->
<!--        border: 1px solid #000; /* Параметры рамки */-->
<!--        min-height: 20px; /* Минимальная высота */-->
<!--    }-->
<!--    input[type="search"] {-->
<!--        border: none; /* Убираем рамку */-->
<!--        outline: none; /* Убираем свечение в Chrome и Safari */-->
<!--        -webkit-appearance: none; /* Убираем рамку в Chrome и Safari */-->
<!--        width: 274px; /* Ширина поля */-->
<!--        vertical-align: middle; /* Выравнивание по середине */-->
<!--    }-->
<!--    input[type="submit"] {-->
<!--        width: 20px; /* Ширина кнопки */-->
<!--        height: 20px; /* Высота кнопки */-->
<!--        border: none; /* Убираем рамку */-->
<!--        /*background: url(images/video.png) no-repeat 50% 50%; !* Параметры фона *!*/-->
<!--    }-->
<!--</style>-->
<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
        <span class="navbar-brand">skadi</span>
    </a>


    <!--        <li><a href="#" class="nav-link px-2 link-secondary">create post</a></li>-->

    <!--        <li><a href="#" class="nav-link px-2 link-secondary">statistic</a></li>-->

    <?php if (!isset($_SESSION['user']['id'])): ?>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/" class="nav-link px-2 link-secondary">home page</a></li>
            <li><a href="/" class="nav-link px-2 link-secondary"></a></li>
        </ul>

        <form method="get" action="/search/inPost" class="form-inline">
            <div class="form-group">
                <div class="col-auto">
                    <div class="input-group">
                        <input type="search" class="form-control search" placeholder="Search..." id="search"
                               aria-label="Search">
                        <button class="input-group-text"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </form>
        <!--        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 search">-->
        <!--            <input type="search"  class="form-control search" placeholder="Search..." id="search" aria-label="Search">-->
        <!--            <input type="submit" value="submit">-->
        <!--        </form>-->

        <div class="text-end">
            <a class="btn btn-outline-dark me-2" href="/user/login">Login</a>
            <a class="btn btn-warning" href="/user/signup">Sign-up</a>
        </div>
    <?php else: ?>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/" class="nav-link px-2 link-secondary">home page</a></li>
            <li><a href="/posts/user/<?= $_SESSION['user']['id'] ?>" class="nav-link px-2 link-secondary">my posts</a>
            </li>
        </ul>
        <form method="get" action="/search/main" class="form-inline">
            <div class="form-group">
                <div class="col-auto">
                    <div class="input-group">
                        <input type="search" class="form-control search" name="text" placeholder="Search..." id="search"
                               aria-label="Search">
                        <button class="input-group-text"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </form>


        <div class="dropdown text-end">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
               data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="/posts/create">new post...</a></li>
                <li><a class="dropdown-item" href="/user/settings">settings</a></li>
                <li><a class="dropdown-item" href="/user/profile">profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="user/logout">sign out</a></li>
            </ul>
        </div>
    <?php endif; ?>
</div>