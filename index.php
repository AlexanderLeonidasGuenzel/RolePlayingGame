<!-- index.php -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Role Playing Game</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <h1>Role Playing Game</h1>
    </header>
    <main>
      <form action="game.php" method="post">
        <div class="card-container">
          <div class="player-card">
            <!-- Player 1 -->
            <!-- Name -->
            <h3>Player 1</h3>
            <div class="name-container">
              <label for="p1_name">Name</label>
              <input
                type="text"
                id="p1_name"
                name="p1_name"
                placeholder="Player 1"
                maxlength="20"
                required
              />
            </div>

            <!-- Race choice-->
            <div class="race-container">
              <!-- Human -->
              <input
                id="p1_human"
                type="radio"
                name="p1_race"
                value="human"
                checked="checked"
              />
              <label for="p1_human">Human</label>

              <!-- Orc -->
              <input id="p1_orc" type="radio" name="p1_race" value="orc" />
              <label for="p1_orc">Orc</label>
            </div>

            <!-- Ring choice-->
            <div class="ring-container">
              <!-- Strong Ring -->
              <input
                type="radio"
                name="p1_ring"
                id="p1_strong_ring"
                value="strong_ring"
                checked="checked;"
              />
              <label for="p1_strong_ring">Ring of Strenght</label>

              <!-- Lucky Ring -->
              <input
                type="radio"
                name="p1_ring"
                id="p1_lucky_ring"
                value="lucky_ring"
              />
              <label for="p1_lucky_ring">Ring of Luck</label>
            </div>
          </div>
          <div class="player-card">
            <!-- Player 2 -->
            <!-- Name -->
            <h3>Player 2</h3>
            <div class="name-container">
              <label for="p2_name">Name</label>
              <input
                type="text"
                id="p2_name"
                name="p2_name"
                placeholder="Player 2"
                maxlength="20"
                required
              />
            </div>

            <!-- Race -->
            <div class="race-container">
              <!-- Human -->
              <input id="p2_human" type="radio" name="p2_race" value="human" />
              <label for="p2_human">Human</label>

              <!-- Orc -->
              <input
                id="p2_orc"
                type="radio"
                name="p2_race"
                value="orc"
                checked="checked"
              />
              <label for="p2_orc">Orc</label>
            </div>

            <!-- Ring -->
            <div class="ring-container">
              <!-- Strong Ring -->
              <input
                type="radio"
                name="p2_ring"
                id="p2_strong_ring"
                value="strong_ring"
              />
              <label for="p2_strong_ring">Ring of Strength</label>

              <!-- Lucky Ring -->
              <input
                type="radio"
                name="p2_ring"
                id="p2_lucky_ring"
                value="lucky_ring"
                checked="checked;"
              />
              <label for="p2_lucky_ring">Ring of Luck</label>
            </div>
          </div>
        </div>
        <input class="btn" type="submit" name="btn-submit" value="Start Game" />
      </form>
    </main>
    <footer>
      <p>&copy; 2025 Alexander Guenzel</p>
    </footer>
  </body>
</html>
