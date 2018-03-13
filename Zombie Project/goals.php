<!DOCTYPE html>

<html lang="en-US">

  <head>
      <?php
        include('head.php');
      ?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>

  <body>

    <header>
    <?php
            include('navbar.php');
     ?>
    </header>
    <style>
        button{
            color: white;
            cursor: pointer;
            background: #47A24B;
            border: none;
            float: right;
            border-radius: 5px;
            height: 40px;
            font-size: 15px;
        }
    </style>
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
                            echo "<style> #delete{visibility: initial} </style>"; 
                        }
                        else{
                            echo "<style> #delete{visibility: hidden} </style> <h1>You don't have any history to show!</h2>";
                        }
                    ?>
                </ul>
                <button id="delete">Delete all history</button>
            </div>
        </div>
        
    </div>

    </main>
    <script type="text/javascript">
        document.getElementById("delete").onclick = remove;
        function remove(){
            var check = 1;
            $.ajax({
                    type: "POST",
                    url: 'delete_history.php',
                    data: {postcheck:check},cache: false,
                    success: function(data)
                    {
                        alert("Successfully delete all the history!");
                        location.reload();
                    }
                });
        }
    </script>
  </body>

</html>