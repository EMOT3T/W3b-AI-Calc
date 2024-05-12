function saveData() {
    // Obter o ID do usuário - você pode obter isso de alguma forma, talvez de uma variável global ou de um campo oculto no formulário
    const userId = "id"; // Substitua "id" pelo ID do usuário real

    // Estrutura de dados para armazenar as informações do usuário e das disciplinas
    let data = [
        {
            userid: userId,
            subjects: []
        }
    ];

    // Função para salvar os dados de uma disciplina
    const saveSubjectData = (name, exams, activities, projects) => {
        const subjectData = {
            name: name,
            exams: exams,
            activities: activities,
            projects: projects,
            weighted_average: {
                exams: 0, // Calculado posteriormente
                activities: 0, // Calculado posteriormente
                projects: 0 // Calculado posteriormente
            }
        };

        data[0].subjects.push(subjectData);
    };

    // Iterar sobre todos os campos de entrada relevantes no formulário
    document.querySelectorAll('.list-group-item').forEach(item => {
        const subjectName = item.querySelector('b[contenteditable="true"]').innerText;

        const examsGrades = [];
        const examsWeights = [];
        item.querySelectorAll('.exam-note').forEach(note => {
            examsGrades.push(note.value);
        });
        item.querySelectorAll('.exam-weight').forEach(weight => {
            examsWeights.push(weight.value);
        });

        const activitiesGrades = [];
        const activitiesWeights = [];
        item.querySelectorAll('.activities-note').forEach(note => {
            activitiesGrades.push(note.value);
        });
        item.querySelectorAll('.activities-weight').forEach(weight => {
            activitiesWeights.push(weight.value);
        });

        const projectsGrades = [];
        const projectsWeights = [];
        item.querySelectorAll('.projects-note').forEach(note => {
            projectsGrades.push(note.value);
        });
        item.querySelectorAll('.projects-weight').forEach(weight => {
            projectsWeights.push(weight.value);
        });

        // Salvar os dados da disciplina
        saveSubjectData(subjectName, { grades: examsGrades, weight: examsWeights }, { grades: activitiesGrades, weight: activitiesWeights }, { grades: projectsGrades, weight: projectsWeights });
    });

    console.log(data); // Exibir a estrutura de dados no console para verificar se os dados foram salvos corretamente
}
