function addExamField() {
    let examsSection = document.getElementById("exams-section");
    let existingFieldsCount = examsSection.querySelectorAll(".input-group").length;

    if (existingFieldsCount < 3) {
        let newNoteField = document.createElement("div");
        newNoteField.classList.add("input-group", "mt-2");
        newNoteField.innerHTML = `
            <label for="exam${existingFieldsCount + 1}" class="mr-2">Grade ${existingFieldsCount + 1}:</label>
            <input type="float" id="exam${existingFieldsCount + 1}" class="exam-note form-control" min="0" max="10" placeholder="Grade of an exam">
            <input type="float" id="exam${existingFieldsCount + 1}-weight" class="exam-weight form-control" min="0" max="10" placeholder="Weight of an exam">
        `;
        examsSection.appendChild(newNoteField);
    } else {
        alert("Maximum limit of exam grades reached.");
    }
}

function addActivitiesField() {
    let activitiesSection = document.getElementById("activities-section");
    let existingFieldsCount = activitiesSection.querySelectorAll(".input-group").length;

    if (existingFieldsCount < 10) {
        let newNoteField = document.createElement("div");
        newNoteField.classList.add("input-group", "mt-2");
        newNoteField.innerHTML = `
            <label for="activities${existingFieldsCount + 1}" class="mr-2">Grade ${existingFieldsCount + 1}:</label>
            <input type="float" id="activities${existingFieldsCount + 1}" class="activities-note form-control" min="0" max="10" placeholder="Grade of an activity">
            <input type="float" id="activities${existingFieldsCount + 1}-weight" class="activities-weight form-control" min="0" max="10" placeholder="Weight of an activity">
        `;
        activitiesSection.appendChild(newNoteField);
    } else {
        alert("Maximum limit of activity grades reached.");
    }
}

function addProjectsField() {
    let projectsSection = document.getElementById("projects-section");
    let existingFieldsCount = projectsSection.querySelectorAll(".input-group").length;

    if (existingFieldsCount < 7) {
        let newNoteField = document.createElement("div");
        newNoteField.classList.add("input-group", "mt-2");
        newNoteField.innerHTML = `
            <label for="projects${existingFieldsCount + 1}" class="mr-2">Grade ${existingFieldsCount + 1}:</label>
            <input type="float" id="projects${existingFieldsCount + 1}" class="projects-note form-control" min="0" max="10" placeholder="Grade of a project">
            <input type="float" id="projects${existingFieldsCount + 1}-weight" class="projects-weight form-control" min="0" max="10" placeholder="Weight of a project">
        `;
        projectsSection.appendChild(newNoteField);
    } else {
        alert("Maximum limit of project grades reached.");
    }
}