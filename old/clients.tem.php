<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="">
                <h2>View Clients</h2> <a style="inline-block; float: right;" href="http://april-lin.com/old/logout.php">Logout</a>

                      <table  class="table">
                        <?php

                          foreach ($clients as $client) {
                              echo "<tr><td>";
                              echo $client['id'];
                              echo "</td><td>";
                              echo $client['name'];
                              echo "</td></tr>";
                          }
                         ?>
                      </table>

            </div>
          </div>
        </div>
      </div>
