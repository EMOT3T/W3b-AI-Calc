function addExamField() {
    let examsSection = document.getElementById("exams-section");
    let existingFieldsCount = examsSection.querySelectorAll(".note-exams-field").length;

    if (existingFieldsCount < 3) {
        let newNoteField = document.createElement("div");
        newNoteField.classList.add("note-exams-field", "input-group", "mt-2");
        newNoteField.innerHTML = `
            <label for="exam${existingFieldsCount + 1}" class="mr-2">Grade ${existingFieldsCount + 1}:</label>
            <input type="number" id="exam${existingFieldsCount + 1}" class="exam-note form-control" min="0" max="10" placeholder="Weight of a exam">
        `;
        examsSection.appendChild(newNoteField);
    } else {
        alert("Maximum limit of exam grades reached.");
    }
}

function addActivitiesField() {
    let activitiesSection = document.getElementById("activities-section");
    let existingFieldsCount = activitiesSection.querySelectorAll(".note-activities-field").length;

    if (existingFieldsCount < 10) {
        let newNoteField = document.createElement("div");
        newNoteField.classList.add("note-activities-field", "input-group", "mt-2");
        newNoteField.innerHTML = `
            <label for="activities${existingFieldsCount + 1}" class="mr-2">Grade ${existingFieldsCount + 1}:</label>
            <input type="number" id="activities${existingFieldsCount + 1}" class="activities-note form-control" min="0" max="10" placeholder="Weight of a activities">
        `;
        activitiesSection.appendChild(newNoteField);
    } else {
        alert("Maximum limit of activity grades reached.");
    }
}

function addProjectsField() {
    let projectsSection = document.getElementById("projects-section");
    let existingFieldsCount = projectsSection.querySelectorAll(".note-projects-field").length;

    if (existingFieldsCount < 7) {
        let newNoteField = document.createElement("div");
        newNoteField.classList.add("note-projects-field", "input-group", "mt-2");
        newNoteField.innerHTML = `
            <label for="projects${existingFieldsCount + 1}" class="mr-2">Grade ${existingFieldsCount + 1}:</label>
            <input type="number" id="projects${existingFieldsCount + 1}" class="projects-note form-control" min="0" max="10" placeholder="Weight of a projects">
        `;
        projectsSection.appendChild(newNoteField);
    } else {
        alert("Maximum limit of project grades reached.");
    }
}