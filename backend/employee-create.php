<!-- create form to add a new employee -->
<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Employee</title>
 </head>
 <body>
    <form action="create.php" method="post">
        <label >Employee Name :</label>
        <input type="text" name= "name">
        <br>

        <label>Position ID :</label>
        <input type="text" name="position">
        <br>

        <label>Department ID :</label>
        <input type="text" name="department">
        <br>

        <label>Salary :</label>
        <input type="text" name="salary">
        <br>

        <label>Contact :</label>
        <input type="text" name="contact">
        <br>

        <button type="submit">Add Employee</button>

    </form>
 </body>
 </html>