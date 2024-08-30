<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Books</title>
    <link rel="stylesheet" href="styles/books.css">
</head>
<body>
<div class="books-container">
    <h1>Library Books</h1>
    <div class="search-bar">
        <input type="text" id="searchInput" placeholder="Search for books...">
    </div>
    <table id="booksTable" class="books-table">
        <thead>
        <tr>
            <th>Book Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Year</th>
            <th>Borrow</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>The Great Gatsby</td>
            <td>F. Scott Fitzgerald</td>
            <td>Fiction</td>
            <td>1925</td>
            <td><button>Borrow</button></td>
        </tr>
        <tr>
            <td>To Kill a Mockingbird</td>
            <td>Harper Lee</td>
            <td>Fiction</td>
            <td>1960</td>
            <td><button>Borrow</button></td>
        </tr>
        <tr>
            <td>1984</td>
            <td>George Orwell</td>
            <td>Dystopian</td>
            <td>1949</td>
            <td><button>Borrow</button></td>
        </tr>
        <tr>
            <td>Brave New World</td>
            <td>Aldous Huxley</td>
            <td>Dystopian</td>
            <td>1932</td>
            <td><button>Borrow</button></td>
        </tr>
        <!-- Add more books here -->
        </tbody>
    </table>
</div>
</body>
</html>


