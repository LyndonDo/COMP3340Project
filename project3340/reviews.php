<?php
$connect = mysqli_connect("localhost", "root", "", "users_db");

if (!$connect) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Fetch title and rating for all games
$query = "SELECT title, rating FROM games";
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Query Failed: " . mysqli_error($connect));
}

// Store ratings in an array with titles as keys
$ratings = [];
while ($row = mysqli_fetch_assoc($result)) {
    $ratings[$row['title']] = $row['rating'];
}
?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
      <div class="logo-container">
        <h1>GameIQ</h1>
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M189-160q-60 0-102.5-43T42-307q0-9 1-18t3-18l84-336q14-54 57-87.5t98-33.5h390q55 0 98 33.5t57 87.5l84 336q2 9 3.5 18.5T919-306q0 61-43.5 103.5T771-160q-42 0-78-22t-54-60l-28-58q-5-10-15-15t-21-5H385q-11 0-21 5t-15 15l-28 58q-18 38-54 60t-78 22Zm3-80q19 0 34.5-10t23.5-27l28-57q15-31 44-48.5t63-17.5h190q34 0 63 18t45 48l28 57q8 17 23.5 27t34.5 10q28 0 48-18.5t21-46.5q0 1-2-19l-84-335q-7-27-28-44t-49-17H285q-28 0-49.5 17T208-659l-84 335q-2 6-2 18 0 28 20.5 47t49.5 19Zm348-280q17 0 28.5-11.5T580-560q0-17-11.5-28.5T540-600q-17 0-28.5 11.5T500-560q0 17 11.5 28.5T540-520Zm80-80q17 0 28.5-11.5T660-640q0-17-11.5-28.5T620-680q-17 0-28.5 11.5T580-640q0 17 11.5 28.5T620-600Zm0 160q17 0 28.5-11.5T660-480q0-17-11.5-28.5T620-520q-17 0-28.5 11.5T580-480q0 17 11.5 28.5T620-440Zm80-80q17 0 28.5-11.5T740-560q0-17-11.5-28.5T700-600q-17 0-28.5 11.5T660-560q0 17 11.5 28.5T700-520Zm-360 60q13 0 21.5-8.5T370-490v-40h40q13 0 21.5-8.5T440-560q0-13-8.5-21.5T410-590h-40v-40q0-13-8.5-21.5T340-660q-13 0-21.5 8.5T310-630v40h-40q-13 0-21.5 8.5T240-560q0 13 8.5 21.5T270-530h40v40q0 13 8.5 21.5T340-460Zm140-20Z"/></svg>
      </div>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="games.php">Games</a></li>
          <li><a href="recommendation.php">Recommendations</a></li>
          <li><a href="reviews.php">Reviews</a></li>
          <li><a href="findyourgame.php">Find Your Game</a></li>
          <li><a href="gamenews.php">Game News</a></li>
          <li><a href="wishlist.php">Wishlist</a></li>
        </ul>
      </nav>

      <div class="second-items">
        <div class="dropdown">
          <button class="dropbtn">Theme</button>
          <div class="dropdown-content">
            <a href="#">Light Mode</a>
            <a href="#">Dark Mode</a>
            <a href="#">Halloween Theme</a>
            <a href="#">Christmas Theme</a>
            <a href="#">Fall Theme</a>
            <a href="#">Winter Theme</a>
            <a href="#">Spring Theme</a>
            <a href="#">Summer Theme</a>
          </div>
        </div>
        <a href="user_profile.php">
          <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#000000"><path d="M226-262q59-42.33 121.33-65.5 62.34-23.17 132.67-23.17 70.33 0 133 23.17T734.67-262q41-49.67 59.83-103.67T813.33-480q0-141-96.16-237.17Q621-813.33 480-813.33t-237.17 96.16Q146.67-621 146.67-480q0 60.33 19.16 114.33Q185-311.67 226-262Zm253.88-184.67q-58.21 0-98.05-39.95Q342-526.58 342-584.79t39.96-98.04q39.95-39.84 98.16-39.84 58.21 0 98.05 39.96Q618-642.75 618-584.54t-39.96 98.04q-39.95 39.83-98.16 39.83ZM480.31-80q-82.64 0-155.64-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.51T80-480.18q0-82.82 31.5-155.49 31.5-72.66 85.83-127Q251.67-817 324.51-848.5T480.18-880q82.82 0 155.49 31.5 72.66 31.5 127 85.83Q817-708.33 848.5-635.65 880-562.96 880-480.31q0 82.64-31.5 155.64-31.5 73-85.83 127.34Q708.33-143 635.65-111.5 562.96-80 480.31-80Zm-.31-66.67q54.33 0 105-15.83t97.67-52.17q-47-33.66-98-51.5Q533.67-284 480-284t-104.67 17.83q-51 17.84-98 51.5 47 36.34 97.67 52.17 50.67 15.83 105 15.83Zm0-366.66q31.33 0 51.33-20t20-51.34q0-31.33-20-51.33T480-656q-31.33 0-51.33 20t-20 51.33q0 31.34 20 51.34 20 20 51.33 20Zm0-71.34Zm0 369.34Z"/></svg>
        </a>
      </div>
    </header>
    <h1 style="text-align: center;">Reviews</h1>
    <section class="secondary-header">
      <nav>
        <ul>
          <li><a href="About.html">About</a></li>
          <li><a href="#">Wiki</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Terms & Privacy</a></li>
          <li class="search-icon"><a href="search.php"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg></a></li>
        </ul>
      </nav>
    </section>

    <main>

    <form action="" method="get">
        <select name="rating" id="rating-select">
          <option value="">All Ratings</option>
          <option value="desc">Highest First</option>
          <option value="asc">Lowest First</option>
        </select>
      </form>

    <section class="games-container">
      <div class="card">
        <a href="">
            <img id="slide-1" src="images/ageofempires3.png" alt="Age of Empires 3 Game" data-genre="Strategy"/>
            <div class="container">
              <h2 style="margin-top:-10px; text-align: center;">Age of Empires 3</h2>
              <h3 style="margin-bottom: -10px; text-align: center;"><?= isset($ratings['Age Of Empires 3']) ? number_format($ratings['Age Of Empires 3'], 1) : 'N/A' ?> / 10</h3>
            </div>
        </a>
      </div>

      <div class="card">
        <a href="">
          <img id="slide-2" src="images/apexlegends.png" alt="Apex Legends Game" data-genre="Battle Royale"/>
          <div class="container">
            <h2 style="margin-top:-10px; text-align: center;">Apex Legends</h2>
            <h3 style="margin-bottom: -20px; text-align: center;"><?= isset($ratings['Apex Legends']) ? number_format($ratings['Apex Legends'], 1) : 'N/A' ?> / 10</h3>
          </div>
        </a>
      </div>

      <div class="card">
        <a href="">
          <img id="slide-3" src="images/brawlhalla.png" alt="Brawhalla Game" data-genre="Fighting"/>
          <div class="container">
            <h2 style="margin-top:-10px; text-align: center;">Brawhalla</h2>
            <h3 style="margin-bottom: -10px; text-align: center;"><?= isset($ratings['Brawlhalla']) ? number_format($ratings['Brawlhalla'], 1) : 'N/A' ?> / 10</h3>
          </div>
        </a>
      </div>

      <div class="card">
        <a href="">
          <img id="slide-4" src="images/civilization.png" alt="Sid Meier's Civilization Game" data-genre="Strategy"/>
          <div class="container">
            <h2 style="margin-top:-10px; text-align: center;">Sid Meier's Civilization</h2>
            <h3 style="margin-bottom: -10px; text-align: center;"><?= isset($ratings['Sid Meier\'s Civilization']) ? number_format($ratings['Sid Meier\'s Civilization'], 1) : 'N/A' ?> / 10</h3>
          </div>
        </a>
      </div>

      <div class="card">
        <a href="">
          <img id="slide-5" src="images/destiny2.png" alt="Destiny 2 Game" data-genre="Shooter"/>
          <div class="container">
            <h2 style="margin-top:-10px; text-align: center;">Destiny 2</h2>
            <h3 style="margin-bottom: -10px; text-align: center;"><?= isset($ratings['Destiny 2']) ? number_format($ratings['Destiny 2'], 1) : 'N/A' ?> / 10</h3>
          </div>
        </a>
      </div>

      <div class="card">
        <a href="">
          <img id="slide-6" src="images/honkaistarrail.png" alt="Honkai: Star Rail Game" data-genre="RPG"/>
          <div class="container">
            <h2 style="margin-top:-10px; text-align: center;">Honkai: Star Rail</h2>
            <h3 style="margin-bottom: -10px; text-align: center;"><?= isset($ratings['Honkai: Star Rail']) ? number_format($ratings['Honkai: Star Rail'], 1) : 'N/A' ?> / 10</h3>
          </div>
        </a>
      </div>

      <div class="card">
        <a href="">
          <img id="slide-7" src="images/lifeisstrange.png" alt="Life Is Strange Game" data-genre="Adventure"/>
          <div class="container">
            <h2 style="margin-top:-10px; text-align: center;">Life Is Strange</h2>
            <h3 style="margin-bottom: -10px; text-align: center;"><?= isset($ratings['Life Is Strange']) ? number_format($ratings['Life Is Strange'], 1) : 'N/A' ?> / 10</h3>
          </div>
        </a>
      </div>

      <div class="card">
        <a href="">
          <img id="slide-8" src="images/oncehuman.png" alt="Once Human Game" data-genre="Survival"/>
          <div class="container">
            <h2 style="margin-top:-10px; text-align: center;">Once Human</h2>
            <h3 style="margin-bottom: -10px; text-align: center;"><?= isset($ratings['Once Human']) ? number_format($ratings['Once Human'], 1) : 'N/A' ?> / 10</h3>
          </div>
        </a>
      </div>

      <div class="card">
        <a href="">
          <img id="slide-9" src="images/pubg.png" alt="PUBG Game" data-genre="Battle Royale"/>
          <div class="container">
            <h2 style="margin-top:-10px; text-align: center;">PUBG</h2>
            <h3 style="margin-bottom: -10px; text-align: center;"><?= isset($ratings['PUBG']) ? number_format($ratings['PUBG'], 1) : 'N/A' ?> / 10</h3>
          </div>
        </a>
      </div>

      <div class="card">
        <a href="">
          <img id="slide-10" src="images/rainboxsixsiegex.png" alt="Rainbow Six Siege X Game" data-genre="Shooter"/>
          <div class="container">
            <h2 style="margin-top:-10px; text-align: center;">Rainbow Six Siege X</h2>
            <h3 style="margin-bottom: -10px; text-align: center;"><?= isset($ratings['Rainbow Six Siege X']) ? number_format($ratings['Rainbow Six Siege X'], 1) : 'N/A' ?> / 10</h3>
          </div>
        </a>
      </div>

      <div class="card">
      <a href="">
        <img id="slide-11" src="images/rocketleague.png" alt="Rocket League Game" data-genre="Sports"/>
        <div class="container">
            <h2 style="margin-top:-10px; text-align: center;">Rocket League</h2>
            <h3 style="margin-bottom: -10px; text-align: center;"><?= isset($ratings['Rainbow Six Siege X']) ? number_format($ratings['Rainbow Six Siege X'], 1) : 'N/A' ?> / 10</h3>
        </div>
      </a>
      </div>

      <div class="card">
        <a href="">
          <img id="slide-12" src="images/rougecompany.png" alt="Rouge Company Game" data-genre="Shooter"/>
          <div class="container">
            <h2 style="margin-top:-10px; text-align: center;">Rouge Company</h2>
            <h3 style="margin-bottom: -10px; text-align: center;"><?= isset($ratings['Rouge Company']) ? number_format($ratings['Rouge Company'], 1) : 'N/A' ?> / 10</h3>
          </div>
        </a>
      </div>

      <div class="card">
      <a href="">
        <img id="slide-13" src="images/sifu.png" alt="Sifu Game" data-genre="Fighting"/>
        <div class="container">
            <h2 style="margin-top:-10px; text-align: center;">Sifu</h2>
            <h3 style="margin-bottom: -10px; text-align: center;"><?= isset($ratings['Sifu']) ? number_format($ratings['Sifu'], 1) : 'N/A' ?> / 10</h3>
        </div>
      </a>
      </div>

      <div class="card">
        <a href="">
          <img id="slide-14" src="images/sims4.png" alt="Sims 4 Game" data-genre="Simulation"/>
          <div class="container">
            <h2 style="margin-top:-10px; text-align: center;">The Sims 4</h2>
            <h3 style="margin-bottom: -10px; text-align: center;"><?= isset($ratings['The Sims 4']) ? number_format($ratings['The Sims 4'], 1) : 'N/A' ?> / 10</h3>
          </div>
        </a>
      </div>

      <div class="card">
        <a href="">
          <img id="slide-15" src="images/splitgate2.png" alt="Splitgate 2 Game" data-genre="Shooter"/>
          <div class="container">
            <h2 style="margin-top:-10px; text-align: center;">Splitgate 2</h2>
            <h3 style="margin-bottom: -10px; text-align: center;"><?= isset($ratings['Splitgate 2']) ? number_format($ratings['Splitgate 2'], 1) : 'N/A' ?> / 10</h3>
          </div>
        </a>
      </div>

      <div class="card">
        <a href="">
          <img id="slide-16" src="images/thefinals.png" alt="The Finals Game" data-genre="Shooter"/>
          <div class="container">
            <h2 style="margin-top:-10px; text-align: center;">The Finals</h2>
            <h3 style="margin-bottom: -10px; text-align: center;"><?= isset($ratings['Warframe']) ? number_format($ratings['Warframe'], 1) : 'N/A' ?> / 10</h3>
          </div>
        </a>
      </div>

      <div class="card">
        <a href="">
          <img id="slide-17" src="images/verdun.png" alt="Verdun Game" data-genre="Shooter"/>
          <div class="container">
            <h2 style="margin-top:-10px; text-align: center;">Verdun</h2>
            <h3 style="margin-bottom: -10px; text-align: center;"><?= isset($ratings['Rouge Company']) ? number_format($ratings['Rouge Company'], 1) : 'N/A' ?> / 10</h3>
          </div>
        </a>
      </div>

      <div class="card">
        <a href="">
          <img id="slide-18" src="images/warframe.png" alt="Warframe Game" data-genre="Shooter"/>
          <div class="container">
            <h2 style="margin-top:-10px; text-align: center;">Warframe</h2>
            <h3 style="margin-bottom: -10px; text-align: center;"><?= isset($ratings['Warframe']) ? number_format($ratings['Warframe'], 1) : 'N/A' ?> / 10</h3>
          </div>
        </a>
      </div>

      <div class="card">  
        <a href="">
          <img id="slide-19" src="images/warthunder.png" alt=" War Thunder Game" data-genre="Shooter"/>
          <div class="container">
            <h2 style="margin-top:-10px; text-align: center;">War Thunder</h2>
            <h3 style="margin-bottom: -10px; text-align: center;"><?= isset($ratings['WarThunder']) ? number_format($ratings['WarThunder'], 1) : 'N/A' ?> / 10</h3>
          </div>
        </a>
      </div>

      <div class="card">
        <a href="">
          <img id="slide-20" src="images/lifeisstrange2.png" alt="Life Is Strange 2 Game" data-genre="Adventure"/>
          <div class="container">
            <h2 style="margin-top:-10px; text-align: center;">Life Is Strange 2</h2>
            <h3 style="margin-bottom: -10px; text-align: center;">8.4 / 10</h3>
          </div>
        </a>
      </div>

    </section>

    </main>

    <footer>
      <div class="logo-container">
        <h6>© 2025</h6>
        <h1>GameIQ</h1>
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M189-160q-60 0-102.5-43T42-307q0-9 1-18t3-18l84-336q14-54 57-87.5t98-33.5h390q55 0 98 33.5t57 87.5l84 336q2 9 3.5 18.5T919-306q0 61-43.5 103.5T771-160q-42 0-78-22t-54-60l-28-58q-5-10-15-15t-21-5H385q-11 0-21 5t-15 15l-28 58q-18 38-54 60t-78 22Zm3-80q19 0 34.5-10t23.5-27l28-57q15-31 44-48.5t63-17.5h190q34 0 63 18t45 48l28 57q8 17 23.5 27t34.5 10q28 0 48-18.5t21-46.5q0 1-2-19l-84-335q-7-27-28-44t-49-17H285q-28 0-49.5 17T208-659l-84 335q-2 6-2 18 0 28 20.5 47t49.5 19Zm348-280q17 0 28.5-11.5T580-560q0-17-11.5-28.5T540-600q-17 0-28.5 11.5T500-560q0 17 11.5 28.5T540-520Zm80-80q17 0 28.5-11.5T660-640q0-17-11.5-28.5T620-680q-17 0-28.5 11.5T580-640q0 17 11.5 28.5T620-600Zm0 160q17 0 28.5-11.5T660-480q0-17-11.5-28.5T620-520q-17 0-28.5 11.5T580-480q0 17 11.5 28.5T620-440Zm80-80q17 0 28.5-11.5T740-560q0-17-11.5-28.5T700-600q-17 0-28.5 11.5T660-560q0 17 11.5 28.5T700-520Zm-360 60q13 0 21.5-8.5T370-490v-40h40q13 0 21.5-8.5T440-560q0-13-8.5-21.5T410-590h-40v-40q0-13-8.5-21.5T340-660q-13 0-21.5 8.5T310-630v40h-40q-13 0-21.5 8.5T240-560q0 13 8.5 21.5T270-530h40v40q0 13 8.5 21.5T340-460Zm140-20Z"/></svg>
      </div>
      <nav>
          <p><a href="about.html">About</a> | <a href="wiki.html">Wiki</a></p>
      </nav>
    </footer>
    <script src="script.js"></script>
</body>
</html>