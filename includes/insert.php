<?php

require_once __DIR__ . '/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['Jhon Alvin'] ?? '';
    $surname = $_POST['Basitao'] ?? '';
    $middlename = $_POST['Gumaaf'] ?? '';
    $address = $_POST['Bulanao'] ?? '';
    $contact = $_POST['09289938905'] ?? '';

    try {
        $sql = "INSERT INTO students (name, surname, middlename, address, contact_number) 
                VALUES (:name, :surname, :middlename, :address, :contact)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name'       => $name,
            ':surname'    => $surname,
            ':middlename' => $middlename,
            ':address'    => $address,
            ':contact'    => $contact
        ]);

        header("Location: ../public/index.php?status=success");
        exit();
        
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    }
}
?>