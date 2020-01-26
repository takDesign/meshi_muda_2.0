<body id="dashboardPage">
    <header>
    <?php
    if (isset($_GET['account'])) {
        echo '<p class="py-3 success text-center alert alert-success">Your account was successfully created!</p>';
    } else if (isset($_GET['login'])) {
        echo '<p class="py-3 success text-center alert alert-success">You have successfully logged in!</p>';
    }
    ?>

    <a role="button" class="ml-4 btn btn-light text-uppercase rounded-pill semi-bold" href="index.php?controller=outside&route=showLogin">Logout</a>

        <div class=" mt-5">
            <a class="text-center" href="#">
                <h1 class="h1 text-white">Meshi Muda</h1>
            </a>
        </div>
    </header>

    <main id="dashboardMain" role="main" class="container mt-3 mb-5 py-3">
    <?php include 'dealList.php' ?>
        <!-- <div class="mx-2 my-3">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-3 mx-0 my-0 px-0 py-0">
                        <img class="img-fluid imgRounded" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2Foriginals%2F2d%2F79%2F82%2F2d7982e90274f1da16b527d961532c7d.jpg&f=1&nofb=1" alt="food image">
                    </div>
                    
                    <div class="ml-2 d-flex align-self-center">
                        <div class="card-body py-0">
                            <h5 class="card-title semi-bold mb-0">Steak</h5>
                            <h5 class="card-text semi-bold mb-0">Livia</h5>
                            <p class="card-text semi-bold">2 E Commercial</p>
                        </div>
                    </div>
                    <i class="px-3 py-3 fas fa-2x fa-plus-circle"></i>
                </div>
            </div>
            <p class="card-text float-right mt-1 mr-2"><small class="text-muted">Posted 3 mins ago</small></p>
        </div> -->
    </main>

    <footer class="container mt-4 fixed-bottom">
        <ul class="nav navbar navbar-dark bgDark justify-content-between roundedTop">
            <!-- <li class="nav-item mx-2">
                <a class="nav-link active" href="#">
                    <i class="footerIcon fas fa-user-circle"></i>
                </a>
            </li> -->
            <li class="nav-item mx-2 my-2">
                <a class="nav-link" href="index.php?controller=inside&route=showDashboard&account=true">
                    <i class="footerIcon fas fa-home fa-2x"></i>
                </a>
            </li>
            <li class="nav-item mx-2 my-2">
                <a class="nav-link" href="index.php?controller=inside&route=showPostDeal">
                    <i class="footerIcon fas fa-plus-square fa-2x"></i>
                </a>
            </li>
            <!-- <li class="nav-item mx-2">
                <a class="nav-link d-flex flex-row" href="#">
                    <i class="footerIcon fas fa-list-ul"></i>
                </a>
            </li> -->
        </ul>   
    </footer>
    <?php include 'partials/footer.php' ?>