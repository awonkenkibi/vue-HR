<?php

    //IMPORT DATABASE
    include "database.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
        $name = $_POST['name'];
        $new_salary = $_POST['salary'];

        $sql = "UPDATE employees SET salary = '$new_salary' WHERE name ='$name'";

        if ($conn->query($sql)== TRUE) {
            echo "'$name' salary has been raised to '$new_salary'";
        }
        else {
            echo "Error updating: " . $conn->error;
        }
    }
    $conn->close();
    