let table = new DataTable("#myTable", {
    responsive: true,
    columnDefs: [
        { targets: [0, 1, 2, 3], searchable: true }
    ]
});

let table_detail_order = new DataTable("#table_detail_order", {
    paging: false, // Deshabilita la paginación
    info: false,   // Deshabilita la información de la paginación
    searching: false, // Deshabilita la búsqueda
    lengthChange: false // Deshabilita la opción de mostrar una cantidad personalizada de elementos por página
});
