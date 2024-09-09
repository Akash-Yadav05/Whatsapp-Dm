<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhatsApp Redirect</title>
    <link rel="icon" type="png" href="whatsapp.png">
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

        .container::before {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            border-radius: 15px;
            background: linear-gradient(45deg, #25D366, #128C7E, #25D366, #128C7E);
            background-size: 400% 400%;
            z-index: -1;
            animation: rotateBorder 10s linear infinite;
        }

        @keyframes rotateBorder {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        h1 {
            color: #128C7E;
            margin-bottom: 20px;
        }

        label {
            font-size: 1.2em;
            color: #128C7E;
        }

        input[type="text"] {
            width: 96%;
            padding: 10px;
            margin: 20px 0;
            text-align: center;
            border: 2px solid #25D366;
            border-radius: 5px;
            background-color: #f5f5f5;
            color: #333;
            font-size: 1em;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s, border-color 0.3s;
        }

        input[type="text"]:focus {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            outline: none;
            border-color: #128C7E;
        }

        button {
            background: linear-gradient(to right, #25D366, #128C7E);
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            position: relative;
            z-index: 1;
            transition: background 0.3s, transform 0.3s;
        }

        button::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #25D366, #128C7E, #25D366, #128C7E);
            background-size: 300% 300%;
            border-radius: 5px;
            z-index: -1;
            animation: rotateBorder 3s linear infinite;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .button-group a {
            background: linear-gradient(to right, #25D366, #128C7E);
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            text-decoration: none;
            position: relative;
            z-index: 1;
            transition: background 0.3s, transform 0.3s;
        }

        .button-group a::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #25D366, #128C7E, #25D366, #128C7E);
            background-size: 300% 300%;
            border-radius: 5px;
            z-index: -1;
            animation: rotateBorder 3s linear infinite;
        }

        .button-group a:hover {
            background: linear-gradient(to right, #128C7E, #25D366);
            transform: scale(1.1);
        }

        @media (max-width: 600px) {
            .container {
                padding: 45px;
                margin: 10px;
            }

            h1 {
                font-size: 1.5em;
            }

            label {
                font-size: 1em;
            }

            input[type="text"] {
                padding: 8px;
                font-size: 0.9em;
                text-align: center;
                width: 280px;
            }

            button {
                padding: 8px 15px;
                font-size: 0.9em;
            }
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9em;
            color: #ffffff;
        }

    </style>
</head>
<body>
    <div class="container">
        <img src="whatsapp.png" height="150px;" width="300px;">
        <h1>WhatsApp Redirect</h1>
        <form action="redirect.php" method="post">
            <label for="mobileNumber">Enter WhatsApp Mobile Number:</label>
            <input type="text" id="mobileNumber" name="mobileNumber" required>
            <div class="button-group">
                <button type="submit">Go to WhatsApp</button>
                <a href="chat_history.php">Chat History</a>
            </div>
        </form>
    </div>
    <div class="footer">
        &copy; 2024 Developed by Akash Yadav
    </div>
</body>
</html>
