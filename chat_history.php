<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #25D366, #128C7E);
            background-size: cover;
        }

        .container {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        h1 {
            color: #128C7E;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 10px 0;
            background: #f5f5f5;
            padding: 10px;
            border: 2px solid darkseagreen;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        button, a.button {
            background: linear-gradient(to right, #25D366, #128C7E);
            color: #fff;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            font-size: 0.9em;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.3s, transform 0.3s;
        }

        button:hover, a.button:hover {
            background: linear-gradient(to right, #128C7E, #25D366);
            transform: scale(1.1);
        }

        .button-group {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
    <img src="whatsapp.png" height="150px;" width="300px;">
        <h1>Chat History</h1>
        <?php
        if (isset($_SESSION['chat_history']) && !empty($_SESSION['chat_history'])) {
            echo "<ul>";
            foreach ($_SESSION['chat_history'] as $index => $number) {
                echo "<li>$number
                        <div>
                            <button type='button' onclick='copyToClipboard(\"$number\")'>Copy</button>
                            <form action='redirect.php' method='post' style='display:inline;'>
                                <input type='hidden' name='remove_index' value='$index'>
                                <button type='submit'>Remove</button>
                            </form>
                        </div>
                      </li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No chat history found.</p>";
        }
        ?>
        <div class="button-group">
            <a href="index.php" class="button">Back to Home</a>
        </div>
    </div>
    <script>
        function copyToClipboard(number) {
            const el = document.createElement('textarea');
            el.value = number;
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
            alert("Copied to clipboard: " + number);
        }
    </script>
</body>
</html>
