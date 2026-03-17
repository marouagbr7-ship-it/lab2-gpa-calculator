<php
if (SERVER['REQUEST_METHOD'] == 'POST' && isset(POST['c_name'])) {
    names = POST['c_name'];
    hours = POST['c_hours'];
    grades = POST['c_grade'];

    total_weighted_points = 0;
    total_hours = 0;
 
    for (i = 0; i < count(names); i++) {
        h = floatval(hours[i]);
        g = floatval(grades[i]);
        
        total_weighted_points += (g * h);
        total_hours += h;
    }

    
    final_gpa = (total_hours > 0)  (total_weighted_points / total_hours) : 0;

    
    alert_class = "";
    status_text = "";

    if (final_gpa >= 3.7) {
        alert_class = "alert-success";
        status_text = "Distinction (امتياز)";
    }
      elseif (final_gpa >= 3.0) {
        alert_class = "alert-info";
        status_text = "Merit (جيد جداً)";
    }
      elseif (final_gpa >= 2.0) {
        alert_class = "alert-warning";
        status_text = "Pass (مقبول)";
    } 
      else {
        alert_class = "alert-danger";
        status_text = "Fail (راسب)";
    }

    echo "<div class='alert alert_class border-2'>";
    echo "<h4 class='alert-heading'>النتيجة النهائية:</h4>";
    echo "<p class='mb-0'>المعدل التراكمي الإجمالي: <strong>" . number_format(final_gpa, 2) . "</strong></p>";
    echo "<p>التقدير العام: <strong>$status_text</strong></p>";
    echo "</div>";
}
>
