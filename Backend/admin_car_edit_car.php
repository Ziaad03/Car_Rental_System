<?php
include 'db.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $carID = $_POST['car_id'];
    $plateID = $_POST['plate_id'] ?? null;
    $officeID = $_POST['office_id'] ?? null;
    $modelName = $_POST['model_name'] ?? null;
    $modelYear = $_POST['model_year'] ?? null;
    $rentValue = $_POST['rent_value'] ?? null;
    $carStatus = $_POST['car_status'] ?? null;

    // Fetch existing car data
    $sql = "SELECT * FROM Cars WHERE CarID = '$carID'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Retain old values if the input field is empty
        $plateID = $plateID ?: $row['PlateID'];
        $officeID = $officeID ?: $row['OfficeID'];
        $modelName = $modelName ?: $row['ModelName'];
        $modelYear = $modelYear ?: $row['ModelYear'];
        $rentValue = $rentValue ?: $row['RentValue'];
        $carStatus = $carStatus ?: $row['CarStatus'];

        // Update query with all fields
        $updateSql = "UPDATE Cars 
                      SET PlateID = '$plateID', 
                          OfficeID = '$officeID', 
                          ModelName = '$modelName', 
                          ModelYear = '$modelYear', 
                          RentValue = '$rentValue', 
                          CarStatus = '$carStatus' 
                      WHERE CarID = '$carID'";

        if ($conn->query($updateSql) === TRUE) {
            echo "Car updated successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Car not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Car</title>
</head>
<body>
    <h2>Admin - Edit Car</h2>
    <form method="POST">
        <label>Car ID:</label>
        <input type="number" name="car_id" required><br><br>

        <label>Plate ID:</label>
        <input type="text" name="plate_id" placeholder="Leave empty to keep current value"><br><br>

        <label>Office ID:</label>
        <input type="number" name="office_id" placeholder="Leave empty to keep current value"><br><br>

        <label>Model Name:</label>
        <input type="text" name="model_name" placeholder="Leave empty to keep current value"><br><br>

        <label>Model Year:</label>
        <input type="number" name="model_year" placeholder="Leave empty to keep current value"><br><br>

        <label>Rent Value:</label>
        <input type="number" step="0.01" name="rent_value" placeholder="Leave empty to keep current value"><br><br>

        <label>Car Status:</label>
        <select name="car_status">
            <option value="">Keep current value</option>
            <option value="Active">Active</option>
            <option value="Out Of Service">Out Of Service</option>
            <option value="Rented">Rented</option>
        </select><br><br>

        <button type="submit">Update Car</button>
    </form>
</body>
</html>
