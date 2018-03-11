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
            $calories= 655 + (9.6 * $weigh ) + (1.8 * $height) - (4.7 * $age);
            //echo "<p>Your estimated daily metabolic rate is $gender </p>";
            //echo "<p>This means that you need rouhgly $gender calories a day to maintain your current weight.</p>";

        break;
        case 'male':
            $calories= 66 + (13.7 *$weigh) + (5 * $height) - (6.8 * $age);
            //echo "<p>Your estimated daily metabolic rate is $gender </p>";
            //echo "<p>This means that you need roughly $gender calories a day to maintain your current weight.</p>";
        }
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
