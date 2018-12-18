
<div class="container">
 
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
          <h1> Login to View Clients</h1>
          <?php if (!empty($_REQUEST['error'])) {
    switch ($_REQUEST['error']) {
              case 'database':
                echo 'There was a problem connecting to the database';
                break;
              case 'login_missing':
                echo 'Some of your login information was missing.';
                break;
              case 'no_account':
                echo 'Please contact an admin to create an account.';
                break;
              case 'invalid':
                echo 'The password or email entered were incorrect.';
                break;
              default:
            }
}?>
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">


                    <form class="form-horizontal" method="POST" action="/old/login.php">
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" required autofocus>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
