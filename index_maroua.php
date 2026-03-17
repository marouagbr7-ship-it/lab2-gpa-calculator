<?php
// PHP logic (at the top of the file as shown in Listing 5)
$gpa = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $courses = $_POST['course'];
    $credits = $_POST['credits'];
    $grades = $_POST['grade'];

    $totalPoints = 0;
    $totalCredits = 0;

    for ($i = 0; $i < count($courses); $i++) {
        $c_hours = floatval($credits[$i]);
        $c_grade = floatval($grades[$i]);

        if ($c_hours > 0) {
            $totalPoints += ($c_hours * $c_grade);
            $totalCredits += $c_hours;
        }
    }

    if ($totalCredits > 0) {
        $gpa = number_format($totalPoints / $totalCredits, 2);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GPA Calculator - Step 2</title>
    <link rel="stylesheet" href="style_maroua.css">
    <script src="script_maroua.js"></script>
</head>
<body>
    <h1>GPA Calculator</h1>

    <?php if ($gpa !== ""): ?>
        <p id="result">Your GPA is: <strong><?php echo $gpa; ?></strong></p>
    <?php endif; ?>

    <form action="index_maroua.php" method="post" onsubmit="return validateForm();">
        <div id="course-container">
            <div class="course-row">
                <label>Course:</label>
                <input type="text" name="course[]" required>
                <label>Credits:</label>
                <input type="number" name="credits[]" min="1" required>
                <label>Grade:</label>
                <select name="grade[]">
                    <option value="4.0">A</option>
                    <option value="3.0">B</option>
                    <option value="2.0">C</option>
                    <option value="1.0">D</option>
                    <option value="0.0">F</option>
                </select>
            </div>
        </div>
        <br>
        <button type="button" onclick="addCourseRow()">+ Add Course</button>
        <input type="submit" value="Calculate GPA">
    </form>
</body>
</html>
