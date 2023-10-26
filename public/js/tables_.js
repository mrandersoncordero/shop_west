let table = new DataTable("#myTable", {
    responsive: true,
    columnDefs: [
        { targets: [0, 1, 2, 3], searchable: true }
    ]
});
