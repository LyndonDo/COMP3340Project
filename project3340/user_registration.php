<?php 
    session_start(); // Starting The Session
    include("connection.php"); // Including And Using "connection.php".
    include("function.php"); // Including And Using "connection.php".

    if($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = $_POST["username"]; // Access Input Tag That Has "username"
      $password = $_POST["password"]; // Access Input Tag That Has "password"

      if(!empty($username) && !empty($password) && !is_numeric($username)) { // checking if the username and password are empty, and checking if the username is not numerical
        $user_id = random_num(20); // Using Random Number For User Id
        $query = "insert into users (user_id, username, password) values ('$user_id', '$username', '$password')"; // Get Query For User Id, Username, and Password
        mysqli_query($connect, $query);

        header("Location: userlogin.php");
        die;

      } else {
        echo "Please enter some valid information!";
      }
    }
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
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
        <a href="user_registration.php">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg>
        </a>
      </div>
    </header>

    <h1 style="text-align: center;">Sign-In</h1>

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

    
    <div class="form-wrapper" style="margin-top: 50px;">
        <div class="form-container">
            <div class="register-login">
                <a href="user_registration.php"><h3 class="active">Sign-In</h3></a>
                <a href="userlogin.php"><h3>Log-In</h3></a>
            </div>
            <form method="post">
                <div class="input-container">
                    <label for="username">Username:</label>
                    <input type="text" name="username" required><br>
                </div>
                <div class="input-container">
                    <label for="password">Password:</label>
                    <input type="password" name="password" required><br>
                </div>
                <div class="selection-container">
                    <a href="userlogin.php"><input class="btn" type="submit" name="register" value="Register"></a>
                </div>
            </form>
        </div>
    </div>

    <footer style="position: fixed; left: 0; bottom: 0; width: 100%; margin-top: 50px;"">
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
