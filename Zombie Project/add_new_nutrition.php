
<?php

include('connect_sql.php');

	// names of variables with NAME of object
	$weigh = $_POST['weigh'];
	$height =$_POST['height'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];


    //this calculates the basal amount of calories that you need using gender to store the calculated number
try{
    //function calculate() {
        switch ($gender)
        {
        case 'female':
        $calories= 655.1 + (4.35 * $weigh ) + (4.7 * $height) - (4.7 * $age);
        $protein = $weigh * 0.75;
        $carbs = $calories / 9;
        $fat = $calories / 4;
        break;
        case 'male':
        $calories= 66 + (6.2 *$weigh) + (12.7 * $height) - (6.76 * $age);
        $protein = $weigh * 0.75;
        $carbs = $calories / 4;
        $fat = $calories / 9;
        }
    //}
    echo "calories $calories weight $weigh height $height age $age gender $gender";
    $sql =$conn->prepare("INSERT INTO traits (weigh, height, age, gender, calories, protein, carbs, fat) VALUES (:weigh, :height, :age, :gender, :calories, :protein, :carbs, :fat)");
    $sql->bindParam(':weigh', $weigh);
    $sql->bindParam(':height', $height);
    $sql->bindParam(':age', $age);
    $sql->bindParam(':gender', $gender);
    $sql->bindParam(':calories', $calories);
    $sql->bindParam(':protein', $protein);
    $sql->bindParam(':carbs', $carbs);
    $sql->bindParam(':fat', $fat);    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql->execute();
}
catch(PDOException $e){    
echo $sql . "<br>" . $e->getMessage();
}
