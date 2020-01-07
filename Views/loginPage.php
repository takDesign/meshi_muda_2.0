    <body id="formPage" class="d-flex align-items-center">
        <main class="container-fluid">
            <h1 class="text-center text-uppercase">Meshi Muda</h1>
            <div class="underline"></div>
            <form>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="email" class="form-control rounded-lg" id="inputEmail3" placeholder="Enter Email Address">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="password" class="form-control rounded-lg" id="inputPassword3" placeholder="Enter Password">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputCity">City</label>
                    <select id="inputCity" class="form-control rounded-lg">
                        <option selected>Vancouver</option>
                    </select>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary-meshi-muda rounded-pill text-uppercase">Sign up</button>
                    </div>
                </div>
            </form>
            <p class="primary semi-bold">Don't have an account? <a href="#">SIGN UP</a></p>
        </main>
        <?php include 'partials/footer.php' ?>
        <script src="Views/js/form-validation-plugin.js"></script>
    </body>