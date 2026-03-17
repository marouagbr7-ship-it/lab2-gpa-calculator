<?php
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
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>GPA Calculator - Maroua</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f5f5f5;
        }
        h2 {
            color: #333;
        }
        .container {
            background: white;
            padding: 20px;
            max-width: 600px;
            margin: auto;
            border: 1px solid #ccc;
        }
        .course-row {
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px dashed #eee;
        }
        input, select {
            padding: 5px;
            margin: 2px;
        }
        .result {
            padding: 10px;
            background: #e7f3fe;
            border: 1px solid #b6d4fe;
            margin-bottom: 15px;
            font-weight: bold;
        }
        .btn-add {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        .btn-submit {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 8px 15px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>GPA Calculator - Step 2</h2>

    <?php if ($gpa !== ""): ?>
        <div class="result">
            Your Calculated GPA is: <?php echo $gpa; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="index_maroua.php">
        <div id="dynamic-fields">
            <div class="course-row">
                <input type="text" name="course[]" placeholder="Course" required>
                <input type="number" name="credits[]" placeholder="Cr" style="width: 50px;" min="1" required>
                <select name="grade[]">
                    <option value="4.0">A</option>
                    <option value="3.0">B</option>
                    <option value="2.0">C</option>
                    <option value="1.0">D</option>
                    <option value="0.0">F</option>
                </select>
            </div>
        </div>

        <button type="button" class="btn-add" onclick="addMore()">+ Add Course</button>
        <input type="submit" class="btn-submit" value="Calculate Now">
    </form>
</div>

<script>
    function addMore() {
        var div = document.getElementById('dynamic-fields');
        var newRow = document.createElement('div');
        newRow.className = 'course-row';
        newRow.innerHTML = `
            <input type="text" name="course[]" placeholder="Course" required>
            <input type="number" name="credits[]" placeholder="Cr" style="width: 50px;" min="1" required>
            <select name="grade[]">
                <option value="4.0">A</option>
                <option value="3.0">B</option>
                <option value="2.0">C</option>
                <option value="1.0">D</option>
                <option value="0.0">F</option>
            </select>
            <button type="button" onclick="this.parentElement.remove()" style="color:red;">x</button>
        `;
        div.appendChild(newRow);
    }
</script>

</body>
</html>
