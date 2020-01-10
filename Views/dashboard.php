    <body id="dashboardPage">
        <main role="main" class="container-fluid">
            <section class="row">
                <div class="col-md-8 suggestCol removeGutter">
                    <form method="post" action="index.php?controller=suggestions&route=processDeal" class="px-4 py-4 border-bottom">
                        <div class="form-group row">
                            <div class="col-sm-12 px-5 py-3">
                                <?php
                                if (isset($_GET['account'])) {
                                    echo '<p class="mb-3 success">Your account is successfully created!</p>';
                                } else if (isset($_GET['login'])) {
                                    echo '<p class="mb-3 success">You have successfully logged in!</p>';
                                }
                                ?>
                                <?php
                                if (isset($_GET['success'])) {
                                    echo '<p class="success"}>Suggestion Posted!</p>';
                                }
                                ?>
                                <p class="h2 mb-3">Deals of the Day</p>
                                <a href="index.php?controller=outside&route=processLogout"> <i class="fas fa-sign-out-alt"></i> Logout</a>
                            </div><!-- //BS col -->
                        </div><!-- //form-group -->
                    </form>

                    <?php include("Views/dealList.php"); ?>

                </div><!--  //suggestionsCol -->
                </div><!--  //statsCol -->
            </section><!--  //BS row -->
        </main>

        <!-- JS FORM VALIDATION -->
        <script src="Views/js/form-validation-plugin.js"></script>
        <script src="Views/js/heart.js"></script>
        <script src="Views/js/statsMobile.js"></script>
        <!-- BOOTSTRAP JQUERY -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <!-- BOOTSTRAP POPPER JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <!-- BOOTSTRAP JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- JQUERY -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    </body>