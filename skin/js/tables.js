$(function() {
    $("#tasks-table td:contains('Angelegt')").addClass("task-active");
    $("#tasks-table td:contains('In Bearbeitung')").addClass("task-inprocessing");
    $("#tasks-table td:contains('Warten')").addClass("task-active");
    $("#tasks-table td:contains('Abgeschlossen')").addClass("task-done");
    $("#tasks-table td:contains('Eingestellt')").addClass("task-suspend");
    $("#tasks-table td:contains('Nicht festgelegt')").addClass("in-planning");

    $("#tasks-table td:contains('Niedrig')").addClass("not-important");
    $("#tasks-table td:contains('In Plannung')").addClass("in-planning");
    $("#tasks-table td:contains('Sehr Hoch')").addClass("very-important");

    $("#projects-table td:contains('Angelegt')").addClass("project-active");
    $("#projects-table td:contains('In Bearbeitung')").addClass("project-inprocessing");
    $("#projects-table td:contains('Warten')").addClass("task-active");
    $("#projects-table td:contains('Abgeschlossen')").addClass("task-active");
    $("#projects-table td:contains('Eingestellt')").addClass("task-suspend");

    $("#projects-table td:contains('Niedrig')").addClass("not-important");
    $("#projects-table td:contains('In Plannung')").addClass("in-planning");
    $("#projects-table td:contains('Sehr Hoch')").addClass("very-important");

    $(".clickable-row").click(function() {
        var href = $(this).data("href");

        if(href) {
            window.location = href;
        }
    });
});
