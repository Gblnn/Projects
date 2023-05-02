<?php
  $username = filter_input(INPUT_POST, 'username');
  $password = filter_input(INPUT_POST, 'password');

  if (!empty($username)){
    if (!empty($password)){
      $host = "localhost";
      $dbusername = "root";
      $dbpassword = "";
      $dbname = "website";
      // Create connection
      $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

      if (mysqli_connect_error()){
        die('Connect Error ('. mysqli_connect_errno() .') '
        . mysqli_connect_error());
      }
      else{
        $select = " SELECT * FROM users WHERE username = '$username' && password = '$password' ";
        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
          $row = mysqli_fetch_array($result);

          if($row['username'] == $username){
            header('location:Home.html');
            
          }
    }
    else{
      header('location:unable.html');
    }
  }
}
else{
  echo "Password should not be empty";
  header('location:Login.html');
  die();
}
}
else{
  echo "Username should not be empty";
  header('location:Login.html');
  die();
}
?>
