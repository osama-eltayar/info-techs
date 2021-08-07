window.$ = window.jQuery = require('jquery')
require('jquery-validation')

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
