<?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Presentation";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makeup By Pawandeep</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        nav {
            background-color: #555;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }
        section {
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        .articles, .tutorials {
            background-color: #fff;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }
        .articles h3, .tutorials h3 {
            color: #555;
        }
        .articles p, .tutorials p {
            color: #777;
        }
        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Makeup By Pawandeep</h1>
        <p>Student ID: 202105634</p>
    </header>
    <nav>
        <a href="#articles">Articles</a>
        <a href="#tutorials">Tutorials</a>
    </nav>
    <section id="articles" class="articles">
        <h2>Articles</h2>
        <?php
            // Query articles from database
            $sql = "SELECT title, content, author, publish_date FROM articles";
            $result = $conn->query($sql);

            // Display articles
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<article>";
                    echo "<h3>" . $row["title"] . "</h3>";
                    echo "<p>" . $row["content"] . "</p>";
                    echo "<p>Author: " . $row["author"] . " | Publish Date: " . $row["publish_date"] . "</p>";
                    echo "</article>";
                }
            } else {
                echo "No articles found.";
            }
        ?>
    </section>
    <section id="tutorials" class="tutorials">
        <h2>Tutorials</h2>
        <?php
            // Query tutorials from database
            $sql = "SELECT title, description, video_url, author, publish_date FROM tutorials";
            $result = $conn->query($sql);

            // Display tutorials
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<article>";
                    echo "<h3>" . $row["title"] . "</h3>";
                    echo "<p>" . $row["description"] . "</p>";
                    echo "<p>Author: " . $row["author"] . " | Publish Date: " . $row["publish_date"] . "</p>";
                    if ($row["video_url"]) {
                        echo "<p>Video URL: <a href='" . $row["video_url"] . "'>" . $row["video_url"] . "</a></p>";
                    }
                    echo "</article>";
                }
            } else {
                echo "No tutorials found.";
            }
        ?>
    </section>
    <footer>
        <p>&copy; 2024 Makeup By Pawandeep. All rights reserved.</p>
    </footer>
    <?php
        // Close connection
        $conn->close();
    ?>
</body>
</html>
