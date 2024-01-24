<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_password'])) {
    // User is not logged in, redirect to login page
    header("Location: admin.php");
    exit;
}

// Continue with the rest of your index.php code

// You can also use $_SESSION['user_password'] to access the user's password if needed
$userPassword = $_SESSION['user_password'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Tennis Live Score</title>
    <style>
        /* Your existing styles go here */

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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    $(document).ready(function() {
        function updateScores() {
            $.ajax({
                url: 'updateScore.php',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Update the table with the latest scores
                    var tableBody = $('#scoreTable tbody');
                    tableBody.empty();

                    $.each(response, function(index, row) {
                        tableBody.append('<tr><td>' + row.player1 + '</td><td>' + row.player2 + '</td></tr>');
                    });
                },
                error: function(error) {
                    console.error('Error fetching live scores:', error);
                }
            });
        }

        // Initial load of scores
        updateScores();

        // Update scores every 10 seconds (adjust as needed)
        setInterval(updateScores, 10000); // 10 seconds

        // Reload the page every 3 seconds
        setInterval(function() {
            location.reload();
        }, 10000); // 3 second
    });

    $(document).ready(function() {
        var eventSource = new EventSource('sse.php');

        eventSource.onmessage = function(event) {
            // Parse and update the table with the latest scores
            var tableBody = $('#scoreTable tbody');
            tableBody.empty();

            var scores = JSON.parse(event.data);

            $.each(scores, function(index, row) {
                tableBody.append('<tr><td>' + row.player1 + '</td><td>' + row.player2 + '</td></tr>');
            });
        };

        eventSource.onerror = function(event) {
            console.error('Error with SSE:', event);
            eventSource.close();
        };
    });
</script>

</head>

<body>
    <?php include 'nav.php'; ?>
    <main>
        <div id="layoutSidenav_content">
            <div class="container-fluid px-4">
                <div class="container">
                    <h2>live score</h2>
                    <table id="scoreTable">
                        <thead>
                            <tr>
                                <th>Player 1</th>
                                <th>Player 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'config.php';

                            $sql = "SELECT * FROM scores";

                            $result = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>{$row['player1']}</td>";
                                echo "<td>{$row['player2']}</td>";
                                echo "</tr>";
                            }

                            mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2023</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>