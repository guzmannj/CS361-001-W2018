
<?php
    if (isset($_POST['submitted'])){
        include('add_new_goals.php');
    }
?>
<!DOCTYPE html>

<html lang="en-US">
  <head>
      <?php
        include('head.php');
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

        <h1> Make a new goal! </h1>
        <form method="post" action="new_goal.php">
            <input type="hidden" name="submitted" value="true"/>
            <fieldset>
                <label> Activity: <input type="text" name="activity" id="activity" required/></label>
                <label> Time (hours): <input type="number" name="time" id="time" required/></label>
            </fieldset>
            <br/>
            <input type="submit" value="Make a new goal"/>
        </form>

    </div>
    </main>   

  </body>
</html>