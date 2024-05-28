let data_table;
let data_table_is_initialized = false;

const data_table_option={
    //scrollX: "2000px",
    lengthMenu: [5, 10, 15, 20, 100, 200, 500],
    columnDefs: [
        { className: "centered", targets: [0, 1, 2, 3, 4, 5, 6] },
        { orderable: false, targets: [5, 6] },
        { searchable: false, targets: [1] }
        //{ width: "50%", targets: [0] }
    ],
    pageLength: 3,
    destroy: true,
    language: {
        lengthMenu: "Mostrar _MENU_ registros por página",
        zeroRecords: "Ningún usuario encontrado",
        info: "Mostrando de _START_ a _END_ de un total de _TOTAL_ registros",
        infoEmpty: "Ningún usuario encontrado",
        infoFiltered: "(filtrados desde _MAX_ registros totales)",
        search: "Buscar:",
        loadingRecords: "Cargando...",
        paginate: {
            first: "Primero",
            last: "Último",
            next: "Siguiente",
            previous: "Anterior"
        }
    }
};



const init_data_table = async () => {
    if (data_table_is_initialized) {
        data_table.destroy();
    }

    await listUsers();

    data_table = $("#datatable_historico").data_table(data_table_option);

    data_table_is_initialized = true;
};

const listUsers = async () => {
    try {
        const response = await fetch("../controlador/consulta_historico.php");
        const historicos_beneficios = await response.json();

        let content = ``;
        historicos_beneficios.forEach((historico, index) => {
            content += `
            <tr>
                <td>${historico.jefe_familia}</td>
                <td>${historico.grupo_familiar}</td>
                <td>${historico.manzana}</td>
                <td>${historico.casa}</td>
                <td>${historico.beneficio}</td>
                <td>${historico.fecha}</td>
                <td>${historico.descripcion}</td>
                <td>${historico.observacion}</td>
                <td>${historico.status}</td>
                <td><i class="fa-solid fa-check" style="color: green;"></i></td>
                    <td>
                        <button class="btn btn-sm btn-primary"><i class="fa-solid fa-pencil"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                    </td>
            </tr>
            `;
        });
        document.getElementById("tbody_historico").innerHTML = content;
    } catch (ex) {
        alert("Error: " + ex.message);
    }
};

window.addEventListener("DOMContentLoaded", async () => {
    await init_data_table();
});
