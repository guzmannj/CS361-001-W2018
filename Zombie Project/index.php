<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <?php
        include('head.php');
        include('connect_sql.php');
    ?>
    <style>
        .list_golas li{
            radius: 50px;
        }
        .list_goals li:hover{
            background: #bdbfc1;
        }
        .close{
            list-style: none;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
                                echo '<li class="LI" id="' .$row["goalid"].  '">'.$row["activity"] . ' ' .$row["dist"]. '</li>';
                            }      
                        }
                        else{
                            echo "<h1>You don't have any goals to show!</h2>";
                        }   
                    ?>
                </ul>
            </div>
           <a href="goals.php"> <button type="button" class="btn btn-primary">History</button> </a>

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
        <div id="result"></div>
    </div>

    </main>
                

    <script type="text/javascript">
    $(document).ready(function () {

    var close = document.getElementsByClassName("LI");
    var i;  
    for (i = 0; i < close.length; i++) {
        close[i].onclick = function() {
        if(confirm("Are you sure you want to delete?")){
            this.style.display = "none";
            var id = this.id;
         $.ajax({
                    type: "POST",
                    url: 'delete.php',
                    data: {postid:id},cache: false,
                    success: function(data)
                    {
                        $('#result').html(data);
                    }
                });
        }//if(confirm)
        }//function
    }//for loop
    });//ready
    </script>


  </body>

</html>