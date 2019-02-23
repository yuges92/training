require('./bootstrap');
require('./theme/theme');
import dt from 'datatables.net';

$(document).ready(function() {
    $('.dataTable').DataTable();
});