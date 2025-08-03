<?php 
    function check_login($connect) { // check_login function is to check the users logging in 
        if (isset($_SESSION['user_id'])) {
            $legit_id = $_SESSION['user_id'];
            $query = "SELECT * FROM users WHERE user_id = '$legit_id' LIMIT 1"; // Get Query From "users" Database
            $result = mysqli_query($connect, $query); // Get Results From The Query

            if ($result && mysqli_num_rows($result) > 0) { // Checking if there are results
                return mysqli_fetch_assoc($result); 
            } else {
                // Invalid session user ID
                session_unset();
                session_destroy();
            }
        }

        header("Location: userlogin.php");
        die;
    }



    function random_num($length = 10) { // Random Number For The Users ID
        $length = max(5, min($length, 18)); 

        $text = "";
        for ($i = 0; $i < $length; $i++) { // Displaying The Number For Users ID
            $text .= random_int(0, 9);
        }

        return $text;
    }

    function game_data($connect) { // Access The Game Data From The Database
        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $query = "SELECT * FROM games WHERE user_id = '$id' LIMIT 1"; // Get Query From "games" Database
            $result = mysqli_query($connect, $query); // Get Results From The Query

            if ($result && mysqli_num_rows($result) > 0) { // Checking if there are results
                return mysqli_fetch_assoc($result);
            } else {
                // Invalid session user ID
                session_unset();
                session_destroy();
            }
        }
    }


?>