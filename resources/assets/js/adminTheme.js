require('./bootstrap');
require('./theme/theme');
// var $ = require('jquery');
require('dropify');
const ClassicEditor = require('@ckeditor/ckeditor5-build-classic');

import dt from 'datatables.net'

$(document).ready(function () {
    $('.dataTable').DataTable();
    $('.dropify').dropify();

});


ClassicEditor
    .create(document.querySelector('.ckEditor'), { removePlugins: ['Image', 'ImageCaption', 'ImageStyle', 'ImageTextAlternative', 'ImageToolbar', 'ImageUpload'], })
    .then(editor => {
        console.log('Editor was initialized', editor);

    })
    .catch(err => {
        console.error(err.stack);
    });