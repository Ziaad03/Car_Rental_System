<?php
header("Access-Control-Allow-Origin: http://localhost:3000"); // Allow requests from your frontend
header("Access-Control-Allow-Methods: POST, OPTIONS"); // Allow POST and preflight (OPTIONS) requests
header("Access-Control-Allow-Headers: Content-Type"); // Allow Content-Type header
header("Access-Control-Allow-Credentials: true"); // If using credentials (e.g., sessions)

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Handle preflight request
    http_response_code(204);
    exit;
}
include 'db.php'; // Include the database connection




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the input
    $role = $_POST['role']; // 'admin' or 'customer'
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the query based on the role
    if ($role === 'admin') {
        $stmt = $conn->prepare("SELECT * FROM Admins WHERE Email = ?");
    } else {
        $stmt = $conn->prepare("SELECT * FROM Customers WHERE Email = ?");
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['UserPassword'])) {
            // Successful login
            echo json_encode([
                "success" => true,
                "message" => "Login successful! Welcome, " . $user['FirstName'] . " " . $user['LastName'],
                "user" => [
                    "id" => $user['ID'],
                    "name" => $user['FirstName'] . " " . $user['LastName'],
                ],
            ]);
        } else {
            // Incorrect password
            echo json_encode(["success" => false, "message" => "Invalid password."]);
        }
    } else {
        // User not found
        echo json_encode(["success" => false, "message" => "No user found with this email."]);
    }
    $stmt->close();
}
$conn->close();
?>
