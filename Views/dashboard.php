<body id="dashboardPage">
    <main role="main" class="container-fluid">
      <section class="row">
          <div class="col-md-8">
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
          </div>
      </section><!--  //BS row -->
    </main>
    <?php include 'partials/footer.php' ?>
</body>