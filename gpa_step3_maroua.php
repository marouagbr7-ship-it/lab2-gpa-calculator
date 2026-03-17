<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>حساب المعدل الاحترافي - مروة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body { background-color: #f8f9fa; padding: 20px; }
        .card { box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <div class="container">
        <div class="card p-4">
            <h2 class="text-center mb-4 text-primary">حساب المعدل (Step 3)</h2>
            
            <form id="ajaxForm">
                <div id="courseRows">
                    <div class="row g-3 mb-3 course-row">
                        <div class="col-md-5">
                            <input type="text" name="c_name[]" class="form-control" placeholder="اسم المادة" required>
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="c_hours[]" class="form-control" placeholder="الساعات" required min="1">
                        </div>
                        <div class="col-md-3">
                            <select name="c_grade[]" class="form-select" required>
                                <option value="4.0">A / A+</option>
                                <option value="3.0">B</option>
                                <option value="2.0">C</option>
                                <option value="1.0">D</option>
                                <option value="0.0">F</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-danger remove-row">X</button>
                        </div>
                    </div>
                </div>

                <button type="button" id="addRow" class="btn btn-success mb-3">+ إضافة مادة أخرى</button>
                <hr>
                <button type="submit" class="btn btn-primary w-100">حساب المعدل الإجمالي</button>
            </form>

            <div id="responseArea" class="mt-4"></div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
    
            $('#addRow').click(function() {
                var newRow = $('.course-row:first').clone();
                newRow.find('input').val('');
                $('#courseRows').append(newRow);
            });
 
       
            $(document).on('click', '.remove-row', function() {
                if ($('.course-row').length > 1) {
                    $(this).closest('.row').remove();
                }
            });
          
            $('#ajaxForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'process_step3_maroua.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#responseArea').html(response);
                    }
                });
            });
        });
    </script>
</body>
</html>
