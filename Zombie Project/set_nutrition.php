<!DOCTYPE html>

<html lang="en-US">

  <head>
    <?php
      include('head.php');
    ?>  
  </head>

  <?php
	// names of variables with NAME of object
	$weight = $_POST['weight'];
	$height =$_POST['height'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];

      //this calculates the basal amount of calories that you need using gender to store the calculated number
    function calculate() {
		switch ($gender)
			{
			case 'female':
				$gender= 655 + (9.6 * $weight ) + (1.8 * $height) - (4.7 * $age);
				echo "<p>Your estimated daily metabolic rate is $gender </p>";
				echo "<p>This means that you need rouhgly $gender calories a day to maintain your current weight.</p>";

			break;
			case 'male':
				$gender= 66 + (13.7 *$weight) + (5 * $height) - (6.8 * $age);
				echo "<p>Your estimated daily metabolic rate is $gender </p>";
				echo "<p>This means that you need roughly $gender calories a day to maintain your current weight.</p>";
		}
	}
    
  ?>

  <body>

    <header>
      <?php 
        include('navbar.php');
      ?>
        
    </header>
    <main>
      <!-- This main container-->
    <div class="container">
        <div class="goals col-sm-12 text-center">
            <div class="list_goals">
               <p> Nutrition Page</p>
            </div>
        </div>
        
    </div>

    <div class="container">
      <form method="post" action="set_nutrition.php">
        <input type="hidden" name="submitted" value=true: />
        <fieldset>
			<!-- This implements the height bar-->
			<div class="row">
			<div class="col-25">
				<label for="height">Your Height</label>
			</div>
			<div class="col-75">
				<input type="text" id="height" name="height" placeholder="Your height..">
			</div>
			</div>

			<!-- This implements the weight bar-->
			<div class="row">
			<div class="col-25">
				<label for="weight">Your Weight</label>
			</div>
			<div class="col-75">
				<input type="text" id="weight" name="weight" placeholder="Your weight..">
			</div>
			</div>

			<!-- This implements the age bar-->
			<div class="row">
			<div class="col-25">
				<label for="age">Your Age</label>
			</div>
			<div class="col-75">
				<input type="text" id="age" name="age" placeholder="Your age..">
			</div>
			</div>

			<!-- This implements the gender bar-->
			<div class="row">
			<div class="col-25">
				<label for="gender">Gender</label>
			</div>
			<div class="col-75">
				<select id="gender" name="gender">
				<option value="male">Male</option>
				<option value="female">Female</option>
				</select>
			</div>
			</div>

			<!-- This implements the activity bar
			<div class="row">
			<div class="col-25">
				<label for="activity">Your activity level</label>
			</div>
			<div class="col-75">
				<select id="activity" name="activity">
				<option value="sedentary">Sedentary</option>
				<option value="moderate">Moderate</option>
				<option value="active">Active</option>
				<option value="veryActive">Very active</option>
				</select>
			</div>
			</div> -->
			
		
		</fieldset>
		<!-- This implements the submit button calling the calculation function on click-->
		<div class="row">
		<input type="submit" value="Submit" return >
		</div>
			
      	</form>
		  <?php 
			  calculate()
		 ?>
    </div>
    

    </body>
    </html>

    </main>
                

  </body>

</html>