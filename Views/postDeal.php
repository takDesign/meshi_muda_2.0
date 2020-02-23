<body id="postPage">
    <div class="mx-auto mt-md-5 col md-5">
        <header class="pt-4">
            <a role="button" class="ml-4 btn btn-light text-uppercase rounded-pill semi-bold" href="index.php?controller=outside&route=showLogin">Logout</a>

            <div class=" mt-5">
                <a class="text-center" href="#">
                    <h1 class="h1 text-white">Meshi Muda</h1>
                </a>
            </div>
        </header>

        <main id="postDealPage" role="main" class="container mt-3 mb-5 py-3">
            <form id="post" method="post" action="index.php?controller=deals&route=processDeal" enctype="multipart/form-data" class="form-signin px-3 py-3 needs-validation" novalidate>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" name="strRestaurant" class="form-control py-4" id="inputRestaurant" placeholder="Enter restaurant" autofocus required>
                        <div class="invalid-feedback">Please input the restaurant name.</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" name="strLocation" class="form-control py-4" id="inputLocation" placeholder="Enter restaurant location" required>
                        <div class="invalid-feedback">Please input the location.</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" name="strDeal" class="form-control py-4" id="inputDeal" placeholder="Enter deal or details" required>
                        <div class="invalid-feedback">Please input the deal.</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary-meshi-muda rounded-pill text-uppercase">Post Deal</button>
                    </div>
                </div>
            </form>
        </main>
    </div>
    <?php
    include 'partials/navigation.php';
    include 'partials/footer.php';
    ?>