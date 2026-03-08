<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['c_name'];
    $gpa = (float)$_POST['c_grade'];
    $status = ($gpa >= 3.0) ? "ممتاز" : "متوسط/ضعيف";

    echo "<h3>مادة: $name</h3>";
    echo "المعدل: <strong>$gpa</strong><br>";
    echo "التقدير: <strong>$status</strong><br><br>";
    echo "<a href='gpa_calc_maroua.html'>العودة</a>";
}
?>
