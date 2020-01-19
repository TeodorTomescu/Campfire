<?php

// Initializing database
$pdo = new PDO('mysql:host=localhost;dbname=campfire','app','sG6PXfAzsYBfVXd45Cha', array(
    // Throw pdo errors
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
));

// Add user to database
function create_user($data) {
    global $pdo;
    $statement = $pdo->prepare("INSERT INTO users(first_name, last_name, email, password) VALUES(:first_name, :last_name, :email, :password)");
    // Hash and salt password 
    $data['password'] = hash_password($data['password']);
    $statement->execute($data);
}

// Find user by email addresss
function get_user($email) {
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $statement->execute(['email' => $email]);
    $row = $statement->fetch();
    return $row;
}

function create_campsite($campsite) {
    global $pdo;
    $statement = $pdo->prepare("INSERT INTO campsites(name, lat, lng, description, img) VALUES(:campsite_name, :lat, :lng, :description, :img)");
    $statement->execute($campsite);
    return $pdo->lastInsertId();
}

function get_campsite($id) {
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM campsites WHERE id = :id");
    $statement->execute(['id' => $id]);
    $row = $statement->fetch();
    return $row;
}

function find_campsites($query) {
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM campsites WHERE name LIKE :query");
    $statement->execute(['query' => "%$query%"]);
    $rows = $statement->fetchAll();
    return $rows;
}

function create_review($data) {
    global $pdo;
    $statement = $pdo->prepare("INSERT INTO reviews(rating, comment, user_email, campsite_id) VALUES(:rating, :comment, :user_email, :campsite_id)");
    $statement->execute($data);
    return $pdo->lastInsertId();
}

function get_reviews($campsite_id) {
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM reviews WHERE campsite_id = :id");
    $statement->execute(['id' => $campsite_id]);
    $rows = $statement->fetchAll();
    return $rows;
}