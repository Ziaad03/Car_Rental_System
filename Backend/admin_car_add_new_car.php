<?php
include 'db.php'; // Include the database connection

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $plateID = $_POST['plate_id'];
    $officeID = $_POST['office_id'];
    $modelName = $_POST['model_name'];
    $modelYear = $_POST['model_year'];
    $rentValue = $_POST['rent_value'];
    $carStatus = $_POST['car_status'];

    // SQL to insert a new car into the database
    $sql = "INSERT INTO Cars (PlateID, OfficeID, ModelName, ModelYear, RentValue, CarStatus) 
            VALUES ('$plateID', '$officeID', '$modelName', '$modelYear', '$rentValue', '$carStatus')";

    if ($conn->query($sql) === TRUE) {
        echo "New car added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add New Car</title>
</head>
<body>
    <h2>Admin - Add New Car</h2>
    <form method="POST">
        <label>Plate ID:</label>
        <input type="text" name="plate_id" required><br><br>

        <label>Office ID:</label>
        <input type="number" name="office_id" required><br><br>

        <label>Model Name:</label>
        <input type="text" name="model_name" required><br><br>

        <label>Model Year:</label>
        <input type="number" name="model_year" required><br><br>

        <label>Rent Value:</label>
        <input type="number" step="0.01" name="rent_value" required><br><br>

        <label>Car Status:</label>
        <select name="car_status" required>
            <option value="Active">Active</option>
            <option value="Out Of Service">Out Of Service</option>
            <option value="Rented">Rented</option>
        </select><br><br>

        <button type="submit">Add Car</button>
    </form>
</body>
</html>
