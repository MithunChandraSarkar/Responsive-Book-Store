<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $admin_username = "admin";
    $admin_password = "123";

    if ($username === $admin_username && $password === $admin_password) {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Add Book</title>
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
                .container h1 {
                    font-size: 24px;
                    margin-bottom: 20px;
                }
                label {
                    display: block;
                    margin-bottom: 8px;
                    font-weight: bold;
                }
                input[type='text'],
                input[type='number'] {
                    width: 100%;
                    padding: 10px;
                    margin-bottom: 20px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                }
                input[type='submit'] {
                    background-color: #007bff;
                    color: #fff;
                    border: none;
                    border-radius: 4px;
                    padding: 10px 20px;
                    cursor: pointer;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h1>Add Book</h1>
                <form action='insert_book.php' method='post'>
                    <label for='name'>Book Name:</label>
                    <input type='text' name='name' required>
                    
                    <label for='author'>Author:</label>
                    <input type='text' name='author' required>
                    
                    <label for='price'>Price:</label>
                    <input type='number' name='price' required>
                    
                    <input type='submit' value='Add Book'>
                </form>
            </div>
        </body>
        </html>";
    } else {
        echo "Invalid credentials.";
    }
}
?>
