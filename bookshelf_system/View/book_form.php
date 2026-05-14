<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Bookshelf Management System</title>
</head>
<body>

    <h1>Bookshelf Management System</h1>

    <h2>Add New Book</h2>

    <form id="book-form" method="post" novalidate>
        <table>
            <tr>
                <td><label for="title">Title:</label></td>
                <td><input type="text" id="title" name="title"/></td>
                <td><span id="error-title" style="color:red;"></span></td>
            </tr>
            <tr>
                <td><label for="author">Author:</label></td>
                <td><input type="text" id="author" name="author"/></td>
                <td><span id="error-author" style="color:red;"></span></td>
            </tr>
            <tr>
                <td><label for="price">Price:</label></td>
                <td><input type="number" step="0.01" id="price" name="price"/></td>
                <td><span id="error-price" style="color:red;"></span></td>
            </tr>
            <tr>
                <td><label for="stock">Stock:</label></td>
                <td><input type="number" id="stock" name="stock"/></td>
                <td><span id="error-stock" style="color:red;"></span></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" id="submit-btn" value="Add Book"/></td>
            </tr>
        </table>
    </form>

    <p id="notification"></p>

    <h2>Book List</h2>

    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="book-table-body">
            <tr>
                <td colspan="6">Loading...</td>
            </tr>
        </tbody>
    </table>

    <script src="/bookshelf_system/Controller/JS/ajax.js"></script>

</body>
</html>