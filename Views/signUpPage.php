    <body id="formPage" class="d-flex align-items-center">
        <main class="container-fluid mt-5 pt-5">
            <h1 class="h1 text-center text-uppercase">Meshi Muda</h1>
            <div class="mx-5 underline"></div>
            <div class="col-6 my-5 text-center mx-auto">
                <img class="w-100" src="Views/halfCircleMeshi.png" alt="Meshi Muda logo">
            </div>

            <form id="register" method="post" action="index.php" class="form-signin px-3 py-3 needs-validation" novalidate>
                <input type="hidden" name="controller" value="outside">
                <input type="hidden" name="route" value="processSignUp">
                <!-- selecting controller and route upon form submission -->
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="email" name="email" class="form-control py-4" id="inputEmail" placeholder="Enter Email Address" autofocus required>
                        <?php if (isset($_GET['emailError'])) {
                            echo '<div class ="invalid-feedback">Please enter a valid email</div>';
                        } ?>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="password" name="password" class="form-control py-4" id="inputPassword" placeholder="Enter Password" required>
                        <div class="mt-2 ml-2">
                            <small class="note">Password must contain at least:
                                <ul>
                                    <li>One letter</li>
                                    <li>One number</li>
                                    <li>8 characters or more</li>
                                </ul>
                            </small>
                        </div>

                        <?php if (isset($_GET['passwordError'])) {
                            echo '<div style="color: red;">Password must contain at least one letter, at least one number, and be longer than six characters.</div>';
                        } ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputCity">Security Answer:</label>
                    <a class="mb-3 px-4 py-4" role="button" data-toggle="popover" data-placement="bottom" title="Why do we need this?" data-content="So we can verify your identity during password resets">
                        <small>
                            <span class="badge badge-pill badge-dark">i</span>
                        </small>
                    </a>
                    <input type="text" name="city" class="form-control py-4" id="inputCity" placeholder="What city were you born in?" required>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary-meshi-muda rounded-pill text-uppercase">Sign up</button>
                    </div>
                </div>
            </form>
            <p class="primary semi-bold text-center">Already have an account? <a class="text-uppercase" role="button" href="index.php?controller=outside&route=showLogin">Login</a></p>
        </main>
        <?php include 'partials/footer.php' ?>
        <script src="Views/js/form-validation-plugin.js"></script>
    </body>