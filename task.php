<?php 
// 1- Connexion au serveur + base de donnée

$host = 'localhost';
$dbname = 'entretien';
$username = 'root';
$password = '';

// Create a PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: Could not connect. " . $e->getMessage());
}

// Fetch tasks from the database
try {
    $stmt = $pdo->query('SELECT * FROM tasks');
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: Could not fetch tasks. " . $e->getMessage());
}

// Return tasks as JSON
header('Content-Type: application/json');
echo json_encode($tasks);
?>