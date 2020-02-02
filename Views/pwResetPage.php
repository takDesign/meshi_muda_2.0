    <body id="pwResetPage" class="d-flex align-items-center">
        <main class="container-fluid">
        <?php
        if (isset($_GET['linkSent=true'])) {
            echo '<p class="py-3 success text-center alert alert-success">Please check your email for a link to reset your password</p>';
        } else if (isset($_GET['linkSent=false'])) {
            echo '<p class="py-3 danger text-center alert alert-danger">Uh oh! Something went wrong!</p>';
        }
        ?>
            <section id="resetWrapper" class="mx-auto mt-5 col-md-5">
                <h1 class="h1 text-center text-uppercase">Meshi Muda</h1>
                <div class="mb-5 mx-5 underline"></div>
                <div class="col-6 my-5 text-center mx-auto">
                    <img class="w-100" src="Views/halfCircleMeshi.png" alt="Meshi Muda logo">
                </div>

                <form id="login" method="post" action="index.php?controller=outside&route=sendReset" class="form-signin px-3 py-3 needs-validation" novalidate>
                    <input type="hidden" name="controller" value="outside">
                    <input type="hidden" name="route" value="sendReset">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="email" name="email" class="form-control py-4" id="inputEmail" placeholder="Enter Email Address" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" value="Send recovery email" class="btn btn-primary-meshi-muda rounded-pill text-uppercase">Reset Password</button>
                        </div>
                    </div>
                </form>
                <p class="primary semi-bold text-center">Don't have an account? <a class="text-uppercase" role="button" href="index.php?controller=outside&route=showSignUp">Sign up</a></p>
            </section>
        </main>
        <?php include 'partials/footer.php' ?>
        <script src="Views/js/form-validation-plugin.js"></script>
    </body>