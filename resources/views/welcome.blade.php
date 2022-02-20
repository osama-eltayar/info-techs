<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Dashboard</title>
    <link rel="icon" href="{{asset('/admin/assets/img/fav.png')}}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('admin/assets/css/font-awsome-all.css')}}"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('admin/assets/css/styles.css')}}"/>
    <link rel="stylesheet" href="/css/vendor/toastr.min.css">
    <script src="{{asset('/js/app.js')}}" defer></script>
</head>
<body>
    <div id="app">
        <event-form></event-form>
    </div>
    <script src="/admin/assets/js/vendor/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="/admin/assets/js/vendor/datepicker.js"></script>
    <script src="/admin/assets/js/vendor/scripts.js"></script>
    <script src="/admin/assets/js/vendor/jquery-clockpicker.js"></script>
    <script>
        $('[data-toggle="datepicker"]').datepicker();

        $('.clockpicker').clockpicker({
            placement: 'top',
            align: 'left',
            donetext: 'Done'
        });

        (function() {
            $(document).on('click', '#list1 .add-new', function(e) {
                var clone, examsList;
                e.preventDefault();
                examsList = $('#list1');
                clone = examsList.children('.input-group:first').clone(true);
                clone.append($('<button>').addClass('remove').html(`<i class="fa-solid fa-trash-can"></i>`));

                clone.find('input').val('').attr('id', function() {
                    return $(this).attr('id') + '_' + (examsList.children('.input-group').length + 1);
                });
                return examsList.append(clone);
            });

            $(document).on('click', '#list2 .add-new', function(e) {
                var clone, examsList;
                e.preventDefault();
                examsList = $('#list2');
                clone = examsList.children('.input-group:first').clone(true);
                clone.append($('<button>').addClass('remove').html(`<i class="fa-solid fa-trash-can"></i>`));

                clone.find('input').val('').attr('id', function() {
                    return $(this).attr('id') + '_' + (examsList.children('.input-group').length + 1);
                });
                return examsList.append(clone);
            });

            //remove rows when remove button is clicked
            $(document).on('click', '.remove', function(e) {
                e.preventDefault();
                return $(this).parent().remove();
            });

        }).call(this);

        // Upload file
        $(document).ready(function() {
            $(document).on('change', '.custom-file-input',function(event){
                var files = event.target.files;
                console.log(files);
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    $(this).next('.custom-file-label').addClass("selected").html(file.name);
                }
            });
        });
    </script>
</body>
</html>
