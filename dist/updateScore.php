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
    align-items: center;
    background-color: #000;
    display: flex;
    justify-content: center;
    height: 100vh;
  }

  .form {
    background-color: #15172b;
    border-radius: 20px;
    box-sizing: border-box;
    height: 500px;
    padding: 20px;
    width: 620px;
  }

  .title {
    color: #eee;
    font-family: sans-serif;
    font-size: 36px;
    font-weight: 600;
    margin-top: 30px;
  }

  .subtitle {
    color: #eee;
    font-family: sans-serif;
    font-size: 16px;
    font-weight: 600;
    margin-top: 10px;
  }

  .input-container {
    height: 50px;
    position: relative;
    width: 100%;
  }

  .ic1 {
    margin-top: 40px;
  }

  .ic2 {
    margin-top: 30px;
  }



  .cut {
    background-color: #15172b;
    border-radius: 10px;
    height: 20px;
    left: 20px;
    position: absolute;
    top: -20px;
    transform: translateY(0);
    transition: transform 200ms;
    width: 76px;
  }

  .cut-short {
    width: 50px;
  }

  .input:focus ~ .cut,
  .input:not(:placeholder-shown) ~ .cut {
    transform: translateY(8px);
  }

  .placeholder {
    color: #65657b;
    font-family: sans-serif;
    left: 20px;
    line-height: 14px;
    pointer-events: none;
    position: absolute;
    transform-origin: 0 50%;
    transition: transform 200ms, color 200ms;
    top: 20px;
  }

  
  .input:focus ~ .placeholder,
  .input:not(:placeholder-shown) ~ .placeholder {
    transform: translateY(-30px) translateX(10px) scale(0.75);
  }

  .input:not(:placeholder-shown) ~ .placeholder {
    color: #808097;
  }

  .input:focus ~ .placeholder {
    color: #dc2f55;
  }

  .submit {
    background-color: #08d;
    border-radius: 12px;
    border: 0;
    box-sizing: border-box;
    color: #eee;
    cursor: pointer;
    font-size: 18px;
    height: 50px;
    margin-top: 38px;
    outline: 0;
    text-align: center;
    width: 100%;
  }

  .submit:active {
    background-color: #06b;
  }
  .input {
    background-color: #303245;
    border-radius: 12px;
    border: 0;
    box-sizing: border-box;
    color: #eee;
    font-size: 18px;
    height: 100%;
    outline: 0;
    padding: 4px 20px 0;
    width: 100%;
  }

  .input1 {
    background-color: #303245;
    border-radius: 12px;
    border: 0;
    box-sizing: border-box;
    color: #eee;
    font-size: 18px;
    height: 100%;
    outline: 0;
    padding: 4px 20px 0;
    width: 47%;
  }

  .input2 {
    background-color: #303245;
    border-radius: 12px;
    border: 0;
    box-sizing: border-box;
    color: #eee;
    font-size: 18px;
    height: 100%;
    outline: 0;
    padding-left: 200px;
    width: 50%;
  }body {
      align-items: center;
      background-color: #000;
      display: flex;
      justify-content: center;
      height: 100vh;
    }

    .form {
      background-color: #15172b;
      border-radius: 20px;
      box-sizing: border-box;
      height: 500px;
      padding: 20px;
      width: 620px;
      display: fixed;
      flex-direction: column;
      align-items: center;
    }

    .title {
      color: #eee;
      font-family: sans-serif;
      font-size: 36px;
      font-weight: 600;
      margin-top: 30px;
    }

    .input-container {
      width: 100%;
      margin-top: 20px;
      display: flex;
      justify-content: space-between;
    }


    .cut {
      background-color: #15172b;
      border-radius: 10px;
      height: 20px;
      left: 20px;
      position: absolute;
      top: -20px;
      transform: translateY(0);
      transition: transform 200ms;
      width: 76px;
    }

    .cut-short {
      width: 50px;
    }

    .input:focus ~ .cut,
    .input:not(:placeholder-shown) ~ .cut {
      transform: translateY(8px);
    }

    .placeholder {
      color: #65657b;
      font-family: sans-serif;
      line-height: 14px;
      pointer-events: none;
      position: absolute;
      transform-origin: 0 50%;
      transition: transform 200ms, color 200ms;
      top: 20px;
    }

    

    .input:focus ~ .placeholder,
    .input:not(:placeholder-shown) ~ .placeholder {
      transform: translateY(-30px) translateX(10px) scale(0.75);
    }

    .input:not(:placeholder-shown) ~ .placeholder {
      color: #808097;
    }

    .input:focus ~ .placeholder {
      color: #dc2f55;
    }

    .submit {
      background-color: #08d;
      border-radius: 12px;
      border: 0;
      box-sizing: border-box;
      color: #eee;
      cursor: pointer;
      font-size: 18px;
      height: 50px;
      margin-top: 38px;
      outline: 0;
      text-align: center;
      width: 100%;
    }

    .submit:active {
      background-color: #06b;
    }
    .input-with-placeholder input {
    color: #333; /* Set the color for entered text */
}

.input-with-placeholder input::placeholder {
    color: #999; /* Set the color for placeholder text */
}

  </style>
</head>
<body>

  <!-- Update form -->
  <form id="updateForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="form">
      <div class="title">Update Score</div>

  <!-- First Row -->
<div class="input-container">
    <div class="input-with-placeholder">
        <input type="text" class="input1" id="pname" name="pname" min="0" placeholder=" " />
        <label for="firstname" class="placeholder">First Player name</label>
    </div>
    <input type="number" class="input1" id="player1Input" name="player1" min="0" placeholder=" First Player Score" />
