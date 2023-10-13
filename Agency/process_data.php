
<?php
  session_start();

  include("../Assets/Connection/Connection.php");
  ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['highlights']) && isset($_POST['dayno'])) {
    $highlights = $_POST['highlights'];
    $dayNumbers = $_POST['dayno'];

    // Assuming you have a database connection
   

    // Loop through the data and insert into the database
    for ($i = 0; $i < count($highlights); $i++) {
        $highlight = $conn->real_escape_string($highlights[$i]);
        $dayNumber = $conn->real_escape_string($dayNumbers[$i]);

        // Insert data into the database
        $query = "INSERT INTO tbl_highlights (highlight_details, highlight_day,package_id) VALUES ('$highlight', '$dayNumber','".$_SESSION["pack"]."')";
        $conn->query($query);
    }


    header("location:Hotels.php");
} else {
    echo "Form data not properly submitted.";
}
?>
<?php 

?>