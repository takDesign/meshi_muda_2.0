    <body id="setNewPwPage" class="d-flex align-items-center">
        <main class="container-fluid">
            <section id="resetWrapper" class="mx-auto mt-5 col-md-5">
                <h1 class="h1 text-center text-uppercase">Meshi Muda</h1>
                <div class="mb-5 mx-5 underline"></div>
                <div class="col-6 my-5 text-center mx-auto">
                    <img class="w-100" src="Views/halfCircleMeshi.png" alt="Meshi Muda logo">
                </div>

                <form id="login" method="post" action="index.php?controller=outside&route=processReset" class="form-signin px-3 py-3 needs-validation" novalidate>
                <!-- hidden inputs -->
                    <input type="hidden" name="controller" value="outside">
                    <input type="hidden" name="route" value="processReset">
                    <!-- <input type="hidden" name="email" value="<?php $_GET['email']?>">
                    <input type="hidden" name="token" value="<?php $_GET['token']?>"> -->

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="password" name="password" class="form-control py-4" id="inputNewPw" placeholder="Enter your new password" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" value="reset" class="btn btn-primary-meshi-muda rounded-pill text-uppercase">Reset Password</button>
                        </div>
                    </div>
                </form>
            </section>
        </main>
        <?php include 'partials/footer.php' ?>
        <script src="Views/js/form-validation-plugin.js"></script>
    </body>