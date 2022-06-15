<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../assets/css/styles.css" rel="stylesheet">
</head>

<?php if (session_status() !== PHP_SESSION_ACTIVE) session_start(); ?>

<body>
    <header class="header">
        <!-- Navbar-->
        <nav class="navbar navbar-expand-lg shadow navbar-light bg-white">
            <div class="container-fluid">
                <div class="d-flex align-items-center">
                    <a class="navbar-brand py-1" href="/">№5</a>
                </div>
                <!-- Navbar Collapse -->
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <form class="form-inline mt-4 mb-2 d-sm-none" action="#" id="searchcollapsed">
                        <div class="input-label-absolute input-label-absolute-left w-100">
                            <label class="label-absolute" for="searchcollapsed_search"><i class="fa fa-search"></i><span class="sr-only">What are you looking for?</span></label>
                            <input class="form-control form-control-sm border-0 shadow-0 bg-gray-200" id="searchcollapsed_search" placeholder="Search" aria-label="Search" type="search">
                        </div>
                    </form>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" id="homeDropdownMenuLink" href="index.html" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Home</a>
                            <div class="dropdown-menu" aria-labelledby="homeDropdownMenuLink">
                                <a class="dropdown-item" href="/AboutMe">About Me</a>
                                <a class="dropdown-item" href="/Gallery">Gallery</a>
                                <a class="dropdown-item" href="/Education">Education</a>
                                <a class="dropdown-item" href="/Interests">Interests</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Test</a>
                        </li>

                        <?php if (!isset($_SESSION['user'])) {
                            echo '  <li class="nav-item">';
                            echo '      <a class="nav-link" href="/Blog">Socials</a>';
                            echo '  </li>';
                            echo '<li class="nav-item"><a class="nav-link" href="/User/login">Sign in</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="/User/registration">Sign up</a></li>';
                        } else {
                            echo '  <li class="nav-item dropdown">';
                            echo '      <a class="nav-link dropdown-toggle active" id="socialDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Social</a>';
                            echo '      <div class="dropdown-menu" aria-labelledby="socialDropdownMenuLink">';
                            echo '          <a class="dropdown-item" href="/Blog">Blog</a>';
                            echo '          <a class="dropdown-item" href="/CreateBlog/createPost">Create post</a>';
                            echo '      </div>';
                            echo '  </li>';
                            echo '<li class="nav-item nav-link">Hi, ' . $_SESSION['user']['login'] . '</li>';
                            echo '<li class="nav-item"><a class="nav-link" href="/User/logout">Log out</a></li>';
                        }
                        ?>
                        <li class="nav-item mt-3 mt-lg-0 ms-lg-3 d-lg-none d-xl-inline-block"><a class="btn btn-primary" href="/CreateBlog/createPost">Write a post</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('main_content')

    <footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </footer>
</body>

</html>