<?php
// include "../../include/sessionVerify/sessionVerify.php"; REQUEST SESSÃO

// sessionVerify(); ATIVAR SESSÃO / LOGOUT
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>W3B CALC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./src/css/home-conatinerValues.css">

</head>
<body>

<?php // include "../../include/sidebar/sidebar.php";   SIDEBAR / NAVBAR?>

    <div class="container mt-3">
        <ul class="list-group">

            <li class="list-group-item">
                <b>Exames</b>
                <div id="exams-section">
                    <div class="weight-field input-group mt-2">
                        <label for="exam1-weight" class="mr-2">Weight:</label>
                        <input type="number" id="exam1-weight" class="exam-weight form-control" min="0" max="6" placeholder="Weight of an exam">
                    </div>
                    <div class="note-exams-field input-group mt-2">
                        <label for="exam1" class="mr-2">Grade 1:</label>
                        <input type="number" id="exam1" class="exam-note form-control" min="0" max="10" placeholder="Weight of a exam">
                    </div>
                </div>
                <div class="mt-2" onclick="addExamField()" style="cursor: pointer;">
                    <i class="bi bi-plus-circle" style="font-size:20px"></i>
                    Add one more grade
                </div>
            </li>
    
            <li class="list-group-item">
                <b>Activities</b>
                <div id="activities-section">
                    <div class="weight-field input-group mt-2">
                        <label for="activities1-weight" class="mr-2">Weight</label>
                        <input type="number" id="activities-weight" class="activities-weight form-control" min="0" max="4" placeholder="Weight of an activity">
                    </div>
                    <div class="note-activities-field input-group mt-2">
                        <label for="activities" class="mr-2">Grade 1:</label>
                        <input type="number" id="activities1" class="activities-note form-control" min="0" max="10" placeholder="Grade of a activity">
                    </div>
                </div>
                <div class="mt-2" onclick="addActivitiesField()" style="cursor: pointer;">
                    <i class="bi bi-plus-circle" style="font-size:20px"></i>
                    Add one more grade
                </div>
            </li>

            <li class="list-group-item">
                <b>Projects</b>
                <div id="projects-section">
                    <div class="weight-field input-group mt-2">
                        <label for="projects1-weight" class="mr-2">Weight</label>
                        <input type="number" id="projects-weight" class="projects-weight form-control" min="0" max="4" placeholder="Weight of a project">
                    </div>
                    <div class="note-projects-field input-group mt-2">
                        <label for="projects" class="mr-2">Grade 1:</label>
                        <input type="number" id="projects1" class="projects-note form-control" min="0" max="10" placeholder="Grade of a project">
                    </div>
                </div>
                <div class="mt-2" onclick="addProjectsField()" style="cursor: pointer;">
                    <i class="bi bi-plus-circle" style="font-size:20px"></i>
                    Add one more grade
                </div>
            </li>
    
        </ul>
    </div>

    <script src="./src/js/home-containerInsert.js"></script>

</body>
</html>