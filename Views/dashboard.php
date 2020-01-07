    <body id="dashboardPage">
        <main role="main" class="container-fluid">
            <section class="row">
                <div class="col-md-3 shadow fixed-top accountCol pl-md-5 pt-5">
                    <!-- <svg class="avatar shadow-sm bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140">
                        <title>User Avatar</title>
                        <rect width="100%" height="100%" fill="#777"/>
                        <text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                    </svg> -->

                    <div class="statMenuMobile">
                        <a href="#">View Stats <i class="fas fa-ellipsis-v"></i></a>
                    </div>

                    <img src="Views/imgs/bubbles.png" class="fluid offset-md-9 dashBubbles" alt="image of bubbles" />
                    <p class="mt-4 h2">Hey <?= $_SESSION["username"] ?>!</p>
                    <p class="h3">This is your dashboard</p>

                    <ul>
                        <!-- <li><a href="">Account Details</a></li>
                        <li><a href="">Suggestions</a></li>
                        <li><a href="">Contact Us</a></li> -->
                        <li><a href="index.php?controller=outside&route=processLogout"> <i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>



                </div><!--  //accountsCol -->

                <div class="col-md-8 suggestCol removeGutter">
                    <form method="post" action="index.php?controller=suggestions&route=processSuggestion" class="px-4 py-4 border-bottom">
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
                                <p class="h2 mb-3">Have an idea?</p>
                                <input name="strContent" class="form-control form-control-lg" id="colFormLabelLg" placeholder="Enter your suggestion here" required>
                                <div class="fieldset float-right mt-4">
                                    <button class="btn btn-primary btn-lg" type="submit">Suggest it</button>
                                </div><!-- //fieldset -->
                            </div><!-- //BS col -->
                        </div><!-- //form-group -->
                    </form>

                    <!-- <div class="col-md-10 mx-auto mt-5 listHeader">
                        <p class="h3 float-left">The top five</p>
                        <a href="#" class="h3 float-right">View all</a>
                    </div> -->

                    <?php include("Views/suggestionList.php"); ?>

                </div><!--  //suggestionsCol -->

                <div class="col-md-1 shadow statsCol fixed-top">
                    <div class="logoSm d-flex justify-content-center">
                        <img src="Views/imgs/logo.png" alt="seal logo" class="fluid mt-4 logoSm">
                    </div>

                    <!-- STATS - HARD CODED 
                        <ul>
                            <li><h1>8</h1> Votes Left</li>
                            <li><h1>8</h1> Votes Used</li>
                            <li><h1>8</h1> Suggests Made</li>
                            <li><h1>8</h1> Suggests Approved</li>
                        </ul> -->

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