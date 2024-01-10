<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        /* Style for the login form */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 300px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
        }

        input {
            padding: 8px;
            margin-bottom: 16px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Additional styling for responsiveness */
        @media (max-width: 400px) {
            .container {
                width: 80%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="process_login.php" method="post">
            <label for="playerid">Player ID:</label>
            <input type="text" id="playerid" name="playerid" required>

            <label for="matchesplayed">Matches Played:</label>
            <input type="text" id="matchesplayed" name="matchesplayed" required>

            <label for="totalscore">Total Score:</label>
            <input type="text" id="totalscore" name="totalscore" required>

            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>
