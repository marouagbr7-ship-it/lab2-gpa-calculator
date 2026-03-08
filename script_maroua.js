document.getElementById('calcForm').addEventListener('submit', function(e) {
    const hours = document.querySelector('input[name="c_hours"]').value;
    if (hours < 1) {
        alert("عذرا يجب ان يكون عدد الساعات رقما موجبا اي اكبر من 0");
        e.preventDefault();
    }
});
