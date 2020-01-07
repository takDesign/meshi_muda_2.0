    <body id="formPage" class="d-flex align-items-center">
        <main class="container-fluid">
            <h1 class="text-center text-uppercase">Meshi Muda</h1>
            <div class="underline"></div>
            <form method="post" action="index.php" class="form-signin px-3 py-3 needs-validation" novalidate>
                <input type="hidden" name="controller" value="outside">
                <input type="hidden" name="route" value="processSignUp">
                <!-- selecting controller and route upon form submission -->
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="email" name="email" class="form-control rounded-lg" id="inputEmail" placeholder="Enter Email Address" autofocus required>
                        <?php if (isset($_GET['emailError'])) {
                            echo '<div class ="invalid-feedback">Please enter a valid email</div>';
                        } ?>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="password" name="password" class="form-control rounded-lg" id="inputPassword" placeholder="Enter Password" required>
                        <small class="note">The password must contain at least 1 Uppercase character, lowercase character, number and special charactor</small>
                        <?php if (isset($_GET['passwordError'])) {
                            echo '<div style="color: red;">The password must contain at least 1 Uppercase character, lowercase character, number and special charactor</div>';
                        } ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputCity">City</label>
                    <select name="city" id="inputCity" class="form-control rounded-lg">
                        <option value="vancouver" selected>Vancouver</option>
                    </select>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary-meshi-muda rounded-pill text-uppercase">Sign up</button>
                    </div>
                </div>
            </form>
            <p class="primary semi-bold text-center">Already have an account? <a href="index.php?controller=outside&route=showLogin">Login</a></p>
        </main>
        <?php include 'partials/footer.php' ?>
        <script src="Views/js/form-validation-plugin.js"></script>
    </body>