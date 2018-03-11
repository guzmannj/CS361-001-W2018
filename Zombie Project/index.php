<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
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
        <div class="goals col-sm-6 text-center">
            <div class="list_goals">
                <ul>
                    <?php
                        $query = "SELECT * FROM goal";
                        $data = $conn->query($query);
                        if ($data->rowCount()){
                            foreach($data as $row){
                                echo '<li> '.$row["activity"] . ' ' .$row["dist"]. '</li>';
                            }      
                        }
                        else{
                            echo "<h1>You don't have any goals to show!</h2>";
                        }   
                    ?>
                </ul>
            </div>
            <button type="button" class="btn btn-primary">History</button>

            <a href="new_goal.php"> <button type="button" class="btn btn-primary">New Goal</button> </a>
        </div>
        
        <div class="Nutrition col-sm-6 text-center">
            <div class="row">
                <?php
                    $query = "SELECT * FROM traits ORDER by traitid DESC LIMIT 1";
                    $data = $conn->query($query);
                    if ($data->rowCount()){
                        foreach($data as $row){
                            echo '<li> '.$row["calories"] . '</li>';
                        }      
                    }
                    else{
                        echo "<h1>Tables goes here!</h2>";
                    }      
                ?>
            </div>
            <a href="set_nutrition.php">
                <button type="button" class="btn btn-primary">Set Nutrition Info</button>
            </a>
        </div>
    </div>

    </main>
                

  </body>

</html>