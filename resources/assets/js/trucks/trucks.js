'use strict';

let tableName = '#trucksTable';
$(tableName).DataTable({
    scrollX: true,
    deferRender: true,
    scroller: true,
    processing: true,
    serverSide: true,
    'order': [[0, 'asc']],
    ajax: {
        url: recordsURL,
    },
    columnDefs: [
        {
            'targets': [6],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
        },
    ],
    columns: [
        {
            data: 'Payload',
            name: 'Payload'
        },{
            data: 'cargobox',
            name: 'cargobox'
        },{
            data: 'type',
            name: 'type'
        },{
            data: 'driver',
            name: 'driver'
        },{
            data: 'vehicle_number',
            name: 'vehicle_number'
        },{
            data: 'images',
            name: 'images'
        },
        {
            data: function (row) {
                let url = recordsURL + row.id;
                let data = [
                {
                    'id': row.id,
                    'url': url + '/edit',
                }];
                                
                return prepareTemplateRender('#trucksTemplate',
                    data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let recordId = $(event.currentTarget).data('id');
    deleteItem(recordsURL + recordId, tableName, 'Truck');
});
