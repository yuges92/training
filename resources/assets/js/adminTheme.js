require('./bootstrap');
require('./theme/theme');
// var $ = require('jquery');
require('dropify');
require('select2');
require('./plugins/summernote/dist/summernote-bs4.min')
// const ClassicEditor = require('@ckeditor/ckeditor5-build-classic');

import dt from 'datatables.net'

$(document).ready(function () {
    $('.dataTable').DataTable();
    $('.dropify').dropify();

});


