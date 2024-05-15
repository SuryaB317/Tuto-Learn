<?php
// Start the session
session_start();

// Check if the tutor is logged in, if not, redirect to the login page
if (!isset($_SESSION['tid'])) {
    header("Location: tutor_login.php");
    exit(); // Ensure that subsequent code is not executed after redirection
}

// Now, you can access the tutor's ID from the session variable $_SESSION['tid']
$tutor_id = $_SESSION['tid'];

// You can also access other tutor information stored in session variables if needed
$tutor_name = $_SESSION['name']; // Assuming 'name' is the name of the column storing the tutor's name

// You can also access other tutor information stored in session variables if needed
$tutor_name = $_SESSION['name']; // Assuming 'name' is the name of the column storing the tutor's name
if(isset($_GET['course_id'])) {
    $cid = $_GET['course_id'];
    // Now you can use $cid variable in your code
} else {
    echo "Course ID is not provided in the URL.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Quiz Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-vk55o3udW7JW/nx6Ql25b56dCZBfBfL4FWi8R3+IorGzGM2W/tbrJn3LkMz0hz8R" crossorigin="anonymous">
</head>
<body>
<style>
        .custom-container {
            max-width: 800px; /* Set your desired max-width */
            
        }
        
        body {
            font-family: Arial, sans-serif;
        }
        
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background-color: #333;
            color: #fff;
            transition: all 0.3s;
            height: 120vh;
        }
        
        #sidebar.active {
            width: 80px;
        }
        
        #sidebar img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin: 20px auto;
            display: block;
        }
        
        #sidebar ul.components {
            padding: 20px 0;
            border-bottom: 1px solid #4e4e4e;
        }
        
        #sidebar ul li a {
            padding: 10px;
            font-size: 1.2em;
            display: block;
            color: #fff;
            transition: all 0.3s;
        }
        
        #sidebar ul li a:hover {
            background-color: #555;
        }
        
        #content {
            margin-left: 250px;
            padding: 16px;
        }
        
        #content .form-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

    </style>
</head>
<body class="bg-primary">
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark border-right" id="sidebar">
            <div class="sidebar-heading">
                <img src="../img/img6.png" alt="Profile Image">
                <p id="userName" class="text-center"><?php echo $tutor_name; ?></p>
            </div>
            <ul class="list-unstyled components">
                <li><a href="tutor_index.php">Home</a></li>
                <li><a href="tutor_view_course.php">View Courses</a></li>
                <li><a href="upload_course.php">Upload Courses</a></li>
                <li><a href="update_course.php">Update Courses</a></li>
                <li><a href="upload_quiz.php">Upload Quiz</a></li>
            </ul>
        </div>
        <!-- /#sidebar -->

        <!-- Page Content -->
    
<?php
include('dbconnection.php');

// Check if the 'cid' parameter is set in the URLzE 
if(isset($_GET['course_id'])) {
    // Retrieve the value of 'cid' from the URL
    $cid = $_GET['course_id'];

    // Now you can use $cid variable in your code
    echo "Course ID: " . $cid;
} else {
    // If 'cid' is not set in the URL, handle the case accordingly
    echo "Course ID is not provided in the URL.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the course ID from the POST data
    $count_stmt = $conn->prepare("SELECT COUNT(*) FROM quiz_details WHERE cid = ?");
    $count_stmt->bind_param("s", $cid);
    $count_stmt->execute();
    $count_result = $count_stmt->get_result();
    $total_questions = $count_result->fetch_assoc()['COUNT(*)'];
    $count_stmt->close();

    // Initialize $stmt variable
    $stmt = null;

    if (isset($_POST['question']) && is_array($_POST['question'])) {
        // Loop through form data
        for ($i = 0; $i < count($_POST['question']); $i++) {
            // Extract form data
            $question = $_POST['question'][$i];
            $option1 = $_POST['option1'][$i];
            $option2 = $_POST['option2'][$i];
            $option3 = $_POST['option3'][$i];
            $option4 = $_POST['option4'][$i];
            $correct_option = $_POST['correct_option'][$i];

            // Calculate the question number
            $question_number = $total_questions + $i + 1;

            // Handle file upload
            $code_file = $_FILES['code']['tmp_name'][$i];
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["code"]["name"][$i]);
            move_uploaded_file($code_file, $target_file);
           
            // SQL query to insert data into the database (using prepared statements)
            $sql = "INSERT INTO quiz_details (cid, question_number, question, option1, option2, option3, option4, correct_option, code_snippet)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                
                // Bind parameters
                $stmt->bind_param("sisssssss", $cid, $question_number, $question, $option1, $option2, $option3, $option4, $correct_option, $target_file);
                // Execute statement
                if ($stmt->execute()) {
                    //echo "Quiz details saved successfully!";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                // Close statement
                $stmt->close();
            } else {
                echo "Error preparing statement: " . $conn->error;
            }
        }
    }
}

// Close database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Quiz Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-vk55o3udW7JW/nx6Ql25b56dCZBfBfL4FWi8R3+IorGzGM2W/tbrJn3LkMz0hz8R" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5 bg-primary p-4 rounded">
    <h2 class="text-center mb-4 text-light">Upload Quiz Details</h2>
    <form enctype="multipart/form-data" method="POST">
        <div class="mb-3">
            <label class="form-label text-light">Question</label>
            <textarea class="form-control" name="question[]" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label text-light">Code Snippet (if any)</label>
            <input type="file" class="form-control" name="code[]" accept="image/*">
            <small class="form-text text-light">Upload an image file for the code snippet.</small>
        </div>
        <div class="mb-3">
            <label class="form-label text-light">Option 1</label>
            <input type="text" class="form-control" name="option1[]" required>
        </div>
        <div class="mb-3">
            <label class="form-label text-light">Option 2</label>
            <input type="text" class="form-control" name="option2[]" required>
        </div>
        <div class="mb-3">
            <label class="form-label text-light">Option 3</label>
            <input type="text" class="form-control" name="option3[]" required>
        </div>
        <div class="mb-3">
            <label class="form-label text-light">Option 4</label>
            <input type="text" class="form-control" name="option4[]" required>
        </div>
        <div class="mb-3">
            <label class="form-label text-light">Correct Option</label>
            <select class="form-control" name="correct_option[]" required>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
                <option value="4">Option 4</option>
            </select>
        </div>
        <button type="submit" class="btn btn-light mt-3">Save Quiz</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-t63HlE4hncd/YJajYwFWvKqPs47Da3cS/9aJR5EVk85Zz4Mz1iiOu1BkB1efb8dL" crossorigin="anonymous"></script>

</body>
</html>

</body>
</html>
