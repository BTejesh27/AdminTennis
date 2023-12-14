<?php
include 'connect.php';
// Assuming you have a database connection established

// SQL queries
$s1 = "SELECT count(*) as count FROM players_d WHERE club='club1'";
$s2 = "SELECT count(*) as count FROM players_d WHERE club='club2'";
$s3 = "SELECT count(*) as count FROM players_d WHERE club='club3'";

// Execute queries and fetch results
$result1 = mysqli_query($conn, $s1);
$row1 = mysqli_fetch_assoc($result1);

$result2 = mysqli_query($conn, $s2);
$row2 = mysqli_fetch_assoc($result2);

$result3 = mysqli_query($conn, $s3);
$row3 = mysqli_fetch_assoc($result3);

// Close database connection
mysqli_close($conn);

// Prepare data for Chart.js
$labels = ['Club 1', 'Club 2', 'Club 3'];
$data = [$row1['count'], $row2['count'], $row3['count']];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pie Chart</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<!-- Display the pie chart -->
<div style="width: 50%;">
    <canvas id="myPieChart"></canvas>
</div>

<script>
    // Create a pie chart using Chart.js
    var ctx = document.getElementById('myPieChart').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                data: <?php echo json_encode($data); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.8)',
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 206, 86, 0.8)'
                ],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        }
    });
</script>

</body>
</html>
