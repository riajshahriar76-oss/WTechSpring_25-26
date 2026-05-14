<?php
include "db.php";

// Retrieve all book records
function getAllBooks($connection)
{
    $sql    = "SELECT * FROM books ORDER BY id DESC";
    $result = mysqli_query($connection, $sql);
    return $result;
}

// Insert a new book record
function insertBook($connection, $title, $author, $price, $stock)
{
    $title  = mysqli_real_escape_string($connection, $title);
    $author = mysqli_real_escape_string($connection, $author);
    $price  = mysqli_real_escape_string($connection, $price);
    $stock  = mysqli_real_escape_string($connection, $stock);

    $sql    = "INSERT INTO books (title, author, price, stock) VALUES ('$title', '$author', '$price', '$stock')";
    $result = mysqli_query($connection, $sql);
    return $result;
}

// Delete a book by ID
function deleteBook($connection, $id)
{
    $id     = mysqli_real_escape_string($connection, $id);
    $sql    = "DELETE FROM books WHERE id='$id'";
    $result = mysqli_query($connection, $sql);
    return $result;
}
?>