<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Tutors</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Admin Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="admin_home.php">Home</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="admin_ViewTutor.php"><span class="sr-only">(current)</span>View Tutor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_ViewUser.php">View User</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="admin_RemoveTutor.php">Delete Tutor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_Profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

<div class="container mt-5">
    <h2 class="mb-4">View Tutors</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th></th>
                        <th>Tutor ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Step 1: Establish a connection to your database
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "tuto_learn";

                    $conn = new mysqli($servername, $username, $password, $database);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Step 2: Execute a SELECT query to retrieve data from the tutor table
                    $sql = "SELECT * FROM tutor";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Step 3: Iterate over the result set and display the data in a tabular format
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><input type='checkbox' name='selected_tutors[]' value='" . $row["tid"] . "'></td>";
                            echo "<td>" . $row["tid"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["phno"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["password"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No tutors found</td></tr>";
                    }

                    // Close the connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
        <button type="submit" class="btn btn-danger" name="delete_tutors">Delete Selected Tutors</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Handle form submission for deleting tutors
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_tutors'])) {
    if (isset($_POST['selected_tutors']) && !empty($_POST['selected_tutors'])) {
        // Step 1: Establish a connection to your database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "tuto_learn";

        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Step 2: Prepare and execute DELETE query for each selected tutor
        foreach ($_POST['selected_tutors'] as $selected_tutor) {
            $sql = "DELETE FROM tutor WHERE tid = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $selected_tutor);
            $stmt->execute();
        }

        // Close the connection
        $conn->close();

        // Redirect to the same page to refresh the tutor list after deletion
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>
