<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Course</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2>Update Course</h2>
        <?php
        // Check if the course ID is provided
        if (isset($_GET['course_id'])) {
            $course_id = $_GET['course_id'];
            // Place your database connection code here
            // Assuming you have connected to the database

            // Fetch course details
            $sql = "SELECT * FROM courses WHERE course_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $course_id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>
                <form action="update_course.php" method="post">
                    <input type="hidden" name="course_id" value="<?php echo $row['course_id']; ?>">
                    <label for="course_name">Course Name:</label><br>
                    <input type="text" id="course_name" name="course_name" value="<?php echo $row['course_name']; ?>" required><br><br>

                    <label for="description">Description:</label><br>
                    <textarea id="description" name="description" rows="4" cols="50" required><?php echo $row['description']; ?></textarea><br><br>

                    <label for="course_concept">Course Concept:</label><br>
                    <select id="course_concept" name="course_concept" required>
                        <option value="Programming" <?php echo ($row['course_concept'] == 'Programming') ? 'selected' : ''; ?>>Programming</option>
                        <option value="Data Science" <?php echo ($row['course_concept'] == 'Data Science') ? 'selected' : ''; ?>>Data Science</option>
                        <option value="Web Development" <?php echo ($row['course_concept'] == 'Web Development') ? 'selected' : ''; ?>>Web Development</option>
                        <!-- Add more options as needed -->
                    </select><br><br>

                    <label for="tutor_name">Tutor Name:</label><br>
                    <input type="text" id="tutor_name" name="tutor_name" value="<?php echo $row['tutor_name']; ?>" required><br><br>

                    <label for="video_url">Video URL:</label><br>
                    <input type="text" id="video_url" name="video_url" value="<?php echo $row['video_url']; ?>" required><br><br>

                    <input type="submit" value="Update">
                </form>
        <?php
            } else {
                echo '<div class="alert alert-danger" role="alert">Course not found.</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">No course ID provided.</div>';
        }
        ?>
    </div>
</body>

</html>
