<body id="postPage">
    <header class="pt-4">
        <a role="button" class="ml-4 btn btn-light text-uppercase rounded-pill semi-bold" href="index.php?controller=outside&route=showLogin">Logout</a>

        <div class=" mt-5">
            <a class="text-center" href="#">
                <h1 class="h1 text-white">Meshi Muda</h1>
            </a>
        </div>
    </header>

    <main id="postDealPage" role="main" class="container mt-3 mb-5 py-3">
        <form id="post" method="post" action="process-deal-post.php" enctype="multipart/form-data" class="form-signin px-3 py-3 needs-validation" novalidate>
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="text" name="strRestaurant" class="form-control py-4" id="inputRestaurant" placeholder="Enter restaurant" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="text" name="strLocation" class="form-control py-4" id="inputLocation" placeholder="Enter restaurant location" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="text" name="strDeal" class="form-control py-4" id="inputDeal" placeholder="Enter deal or details">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary-meshi-muda rounded-pill text-uppercase">Post Deal</button>
                </div>
            </div>
        </form>
    </main>

    <footer class="mt-4 fixed-bottom">
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