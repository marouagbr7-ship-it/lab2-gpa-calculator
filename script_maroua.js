function addCourseRow() {
    const container = document.getElementById('course-container');
    const newRow = document.createElement('div');
    newRow.className = 'course-row';
    newRow.innerHTML = `
        <input type="text" name="course[]" placeholder="Course Name" required>
        <input type="number" name="credits[]" placeholder="Credits" min="1" required>
        <select name="grade[]">
            <option value="4.0">A</option>
            <option value="3.0">B</option>
            <option value="2.0">C</option>
            <option value="1.0">D</option>
            <option value="0.0">F</option>
        </select>
        <button type="button" onclick="this.parentElement.remove()">x</button>
    `;
    container.appendChild(newRow);
}

function validateForm() {
    const credits = document.getElementsByName('credits[]');
    for (let i = 0; i < credits.length; i++) {
        if (credits[i].value <= 0) {
            alert("Credits must be a positive number!");
            return false;
        }
    }
    return true;
}
