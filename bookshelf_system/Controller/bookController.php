<?php
include "../Model/bookModel.php";
session_start();

header("Content-Type: application/json");

$response = array("success" => false, "message" => "", "errors" => array(), "books" => array());

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $action = $_POST["action"] ?? "";

    // ─── ADD BOOK ────────────────────────────────────────────────────────────
    if ($action == "add") {

        $title  = trim($_POST["title"]  ?? "");
        $author = trim($_POST["author"] ?? "");
        $price  = trim($_POST["price"]  ?? "");
        $stock  = trim($_POST["stock"]  ?? "");

        $errors = array();

        // Title validation: not empty, only letters / spaces / hyphens
        if (empty($title)) {
            $errors["title"] = "Title is required.";
        } elseif (!preg_match('/^[a-zA-Z\s\-]+$/', $title)) {
            $errors["title"] = "Title may only contain letters, spaces, and hyphens.";
        }

        // Author validation: not empty, at least 3 characters
        if (empty($author)) {
            $errors["author"] = "Author is required.";
        } elseif (strlen($author) < 3) {
            $errors["author"] = "Author must be at least 3 characters.";
        }

        // Price validation: numeric and greater than zero
        if (!is_numeric($price) || $price <= 0) {
            $errors["price"] = "Price must be a number greater than zero.";
        }

        // Stock validation: integer and >= 1
        if (!filter_var($stock, FILTER_VALIDATE_INT) || (int)$stock < 1) {
            $errors["stock"] = "Stock must be a whole number of at least 1.";
        }

        if (!empty($errors)) {
            $response["errors"]  = $errors;
            $response["message"] = "Validation failed. Please fix the errors.";
        } else {
            $result = insertBook($connection, $title, $author, $price, $stock);
            if ($result) {
                $response["success"] = true;
                $response["message"] = "Book added successfully!";
                // Return fresh book list
                $allBooks = getAllBooks($connection);
                $books    = array();
                while ($row = mysqli_fetch_assoc($allBooks)) {
                    $books[] = $row;
                }
                $response["books"] = $books;
            } else {
                $response["message"] = "Failed to add book. Database error.";
            }
        }

    // ─── DELETE BOOK ─────────────────────────────────────────────────────────
    } elseif ($action == "delete") {

        $id = trim($_POST["id"] ?? "");

        if (empty($id) || !filter_var($id, FILTER_VALIDATE_INT)) {
            $response["message"] = "Invalid book ID.";
        } else {
            $result = deleteBook($connection, $id);
            if ($result) {
                $response["success"] = true;
                $response["message"] = "Book deleted successfully!";
                // Return fresh book list
                $allBooks = getAllBooks($connection);
                $books    = array();
                while ($row = mysqli_fetch_assoc($allBooks)) {
                    $books[] = $row;
                }
                $response["books"] = $books;
            } else {
                $response["message"] = "Failed to delete book.";
            }
        }

    } else {
        $response["message"] = "Unknown action.";
    }

// ─── INITIAL LOAD (GET) ───────────────────────────────────────────────────────
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    $allBooks = getAllBooks($connection);
    $books    = array();
    while ($row = mysqli_fetch_assoc($allBooks)) {
        $books[] = $row;
    }
    $response["success"] = true;
    $response["books"]   = $books;
}

echo json_encode($response);
?>