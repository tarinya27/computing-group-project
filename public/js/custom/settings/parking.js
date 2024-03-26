
(function ($) {
    "use strict";
    var parkingDatatableEl = null;
    var parkingDatatableCurrent = null;
    var parkingDatatableEnded = null;

    window.addEventListener('load', function () {
        if(!$(document).find('input[name=id').length){
            $(document).find('#place_id').trigger('change');
            $('#category_id').trigger('change');
        }
    });

    $('#category_id').change(function () {
        let categoryId = $('#category_id').val();

        if (typeof categoryId != 'undefined' && categoryId != null) {
            let url = route('parking.slot', { 'category_id': categoryId });
            url += typeof id != 'undefined' ? '?id=' + id : '';

            axios.get(url).then(function (response) {
                $('#slotSection').html(response.data);
            }).catch(function (error) {
                console.log(error);
            });
        }
    });

    $(document).ready(function () {

        parkingDatatableEl = $('#parkingDatatable').DataTable({
            dom: '<"row"<"col-12 col-sm-6"l><"col-12 col-sm-6"f>><"row"<"col-12 col-sm-12"t><"col-12 col-sm-6"i><"col-12 col-sm-6"p>>',
            lengthMenu: [[10, 50, 100, 200, -1], [10, 50, 100, 200, "All"]],
            buttons: [
            ],

            columns: [
                {
                    data: 'id', class: "no-sort", width: '50px', render: function (data, row, type, col) {
                        var pageInfo = parkingDatatableEl.page.info();
                        return (col.row + 1) + pageInfo.start;
                    }
                },
                {
                    name: 'barcode', data: "barcode", render: function (data, type, row) {
                        if (row.out_time == null) {
                            return '<a href="' + route('parking.barcode', { 'parking': row.id }) + '" class="font-weight-bold text-info">' + data + '</a>';
                        }
                        else {
                            return '<span>' + data + '</span>';
                        }
                    }
                },
                {
                    name: 'vehicle_no', data: "vehicle_no"
                },
                {
                    name: 'category', data: "category", render: function (data, type, row) {
                        return data.type;
                    }
                },
                {
                    name: 'in_time', data: "in_time"
                },
                {
                    name: 'out_time', data: "out_time"
                },
                {
                    name: 'amount', data: "amount"
                },
                {
                    name: 'slot.slot_name', data: "slot.slot_name", render: function (data, type, row) {
                        return typeof data != 'undefined' ? data : '';
                    }
                },
                {
                    data: 'id', class: 'text-end width-5-per', render: function (data, type, row, col) {
                        let deleteUrl = route('parking.destroy', data);
                        let $returnData = '';
                        if (row.out_time == null) {
                            $returnData += '<a href="' + route('parking.barcode', data) + '"><i class="fa fa-barcode text-info" aria-hidden="true" title="Print Barcode"></i></a> | ' +
                                '<a href="' + route('parking.end', data) + '"><i class="fa fa-car text-success" aria-hidden="true" title="End Parking"></i></a> | ' +
                                '<a href="' + route('parking.edit', data) + '"><i class="fa fa-pencil-square-o text-info" aria-hidden="true" title="Edit Parking"></i></a> | ';
                        }

                        $returnData += '<button class="btn btn-link p-0" onclick="deleteData(\'' + deleteUrl + '\')"><i class="fs-6 fa fa-trash-o text-danger" aria-hidden="true" title="Delete Parking"></i></button>';
                        return $returnData;
                    }
                },
            ],

            ajax: {
                url: route('parking.index'),
                dataSrc: "data"
            },

            language: {
                paginate: {
                    next: '&#8594;', // or '→'
                    previous: '&#8592;' // or '←'
                }
            },

            columnDefs: [{
                searchable: false,
                orderable: false,
                targets: [0, 3, 7, 8]
            }],

            responsive: true,
            autoWidth: false,
            serverSide: true,
            processing: true
        });

        //currently parking list
        parkingDatatableCurrent = $('#parkingDatatableCurrent').DataTable({
            dom: '<"row"<"col-12 col-sm-6"l><"col-12 col-sm-6"f>><"row"<"col-12 col-sm-12"t><"col-12 col-sm-6"i><"col-12 col-sm-6"p>>',
            lengthMenu: [[10, 50, 100, 200, -1], [10, 50, 100, 200, "All"]],
            buttons: [
            ],

            columns: [
                {
                    data: 'id', class: "no-sort", width: '50px', render: function (data, row, type, col) {
                        var pageInfo = parkingDatatableCurrent.page.info();
                        return (col.row + 1) + pageInfo.start;
                    }
                },
                {
                    name: 'barcode', data: "barcode", render: function (data, type, row) {
                        if (row.out_time == null) {
                            return '<a href="' + route('parking.barcode', { 'parking': row.id }) + '" class="font-weight-bold text-info">' + data + '</a>';
                        }
                        else {
                            return '<span>' + data + '</span>';
                        }
                    }
                },
                {
                    name: 'vehicle_no', data: "vehicle_no"
                },
                {
                    name: 'category', data: "category", render: function (data, type, row) {
                        return data.type;
                    }
                },
                {
                    name: 'in_time', data: "in_time"
                },
                {
                    name: 'slot.slot_name', data: "slot.slot_name", render: function (data, type, row) {
                        return typeof data != 'undefined' ? data : '';
                    }
                },
                {
                    data: 'id', class: 'text-end width-5-per', render: function (data, type, row, col) {
                        let deleteUrl = route('parking.destroy', data);
                        return '<a href="' + route('parking.barcode', data) + '"><i class="fa fa-barcode text-info" aria-hidden="true" title="Print Barcode"></i></a> | ' +
                            '<a href="' + route('parking.end', data) + '"><i class="fa fa-car text-success" aria-hidden="true" title="End Parking"></i></a> | ' +
                            '<a href="' + route('parking.edit', data) + '"><i class="fa fa-pencil-square-o text-info" aria-hidden="true" title="Edit Parking"></i></a> | ' +
                            '<button class="btn btn-link p-0" onclick="deleteData(\'' + deleteUrl + '\')"><i class="fs-6 fa fa-trash-o text-danger" aria-hidden="true" title="Delete Parking"></i></button>';
                    }
                },
            ],

            ajax: {
                url: route('parking.current_list'),
                dataSrc: "data"
            },

            language: {
                paginate: {
                    next: '&#8594;', // or '→'
                    previous: '&#8592;' // or '←'
                }
            },

            columnDefs: [{
                searchable: false,
                orderable: false,
                targets: [0, 3, 5, 6]
            }],

            responsive: true,
            autoWidth: false,
            serverSide: true,
            processing: true
        });

        //Ended parking list
        parkingDatatableEnded = $('#parkingDatatableEnded').DataTable({
            dom: '<"row"<"col-12 col-sm-6"l><"col-12 col-sm-6"f>><"row"<"col-12 col-sm-12"t><"col-12 col-sm-6"i><"col-12 col-sm-6"p>>',
            lengthMenu: [[10, 50, 100, 200, -1], [10, 50, 100, 200, "All"]],
            buttons: [
            ],

            columns: [
                {
                    data: 'id', class: "no-sort", width: '50px', render: function (data, row, type, col) {
                        var pageInfo = parkingDatatableEnded.page.info();
                        return (col.row + 1) + pageInfo.start;
                    }
                },
                {
                    name: 'barcode', data: "barcode", render: function (data, type, row) {
                        if (row.out_time == null) {
                            return '<a href="' + route('parking.barcode', { 'parking': row.id }) + '" class="font-weight-bold text-info">' + data + '</a>';
                        }
                        else {
                            return '<span>' + data + '</span>';
                        }
                    }
                },
                {
                    name: 'vehicle_no', data: "vehicle_no"
                },
                {
                    name: 'category', data: "category", render: function (data, type, row) {
                        return data.type;
                    }
                },
                {
                    name: 'in_time', data: "in_time"
                },
                {
                    name: 'out_time', data: "out_time"
                },
                {
                    name: 'amount', data: "amount"
                },
                {
                    name: 'slot.slot_name', data: "slot.slot_name", render: function (data, type, row) {
                        return typeof data != 'undefined' ? data : '';
                    }
                },
                {
                    data: 'id', class: 'text-end width-5-per', render: function (data, type, row, col) {
                        let deleteUrl = route('parking.destroy', data);
                        return '<button class="btn btn-link p-0" onclick="deleteData(\'' + deleteUrl + '\', \'#parkingDatatableEnded\')"><i class="fs-6 fa fa-trash-o text-danger" aria-hidden="true" title="Delete Parking"></i></button>';
                    }
                },
            ],

            ajax: {
                url: route('parking.ended_list'),
                dataSrc: "data"
            },

            language: {
                paginate: {
                    next: '&#8594;', // or '→'
                    previous: '&#8592;' // or '←'
                }
            },

            columnDefs: [{
                searchable: false,
                orderable: false,
                targets: [0, 3, 7, 8]
            }],

            responsive: true,
            autoWidth: false,
            serverSide: true,
            processing: true
        });

        $('#barcode').focus()
    });

    $(document).on('change', '#place_id', function(){
        let category = categories.filter(val => val.place_id == $(this).val());
        let html = '';
        $.each(category, function(ind,val){
            html += `<option value="${val.id}">${val.type}</option>`;
        });

        $(document).find('#category_id').html(html);

        $('#category_id').trigger('change');
    });

    $(document).on('click', '#frm-rfid', function(){
        if($('input[name=slot_id]:checked').length == 0){
            new swal("Error","Please select a slot","error");
            return false;
        }

        axios.get(route('parking_settings.rfid.scan')).then(res => {
            if(res.data.status == -1){
                new swal("Error","Please set RFID Device","error");
            }else if(res.data.status == 0){
                new swal("Error","No item found!","error");
            }else if(res.data.status == 1){
                $('#vehicle_no').val(res.data.entry.rfid_no);
            }else{
                new swal("Error","Some thing went wrong!","error");
            }
        })

    });

    $(document).on('click', '#rfid-checkout', function(){       

        axios.get(route('parking_settings.rfid.checkout')).then(res => {
            if(res.data.status == -1){
                new swal("Error","Please set RFID Device","error");
            }else if(res.data.status == 0){
                new swal("Error","No item found!","error");
            }else if(res.data.status == 1){
                window.open(route('parking.end', res.data.entry.parking_id),"_self");
            }else{
                new swal("Error","Some thing went wrong!","error");
            }
        })

    });

})(jQuery);