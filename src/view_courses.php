<?php
// Include the database configuration file
require_once 'config.php';

// SQL query to fetch available courses
$query = "SELECT course_code, course_name, description, credits FROM courses";
$result = mysqli_connect_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Courses - University Portal</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <header>
            <div>
                <h1>University Portal</h1>
                <p>Logged in as: Student</p>
            </div>
            <nav>
                <a href="view_courses.php">Available Courses</a>
                <a href="registered_courses.php">My Registrations</a>
                <a href="login.php" style="color: #dc3545;">Logout</a>
            </nav>
        </header>

        <section>
            <h2>Available Courses</h2>
            <p style="color: #666; margin-bottom: 15px;">Browse through the available course modules for this academic semester.</p>

            <table>
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Course Title</th>
                        <th>Description</th>
                        <th>Credits</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td><strong>" . htmlspecialchars($row['course_code']) . "</strong></td>";
                            echo "<td>" . htmlspecialchars($row['course_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['credits']) . "</td>";
                            // Links to Maxxie's registration module
                            echo "<td><a href='register_course.php?code=" . urlencode($row['course_code']) . "' class='btn btn-primary'>Register</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' style='text-align:center; color:#999;'>No available courses were found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </div>

</body>
</html>