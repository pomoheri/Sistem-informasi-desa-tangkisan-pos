$(function () {
	"use strict";

    $('#example1').DataTable();

    $('#example2').DataTable({
        "ajax": './assets/data/json/datatables.json'
    });

});