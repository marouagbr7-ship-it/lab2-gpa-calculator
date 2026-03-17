<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $courses = $_POST['course'];
    $credits = $_POST['credits'];
    $grades = $_POST['grade'];

    $totalPoints = 0;
    $totalCredits = 0;

    for ($i = 0; $i < count($courses); $i++) {
        $courseName = $courses[$i];
        $creditHours = $credits[$i];
        $gradeValue = $grades[$i];

        if ($creditHours > 0) {
            $totalPoints += ($gradeValue * $creditHours);
            $totalCredits += $creditHours;
        }
    }

    $gpa = ($totalCredits > 0) ? ($totalPoints / $totalCredits) : 0;

    echo "<html><body>";
    echo "<h1>GPA Calculation Result</h1>";
    echo "<p>Total Credits: $totalCredits</p>";
    echo "<p>Your GPA is: " . number_format($gpa, 2) . "</p>";
    echo "<a href='index_maroua.html'>Back to Calculator</a>";
    echo "</body></html>";
}
?>
