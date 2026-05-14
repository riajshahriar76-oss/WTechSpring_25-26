// ─── HELPERS ─────────────────────────────────────────────────────────────────

function clearErrors() {
    ["title", "author", "price", "stock"].forEach(function (field) {
        var el = document.getElementById("error-" + field);
        if (el) el.textContent = "";
    });
}

function showErrors(errors) {
    for (var field in errors) {
        var errorEl = document.getElementById("error-" + field);
        if (errorEl) {
            errorEl.textContent = errors[field];
        }
    }
}

function showNotification(message, success) {
    var notif         = document.getElementById("notification");
    notif.textContent = message;
    notif.style.color = success ? "green" : "red";
}

// ─── RENDER BOOK TABLE ───────────────────────────────────────────────────────

function renderBooks(books) {
    var tbody = document.getElementById("book-table-body");
    tbody.innerHTML = "";

    if (books.length === 0) {
        tbody.innerHTML = '<tr><td colspan="6">No books found.</td></tr>';
        return;
    }

    books.forEach(function (book) {
        var tr = document.createElement("tr");
        tr.setAttribute("data-id", book.id);
        tr.innerHTML =
            "<td>" + book.id + "</td>" +
            "<td>" + book.title + "</td>" +
            "<td>" + book.author + "</td>" +
            "<td>" + parseFloat(book.price).toFixed(2) + "</td>" +
            "<td>" + book.stock + "</td>" +
            '<td><input type="button" value="Delete" onclick="deleteBook(' + book.id + ')"/></td>';
        tbody.appendChild(tr);
    });
}

// ─── LOAD BOOKS ON PAGE READY ─────────────────────────────────────────────────

document.addEventListener("DOMContentLoaded", function () {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/bookshelf_system/Controller/bookController.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            if (data.success) {
                renderBooks(data.books);
            }
        }
    };
    xhr.send();
});

// ─── ADD BOOK ─────────────────────────────────────────────────────────────────

document.getElementById("book-form").addEventListener("submit", function (e) {
    e.preventDefault();
    clearErrors();

    var submitBtn   = document.getElementById("submit-btn");
    submitBtn.value = "Saving...";
    submitBtn.disabled = true;

    var formData = new FormData();
    formData.append("action",  "add");
    formData.append("title",   document.getElementById("title").value);
    formData.append("author",  document.getElementById("author").value);
    formData.append("price",   document.getElementById("price").value);
    formData.append("stock",   document.getElementById("stock").value);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/bookshelf_system/Controller/bookController.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            submitBtn.value    = "Add Book";
            submitBtn.disabled = false;

            var data = JSON.parse(xhr.responseText);
            if (data.success) {
                document.getElementById("book-form").reset();
                renderBooks(data.books);
                showNotification(data.message, true);
            } else {
                if (data.errors) {
                    showErrors(data.errors);
                }
                showNotification(data.message, false);
            }
        }
    };
    xhr.send(formData);
});

// ─── DELETE BOOK ─────────────────────────────────────────────────────────────

function deleteBook(id) {
    if (!confirm("Are you sure you want to delete this book?")) return;

    var formData = new FormData();
    formData.append("action", "delete");
    formData.append("id",     id);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/bookshelf_system/Controller/bookController.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            var data = JSON.parse(xhr.responseText);
            if (data.success) {
                renderBooks(data.books);
                showNotification(data.message, true);
            } else {
                showNotification(data.message, false);
            }
        }
    };
    xhr.send(formData);
}