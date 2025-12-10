// Call the dataTables jQuery plugin
$(document).ready(function () {
    $("#dataTable").DataTable();
});
$(document).ready(function () {
    $("#dataTableRetur").DataTable({
        order: [[0, "desc"]],
    });
});
