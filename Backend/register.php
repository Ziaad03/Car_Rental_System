<?php
include 'db.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role = $_POST['role']; // 'admin' or 'customer'
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $phoneNumber = $_POST['phone'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encrypt password
    $sex = $_POST['sex'];
    $bdate = $_POST['bdate'];

    if ($role === 'admin') {
        $sql = "INSERT INTO Admins (FirstName, LastName, PhoneNumber, Email, UserPassword, Sex, Bdate) 
                VALUES ('$firstName', '$lastName', '$phoneNumber', '$email', '$password', '$sex', '$bdate')";
    } else {
        $sql = "INSERT INTO Customers (FirstName, LastName, PhoneNumber, Email, UserPassword, Sex, Bdate) 
                VALUES ('$firstName', '$lastName', '$phoneNumber', '$email', '$password', '$sex', '$bdate')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form method="POST">
        <label for="role">Register as:</label>
        <select name="role" required>
            <option value="customer">Customer</option>
            <option value="admin">Admin</option>
        </select><br><br>

        <label>First Name:</label>
        <input type="text" name="first_name" required><br>

        <label>Last Name:</label>
        <input type="text" name="last_name" required><br>

        <label>Phone Number:</label>
        <input type="text" name="phone"><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <label>Sex:</label>
        <select name="sex">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br>

        <label>Birth Date:</label>
        <input type="date" name="bdate"><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>
