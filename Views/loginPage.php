    <body id="formPage" class="d-flex align-items-center">
        <main class="container-fluid">
            <h1 class="text-center text-uppercase">Meshi Muda</h1>
            <div class="mb-5 underline"></div>
            <!-- <div class="my-5 text-center logo-login">logo</div> -->

            <form id="login" method="post" action="index.php" class="form-signin px-3 py-3 needs-validation" novalidate>
                <input type="hidden" name="controller" value="outside">
                <input type="hidden" name="route" value="processLogin">
                <!-- selecting controller and route upon form submission -->
                <?php
                if (isset($_GET['error'])) {
                    echo '<p class="error">Incorrect Email or Password.</p>';
                }
                ?>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="email" name="email" class="form-control py-4" id="inputEmail" placeholder="Enter Email Address" autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="password" name="password" class="form-control py-4" id="inputPassword" placeholder="Enter Password">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary-meshi-muda rounded-pill text-uppercase">Login</button>
                    </div>
                </div>
            </form>
            <p class="primary semi-bold text-center">Don't have an account? <a class="text-uppercase" role="button" href="index.php?controller=outside&route=showSignUp">Sign up</a></p>
        </main>
        <?php include 'partials/footer.php' ?>
        <script src="Views/js/form-validation-plugin.js"></script>
    </body>