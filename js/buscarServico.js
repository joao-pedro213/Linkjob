$(document).ready(() => {

  /* criando os filtros de busca específicos */

  function searchByColumn(table) {

    $(document).on('keyup change', '#search-by-category', function () {

      table.search('')
        .columns()
        .search('')
        .draw();

      table.column(1)
        .search(this.value)
        .draw();

    });

    $(document).on('keyup change', '#search-by-service', function () {

      table.search('')
        .columns()
        .search('')
        .draw();

      table.column(2)
        .search(this.value)
        .draw();

    });

    $(document).on('keyup change', '#search-by-state', function () {

      table.search('')
        .columns()
        .search('')
        .draw();

      table.column(3)
        .search(this.value)
        .draw();

    });

    $(document).on('keyup change', '#search-by-city', function () {

      table.search('')
        .columns()
        .search('')
        .draw();

      table.column(4)
        .search(this.value)
        .draw();

    });

  }

  const table = $('#mydatatable').DataTable({

    /* configurando as propriedades do DataTables */

    "lengthChange": false,

    "language": {

      "lengthMenu": "Mostrando _MENU_ Resgistros por página",
      "zeroRecords": "Nada encontrado - Desculpe",
      "info": "Mostrando página _PAGE_ de _PAGES_",
      "infoEmpty": "Nenhum registro disponível",
      "infoFiltered": "(filtrados de _MAX_ registros no total)",
      "sSearch": "Pesquisar",
      "paginate": {

        "previous": "Anterior",
        "next": "Próximo"

      }
    }

  });

  searchByColumn(table);

});