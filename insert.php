<html>
<body>
<div class="container">
<?php
$link = mysqli_connect("localhost", "root", "", "Names");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$nameErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['name'])) {
      echo "Name is required";
    }
    else{
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$name) or strlen($name)<4) {
            echo "Only letters and white space allowed and the length of the word must be at least 4!";
          }
          else {
$sql = "INSERT INTO bookednames (Name) VALUES ( '$name')";
if(mysqli_query($link, $sql)){
    header("Location: http://localhost");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
        }
    }
}
mysqli_close($link);  

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
<br>
<button class= "button"><a href="http://localhost" > Go back to Mainpage</a></button>
</div>
</body>
</html>