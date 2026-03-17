<!DOCTYPE html>
<html>
<head>
    <title>GPA Homework - Maroua</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body { margin: 30px; background-color: #f4f7f6; }
        .hw-container { background: white; padding: 25px; border-radius: 10px; border-top: 5px solid #28a745; }
        .progress { height: 30px; display: none; margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="container hw-container">
    <h2>GPA Calculator - Homework</h2>
    <p class="text-muted">Final Project Version</p>

    <div id="status-area">
        <div class="progress">
            <div id="gpa-bar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"></div>
        </div>
        <div id="final-result"></div>
    </div>

    <form id="hwForm">
        <div id="course-rows">
            <div class="course-item form-row mb-3">
                <div class="col-6">
                    <input type="text" name="course[]" class="form-control" placeholder="Module Name" required>
                </div>
                <div class="col-3">
                    <input type="number" name="credits[]" class="form-control" placeholder="Credits" min="1" required>
                </div>
                <div class="col-3">
                    <select name="grade[]" class="form-control">
                        <option value="4.0">A (4.0)</option>
                        <option value="3.0">B (3.0)</option>
                        <option value="2.0">C (2.0)</option>
                        <option value="1.0">D (1.0)</option>
                        <option value="0.0">F (0.0)</option>
                    </select>
                </div>
            </div>
        </div>
        
        <button type="button" id="addRowBtn" class="btn btn-outline-secondary btn-sm">+ New Module</button>
        <hr>
        <button type="submit" class="btn btn-success btn-block">Submit & Calculate</button>
    </form>
</div>

<script>
$(document).ready(function() {
    $('#addRowBtn').click(function() {
        var newRow = $('.course-item').first().clone();
        newRow.find('input').val('');
        $('#course-rows').append(newRow);
    });

    $('#hwForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: 'calculate_hw_maroua.php',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(data) {
                if(data.success) {
                    $('.progress').show();
                   
                    var percent = (data.gpa / 4) * 100;
                    $('#gpa-bar').css('width', percent + '%').text(data.gpa);
                    
                    if(data.gpa >= 3) $('#gpa-bar').addClass('bg-success').removeClass('bg-warning bg-danger');
                    else if(data.gpa >= 2) $('#gpa-bar').addClass('bg-warning').removeClass('bg-success bg-danger');
                    else $('#gpa-bar').addClass('bg-danger').removeClass('bg-success bg-warning');

                    $('#final-result').html('<div class="alert alert-dark mt-2">Final Score: ' + data.gpa + '</div>' + data.details);
                }
            }
        });
    });
});
</script>

</body>
</html>
