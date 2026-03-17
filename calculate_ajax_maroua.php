<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $courses = $_POST['course'];
    $credits = $_POST['credits'];
    $grades = $_POST['grade'];

    $totalP = 0;
    $totalC = 0;

    $table = "<table class='table table-sm table-striped'><tr><th>Course</th><th>Credits</th><th>Grade</th></tr>";

    for ($i = 0; $i < count($courses); $i++) {
        $c_name = htmlspecialchars($courses[$i]);
        $c_cr = floatval($credits[$i]);
        $c_gr = floatval($grades[$i]);

        if ($c_cr > 0) {
            $totalP += ($c_cr * $c_gr);
            $totalC += $c_cr;
            $table .= "<tr><td>$c_name</td><td>$c_cr</td><td>$c_gr</td></tr>";
        }
    }
    $table .= "</table>";

    if ($totalC > 0) {
        $resGPA = round($totalP / $totalC, 2);
        echo json_encode([
            'success' => true,
            'gpa' => $resGPA,
            'table' => $table
        ]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>
