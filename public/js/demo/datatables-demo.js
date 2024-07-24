$(document).ready(function () {
    $("#dataTable").DataTable({
        paging: true,
        lengthMenu: [20, 50, 100],
        pageLength: 20,
        ordering: true,
        order: [[1, "asc"]], // Example: Sort by the second column in ascending order
    });
});
