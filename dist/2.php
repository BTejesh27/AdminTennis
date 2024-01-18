<div>
      <label for="player1Input">Player 1 Score:</label>
      <input type="number" id="player1Input" min="0">
      <button onclick="updatePlayer1Score()">Update</button>
    </div>

    <div>
      <label for="player2Input">Player 2 Score:</label>
      <input type="number" id="player2Input" min="0">
      <button onclick="updatePlayer2Score()">Update</button>
    </div>
  </div>

  <script>
    function updateScores(player1Score, player2Score) {
      document.getElementById('player1Score').innerText = player1Score;
      document.getElementById('player2Score').innerText = player2Score;
    }

    function updatePlayer1Score() {
      const player1Input = document.getElementById('player1Input');
      updateScores(player1Input.value, document.getElementById('player2Score').innerText);
    }

    function updatePlayer2Score() {
      const player2Input = document.getElementById('player2Input');
      updateScores(document.getElementById('player1Score').innerText, player2Input.value);
    }

    
  </script>
</body>