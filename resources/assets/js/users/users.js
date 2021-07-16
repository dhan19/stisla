'use strict';

let tableName = '#usersTable';
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
            data: 'name',
            name: 'name'
        },{
            data: 'email',
            name: 'email'
        },{
            data: 'password',
            name: 'password'
        },{
            data: 'phone',
            name: 'phone'
        },{
            data: 'gender',
            name: 'gender'
        },{
            data: 'status',
            name: 'status'
        },
        {
            data: function (row) {
                let url = recordsURL + row.id;
                let data = [
                {
                    'id': row.id,
                    'url': url + '/edit',
                }];
                                
                return prepareTemplateRender('#usersTemplate',
                    data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let recordId = $(event.currentTarget).data('id');
    deleteItem(recordsURL + recordId, tableName, 'users');
});
