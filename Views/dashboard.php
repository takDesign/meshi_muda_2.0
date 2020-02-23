<body id="dashboardPage">
    <?php
    if (isset($_GET['account'])) {
        echo '<p class="py-3 success text-center alert alert-success">Your account was successfully created!</p>';
    } else if (isset($_GET['login'])) {
        echo '<p class="py-3 success text-center alert alert-success">You have successfully logged in!</p>';
    }
    ?>
    <header class="pt-4">
        <a role="button" class="ml-4 btn btn-light text-uppercase rounded-pill semi-bold" href="index.php?controller=outside&route=showLogin">Logout</a>

        <div class=" mt-5">
            <a class="text-center" href="#">
                <h1 class="h1 text-white">Meshi Muda</h1>
            </a>
        </div>
    </header>

    <main id="dashboardMain" role="main" class="container mt-3 mb-5 py-3">
        <div class="mx-auto mt-5 col-md-5">
            <?php include 'dealList.php' ?>
        </div>
    </main>
    <?php
    include 'partials/navigation.php';
    include 'partials/footer.php';
    ?>