</div>

<!-- Second Row -->
<div class="input-container">
    <div class="input-with-placeholder">
        <input type="text" class="input1" id="pname2" name="pname2" min="0" placeholder=" " />
        <label for="firstname" class="placeholder">Second Player Name</label>
    </div>
    <input type="number" class="input1" id="player2Input" name="player2" min="0" placeholder="Second Player Score " />
</div>

<!-- Remaining Rows -->
<div class="input-container">
    <input type="time" class="input1" id="player2Input" name="mtime" placeholder=" " />
    <label for="player2Input" class="placeholder">.  .   .  .   .   .   Match Time</label>
    <input type="date" class="input1" id="player2Input" name="mdate" placeholder=" " />
    <label for="player2Input" class="placeholder"></label>
</div>

<div class="input-container">
    <input type="text" class="input" id="player2Input" name="category" placeholder=" " />
    <label for="player2Input" class="placeholder">Category</label>
</div>
<button type="text" class="submit">Update</button>


  <script>
    const eventSource = new EventSource('sse.php');

    eventSource.onmessage = function (event) {
      // Reload the page when a reload command is received
      if (event.data === '{}') {
        location.reload();
      }
    };

    eventSource.onerror = function (error) {
      console.error('EventSource failed:', error);
      eventSource.close();
    };
  </script>

<?php
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $player1 = $_POST["player1"];
    $pname = $_POST["pname"];
    $player2 = $_POST["player2"];
    $pname2 = $_POST["pname2"];
    $mdate = $_POST["mdate"];
    $mtime = $_POST["mtime"];
    $category = $_POST["category"];
    if (!empty($player1) && !empty($player2) && !empty($pname) && !empty($pname2) && !empty($mdate) && !empty($mtime) && !empty($category))
     {
      $sql = "UPDATE scores SET player1 = '$player1', player2 = '$player2', pname = '$pname', pname2 = '$pname2',mdate = '$mdate',mtime = '$mtime',category = '$category'";
  } elseif (!empty($player1) && !empty($player2) && !empty($pname) && !empty($pname2)) {
      // Case 1: Update all fields
      $sql = "UPDATE scores SET player1 = '$player1', player2 = '$player2', pname = '$pname', pname2 = '$pname2'";
  } elseif (!empty($player1) && !empty($player2) && !empty($pname)) {
      // Case 2: Update player1, player2, and player1 name
      $sql = "UPDATE scores SET player1 = '$player1', player2 = '$player2', pname = '$pname'";
  } elseif (!empty($player1) && !empty($player2) && !empty($pname2)) {
      // Case 3: Update player1, player2, and player2 name
      $sql = "UPDATE scores SET player1 = '$player1', player2 = '$player2', pname2 = '$pname2'";
  } elseif (!empty($player1) && !empty($pname) && !empty($pname2)) {
      // Case 4: Update player1, player1 name, and player2 name
      $sql = "UPDATE scores SET player1 = '$player1', pname = '$pname', pname2 = '$pname2'";
  } elseif (!empty($player2) && !empty($pname) && !empty($pname2)) {
      // Case 5: Update player2, player1 name, and player2 name
      $sql = "UPDATE scores SET player2 = '$player2', pname = '$pname', pname2 = '$pname2'";
  } elseif (!empty($player1) && !empty($pname)) {
      // Case 6: Update player1, player1 name
      $sql = "UPDATE scores SET player1 = '$player1', pname = '$pname'";
  } elseif (!empty($player1) && !empty($pname2)) {
      // Case 7: Update player1, player2 name
      $sql = "UPDATE scores SET player1 = '$player1', pname2 = '$pname2'";
  } elseif (!empty($player1) && !empty($player2)) {
    // Case 7: Update player1, player2 name
    $sql = "UPDATE scores SET player1 = '$player1', player2 = '$player2'";
  } elseif (!empty($player2) && !empty($pname)) {
      // Case 8: Update player2, player1 name
      $sql = "UPDATE scores SET player2 = '$player2', pname = '$pname'";
  } elseif (!empty($player2) && !empty($pname2)) {
      // Case 9: Update player2, player2 name
      $sql = "UPDATE scores SET player2 = '$player2', pname2 = '$pname2'";
  } elseif (!empty($pname) && !empty($pname2)) {
      // Case 10: Update player1 name, player2 name
      $sql = "UPDATE scores SET pname = '$pname', pname2 = '$pname2'";
  } elseif (!empty($player1)) {
      // Case 11: Only update player1
      $sql = "UPDATE scores SET player1 = '$player1'";
  } elseif (!empty($player2)) {
      // Case 12: Only update player2
      $sql = "UPDATE scores SET player2 = '$player2'";
  } elseif (!empty($pname)) {
      // Case 13: Only update player1 name
      $sql = "UPDATE scores SET pname = '$pname'";
  } elseif (!empty($pname2)) {
      // Case 14: Only update player2 name
      $sql = "UPDATE scores SET pname2 = '$pname2'";
  } else {
      // Case 15: Handle the case when no player information is provided
      echo "Error: Player information not provided.";
      exit();
  }
    if ($conn->query($sql) === TRUE) {
        // Do not exit immediately, let the SSE connection trigger the page reload
    } else {
        // There was an error in the SQL query
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>


  <!-- The rest of your HTML code remains unchanged -->

</body>
</html>