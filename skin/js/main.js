$(document).ready(function() {
    $("#projects-table td:contains('active')").addClass("project-active");
    $("#projects-table td:contains('inprocessing')").addClass("project-inprocessing");
    $("#tasks-table td:contains('active')").addClass("task-active");
});
