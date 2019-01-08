$(document).ready(function() {
    $("#tasks-table td:contains('Angelegt')").addClass("project-active");
    $("#tasks-table td:contains('In Bearbeitung')").addClass("project-inprocessing");
    $("#tasks-table td:contains('Warten')").addClass("task-active");
    $("#tasks-table td:contains('Abgeschlossen')").addClass("task-active");
    $("#tasks-table td:contains('Eingestellt')").addClass("task-active");
});

$(document).ready(function() {
    $("#projects-table td:contains('Angelegt')").addClass("project-active");
    $("#projects-table td:contains('In Bearbeitung')").addClass("project-inprocessing");
    $("#projects-table td:contains('Warten')").addClass("task-active");
    $("#projects-table td:contains('Abgeschlossen')").addClass("task-active");
    $("#projects-table td:contains('Eingestellt')").addClass("task-active");
});
