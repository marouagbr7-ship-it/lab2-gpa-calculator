<!DOCTYPE html>
<html>
<head>
    <title>GPA Calculator AJAX - Maroua</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body { margin: 30px; background-color: #f8f9fa; }
        .main-card { background: white; padding: 20px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        #result { margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="container main-card">
    <h3>GPA Calculator (AJAX Mode)</h3>
    <hr>
    
    <div id="result"></div>

    <form id="gpaForm">
        <div id="course-list">
            <div class="course-row form-row mb-2">
                <div class="col-md-6">
                    <input type="text" name="course[]" class="form-control" placeholder="Course Name" required>
                </div>
                <div class="col-md-3">
                    <input type="number" name="credits[]" class="form-control" placeholder="Credits" min="1" required>
                </div>
                <div class="col-md-3">
                    <select name="grade[]" class="form-control">
                        <option value="4.0">A</option>
                        <option value="3.0">B</option>
                        <option value="2.0">C</option>
                        <option value="1.0">D</option>
                        <option value="0.0">F</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <button type="button" id="addBtn" class="btn btn-sm btn-secondary">+ Add Course</button>
            <button type="submit" class="btn btn-primary">Calculate GPA</button>
        </div>
    </form>
</div>

<script>
$(document).ready(function() {
    
    $('#addBtn').click(function() {
        var row = $('.course-row').first().clone();
        row.find('input').val('');
        $('#course-list').append(row);
    });

    $('#gpaForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: 'calculate_ajax_maroua.php',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#result').html(
                        '<div class="alert alert-info">Result: <b>' + response.gpa + '</b></div>' + 
                        response.table
                    );
                }
            }
        });
    });
});
</script>

</body>
</html>
