<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $courses = $_POST['course'];
    $credits = $_POST['credits'];
    $grades = $_POST['grade'];

    $total_p = 0;
    $total_c = 0;
    
    $html = "<ul class='list-group mt-3'>";

    for ($i = 0; $i < count($courses); $i++) {
        $name = htmlspecialchars($courses[$i]);
        $cr = floatval($credits[$i]);
        $gr = floatval($grades[$i]);

        if ($cr > 0) {
            $total_p += ($cr * $gr);
            $total_c += $cr;
            $html .= "<li class='list-group-item d-flex justify-content-between'>$name <span>Grade: $gr</span></li>";
        }
    }
    $html .= "</ul>";

    if ($total_c > 0) {
        $finalGPA = round($total_p / $total_c, 2);
        echo json_encode([
            'success' => true,
            'gpa' => $finalGPA,
            'details' => $html
        ]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>
