<?php
// Import Database
include "database.php";

$sql = "SELECT * FROM employees"; // View all employees
$result = $conn->query($sql); // Run this query

if ($result->num_rows > 0) {  // If num_rows is more than 0, display
    echo "<table border='1'>";
    echo "<tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Position ID</th>
                <th>Department ID</th>
                <th>Salary</th>
                <th>Contact</th>
        </tr>";

    // Echo results
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                    <td>".$row['employee_id']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['position_id']."</td>
                    <td>".$row['department_id']."</td>
                    <td>".$row['salary']."</td>
                    <td>".$row['contact']."</td>
                  </tr>";
    }

    echo "</table>";
} else {
    echo "No employees found";
}

// Close the connection
$conn->close();
?>
