<?php
// IMPORT DATABASE
include "database.php";

//$_SERVER = SERVERS | REQUEST METHOD
//employee.name | employee['name]

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
   $name = $_POST['name'];
   $position_id = $_POST['position'];
   $department_id = $_POST['department'];
   $salary = $_POST['salary'];
   $contact = $_POST['contact'];

   $sql = "INSERT INTO employees(name,position_id,department_id,salary,contact)VALUES ('$name', '$position_id', '$department_id', '$salary', '$contact')";

   if ($conn->query($sql) == TRUE) {
    echo "You have added: " ."<br>" . $name . "<br>" .$position_id. "<br>" . $department_id . "<br>" . $salary . "<br>" . $contact ;
   } else {
    echo "Error: " . $conn->error;
   }  
} else {
    echo "You are using the wrong method";
}
$conn->close();