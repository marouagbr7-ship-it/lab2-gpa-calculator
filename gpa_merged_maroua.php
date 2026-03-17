<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>حساب المعدل المدمج - مروة</title>
    <link rel="stylesheet" href="style_maroua.css">
</head>
<body>
    <h3>حساب المعدل الفصلي (Step 2)</h3>

    <form id="calcForm" action="gpa_merged_maroua.php" method="POST">
        <label>اسم المادة:</label>
        <input type="text" name="c_name" required>

        <label>عدد الساعات:</label>
        <input type="number" name="c_hours" required min="1">

        <label>التقدير:</label>
        <select name="c_grade" required>
            <option value="4.0">A / A+</option>
            <option value="3.0">B</option>
            <option value="2.0">C</option>
            <option value="1.0">D</option>
            <option value="0.0">F</option>
        </select>
        <button type="submit" name="calculate">حساب المعدل</button>
    </form>

    <div id="result">
        if (isset($_POST['calculate'])) {
            $name = $_POST['c_name'];
            $hours = $_POST['c_hours'];
            $grade_points = $_POST['c_grade'];
            
            $status = "";
            if ($grade_points >= 3.7) $status = "Distinction (امتياز)";
            elseif ($grade_points >= 3.0) $status = "Merit (جيد جداً)";
            elseif ($grade_points >= 2.0) $status = "Pass (مقبول)";
            else $status = "Fail (راسب)";

            echo "<hr><h4>النتيجة لـ: $name</h4>";
            echo "<p>عدد الساعات: $hours</p>";
            echo "<strong>الحالة: $status</strong>";
        }
    </div>
    <script src="script_maroua.js"></script>
</body>
</html>
