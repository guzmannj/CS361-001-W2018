<!DOCTYPE html>
<html>
  <body>

    <div id = "ranking" class = "percent-count"> Zombie Chow </div>
    <div class = "xp-bar">
      <div class = "progress" id = "progress"> </div>
    </div>

    <?php
      $total = 100;
      $current = 20;
      $percent = ($current/$total) * 100;
      echo "$current is $percent% of $total."
     ?>

     <style>
      .xp-bar{
        height: 26px;
        width: 506px;
        border-radius: 13px;
        background-color: #bbb;
        margin: 50px left;
      }
      .progress{
        height: 26px;
        width: <?php echo $percent ?>%;
        border-radius: 13px;
        background-color: red;
      }
     </style>

  </body>
</html>
