<?php
session_start(); // Start the session

// Check if the form is submitted
if (isset($_POST['upload'])) {
    // Get user input
    $password = $_POST["password"];

    // You should replace these with your actual user credentials validation logic
    $validPassword = "2023";

    // Check if the provided password is valid
    if ($password === $validPassword) {
        // Store the password in a session variable
        $_SESSION['user_password'] = $password;

        // Successful login, redirect to a protected page
        header("Location: index.php");
        exit;
    } else {
        // Invalid login, display an error message
        $errorMessage = "Invalid password. Please try again.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tennis Tournament Admin</title>
    <style>
    .body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f4f4f4;
    }

    .login-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px; /* Set a fixed width if desired */
        text-align: center; /* Center text content */
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    h2 {
        text-align: center;
        color: #333;
    }

    label {
        margin-bottom: 8px;
        color: #555;
    }

    input {
        padding: 10px;
        margin-bottom: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: 100%;
        box-sizing: border-box;
    }

    button {
        padding: 12px;
        background-color: #3498db;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        box-sizing: border-box;
    }

    button:hover {
        background-color: #2980b9;
    }
    .login-container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px; /* Set a fixed width if desired */
        text-align: center; /* Center text content */
    }
</style>

</head>

<body>
    

        <div class="login-container">
            <h2>Admin Login</h2>
            <form action="" method="post">
                <!-- You can display an error message here if set -->
                <?php if (isset($errorMessage)) { ?>
                    <p style="color: red;"><?php echo $errorMessage; ?></p>
                <?php } ?>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" name="upload">Login</button>
            </form>
        </div>
    
</body>

</html>