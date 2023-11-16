<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["search"])) {
    $search_term = $_GET["search"];

    $servername = "localhost";
    $username = "root";
    $password = "";     
    $dbname = "BookList"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform search based on name or author
    $search_query = "SELECT * FROM book_list WHERE name LIKE '%$search_term%' OR author LIKE '%$search_term%'";
    $result = $conn->query($search_query);

    echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Search Results</title>
            <style>
                body {
                    
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: #800000;
                }
                .container {
                    max-width: 800px;
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
                .book {
                    border: 1px solid #ccc;
                    padding: 10px;
                    border-radius: 4px;
                    background-color: #fff;
                    margin-bottom: 20px;
                }
                .book p {
                    margin: 5px 0;
                }
                .book hr {
                    border: none;
                    border-top: 1px solid #ccc;
                    margin: 10px 0;
                }
                .purchase-btn {
                    background-color: #007bff;
                    color: #fff;
                    border: none;
                    border-radius: 4px;
                    padding: 5px 10px;
                    cursor: pointer;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h2>Search Results:</h2>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='book'>
                    <p><strong>Name:</strong> " . $row["name"] . "</p>
                    <p><strong>Author:</strong> " . $row["author"] . "</p>
                    <p><strong>Price:</strong> " . $row["price"] . "</p>
                    <button class='purchase-btn'>Purchase</button>
                    <hr>
                  </div>";
        }
    } else {
        echo "<p>No results found.</p>";
    }

    echo "</div>
        </body>
        </html>";

    $conn->close();
}
?>
