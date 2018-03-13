
<?php

include('connect_sql.php');

	// names of variables with NAME of object
	$weigh = $_POST['weight'];
	$height =$_POST['height'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];


    //this calculates the basal amount of calories that you need using gender to store the calculated number
try{
    //function calculate() {
        switch ($gender)
        {
        case 'female':
        $calories= 655.1 + (4.35 * $weight ) + (4.7 * $height) - (4.7 * $age);
        $protein = $weigh * 0.75;
        $carbs = $calories / 9;
        $fat = $calories / 4;
        echo "<p>Your estimated daily metabolic rate is $calories </p>";
        echo "<p>This means that you need rouhgly $calories calories a day to maintain your current weight.</p>";
        echo "<p>Your required protein consumption is  $protein grams per day.</p>";
        echo "<p>Your required carbohydrate consumption is  $carbs grams per day.</p>";
        echo "<p>Your required fat consumption is  $fat grams per day.</p>";
        break;
        case 'male':
        $calories= 66 + (6.2 *$weight) + (12.7 * $height) - (6.76 * $age);
        $protein = $weigh * 0.75;
        $carbs = $calories / 9;
        $fat = $calories / 4;
        echo "<p>Your estimated daily metabolic rate is $calories </p>";
        echo "<p>This means that you need roughly $calories calories a day to maintain your current weight.</p>";
        echo "<p>Your required protein consumption is  $protein grams per day.</p>";
        echo "<p>Your required carbohydrate consumption is  $carbs grams per day.</p>";
        echo "<p>Your required fat consumption is  $fat grams per day.</p>";        }
    //}
    echo "calories $calories weight $weigh height $height age $age gender $gender";
    $sql =$conn->prepare("INSERT INTO traits (weigh, height, age, gender, calories) VALUES (:weigh, :height, :age, :gender, :calories)");
    $sql->bindParam(':weigh', $weigh);
    $sql->bindParam(':height', $height);
    $sql->bindParam(':age', $age);
    $sql->bindParam(':gender', $gender);
    $sql->bindParam(':calories', $calories);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $weigh = $_POST['weigh'];
    $height =$_POST['height'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
     
    $sql->execute();
        
    echo "New record created successfully" . ' ' . $calories;
}
catch(PDOException $e){    
echo $sql . "<br>" . $e->getMessage();
}
