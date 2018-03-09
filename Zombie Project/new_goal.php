
<?php
    if (isset($_POST['submitted'])){
        include('connect_sql.php');
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
                <label> Activity: <input type="text" name="activity" /></label>
                <label> Distance or Time: <input type="text" name="time" /></label>
            </fieldset>
            <br />
            <input type="submit" value="Make a new goal"/>
        </form>

    </div>
    </main>               
  </body>
</html>