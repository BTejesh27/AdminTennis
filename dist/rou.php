<?php
// Include your database connection code here
include "connect.php";

if (isset($_POST['submit'])) {
    $id = $_POST['ID'];
    $date = $_POST['date'];
    $des = $_POST['description'];
    $link = $_POST['link'];

    // Update the news item in the "flash_news" database using prepared statements
    $updateQuery = "UPDATE flash_news SET  date = ?, link = ?, description = ? WHERE ID = ?";
    
    $stmt = mysqli_prepare($conn, $updateQuery);
    
    if ($stmt === false) {
        // Check if preparing the statement failed
        echo "Error preparing update statement: " . mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, "sssi", $date, $link, $des, $id);

        if (mysqli_stmt_execute($stmt)) {
            // Success response
            echo json_encode(array('News item updated successfully.'));
        } else {
            // Error response
            echo json_encode(array('status' => 'error', 'message' => 'Error updating news item: ' . mysqli_stmt_error($stmt)));
        }

        mysqli_stmt_close($stmt);
    }
}
?>


   

<!DOCTYPE html>
<html>
<head>
    
    <title>Update News Item</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        textarea {
            height: 100px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<?php
// Include your database connection code here
include "connect.php";

// Initialize variables to store existing data
$id = "";
$date = "";
$des = "";
$link = "";

if (isset($_POST['submit'])) {
    $id = $_POST['ID'];
    $date = $_POST['date'];
    $des = $_POST['description'];
    $link = $_POST['link'];

    // Update the news item in the "flash_news" database using prepared statements
    $updateQuery = "UPDATE flash_news SET date = ?, link = ?, description = ? WHERE ID = ?";
    
    $stmt = mysqli_prepare($conn, $updateQuery);
    
    if ($stmt === false) {
        // Check if preparing the statement failed
        echo "Error preparing update statement: " . mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, "sssi", $date, $link, $des, $id);

        if (mysqli_stmt_execute($stmt)) {
            // Success response
            echo json_encode(array('News item updated successfully.'));
        } else {
            // Error response
            echo json_encode(array('status' => 'error', 'message' => 'Error updating news item: ' . mysqli_stmt_error($stmt)));
        }

        mysqli_stmt_close($stmt);
    }
} else {
    // Retrieve existing data from the database
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $selectQuery = "SELECT * FROM flash_news WHERE ID = ?";
        $stmt = mysqli_prepare($conn, $selectQuery);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            
            // Populate variables with existing data
            $date = $row['date'];
            $des = $row['description'];
            $link = $row['link'];
            
            mysqli_stmt_close($stmt);
        } else {
            echo "Error selecting data: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    
    <title>Update News Item</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        textarea {
            height: 100px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Update News Item</h1>
    <form method="POST" >
        <input type="hidden" name="ID" value="<?php echo $id; ?>">
        <label for="date">Date:</label>
        <input type="date" name="date" id="date" required value="<?php echo $date; ?>"><br><br>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required><?php echo $des; ?></textarea><br><br>

        <label for="link">Link:</label>
        <input type="text" name="link" id="link" required value="<?php echo $link; ?>"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>

<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Player Data</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }

            #layoutSidenav_content {
                margin: 20px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            th,
            td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            th {
                background-color: #f2f2f2;
            }

            .container {
                max-width: 1200px;
                margin: 0 auto;
            }

            .btn {
                text-decoration: none;
                padding: 8px 12px;
                margin: 2px;
                border-radius: 4px;
                display: inline-block;
            }

            .btn-primary {
                background-color: #007bff;
                color: #fff;
            }

            .btn-danger {
                background-color: #dc3545;
                color: #fff;
            }
        </style>
