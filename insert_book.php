<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $author = $_POST["author"];
    $price = $_POST["price"];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";    
    $dbname = "BookList";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into database
    $sql = "INSERT INTO book_list (name, author, price) VALUES ('$name', '$author', '$price')";
    if ($conn->query($sql) === TRUE) {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Added Book Information</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: #800000;
                }
                .container {
                    max-width: 400px;
                    margin: 50px auto;
                    padding: 20px;
                    background-color: #fff;
                    border-radius: 8px;
                    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                }
                .container h2 {
                    font-size: 24px;
                    margin-bottom: 20px;
                    color: #007bff;
                }
                .book-info {
                    border: 1px solid #ccc;
                    padding: 10px;
                    border-radius: 4px;
                    background-color: #fff;
                    margin-bottom: 20px;
                }
                .book-info p {
                    margin: 5px 0;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h2>Added Book Information</h2>
                <div class='book-info'>
                    <p><strong>Name:</strong> $name</p>
                    <p><strong>Author:</strong> $author</p>
                    <p><strong>Price:</strong> $price</p>
                </div>
            </div>
        </body>
        </html>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>
