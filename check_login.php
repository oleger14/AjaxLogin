<?php
$conn = mysqli_connect("localhost", "root", "", "db_users");
if (! empty($_POST["username"])) {
    $sql = "SELECT * FROM users WHERE userName=?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $_POST["username"]);
    $statement->execute();
    $result = $statement->get_result();
    if ($result->num_rows > 0) {
        echo "<span id='phppot-message' class='error'>Username is not available.</span>";
    } else {
        echo "<span id='phppot-message' class='success'>Username is available.</span>";
    }
}
?>