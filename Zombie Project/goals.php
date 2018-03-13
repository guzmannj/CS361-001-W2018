<!DOCTYPE html>

<html lang="en-US">

  <head>
      <?php
        include('head.php');
        include('connect_sql.php');
      ?>
  </head>

  <body>

    <header>
    <?php
            include('navbar.php');
     ?>
    </header>
    <main>
    <div class="container">
        <div class="goals col-sm-12 text-center">
            <div class="list_goals">
                <ul>
                    <?php
                        $query = "SELECT * FROM history";
                        $data = $conn->query($query);
                        if ($data->rowCount()){
                            foreach($data as $row){
                                echo '<li class="LI" id="' .$row["goalid"].  '">'.$row["activity"] . ' ' .$row["dist"]. '</li>';
                            }      
                        }
                        else{
                            echo "<h1>You don't have any history to show!</h2>";
                        }
                    ?>
                </ul>
            </div>
        </div>
        
    </div>

    </main>
                

  </body>

</html>