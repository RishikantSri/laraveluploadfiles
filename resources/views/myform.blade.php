<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Create Employee</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/pricing/">

    <!-- Bootstrap core CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- <link href="../../dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- Custom styles for this template -->
    {{-- <link href="pricing.css" rel="stylesheet"> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
</head>

<body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <h5 class="my-0 mr-md-auto font-weight-normal"> <a class="p-2 text-dark" href={{ route('home')}}>IGT APPS</a></h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href={{ route('my.form')}}>Create Employee</a>
            <a class="p-2 text-dark" href={{ route('xml-upload')}}>Upload XML Data</a>
            <a class="p-2 text-dark" href={{ route('currency')}}>Multi Currency</a>
            <a class="p-2 text-dark" href={{ route('lang_home')}}>Multi Language</a>
            <a class="p-2 text-dark" href={{ route('importExportView')}}>Import/Export Excel</a>
        </nav>

    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">IGT APPS</h1>
        <p class="lead"></p>
    </div>
    <div class="container">
        <h2>Enter Employee Details</h2>

        <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
        </div>

        <form>
            {{ csrf_field() }}
            <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label>First Name:</label>
                    <input type="text" name="first_name" class="form-control" placeholder="First Name">
                </div>

                <div class="form-group">
                    <label>Last Name:</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                </div>
            </div>
                <div class="col-md-6">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>

                <div class="form-group">
                    <strong>Address:</strong>
                    <textarea class="form-control" name="address" placeholder="Address"></textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-success btn-submit">Submit</button>
                </div>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-submit").click(function(e) {
                e.preventDefault();

                var _token = $("input[name='_token']").val();
                var first_name = $("input[name='first_name']").val();
                var last_name = $("input[name='last_name']").val();
                var email = $("input[name='email']").val();
                var address = $("textarea[name='address']").val();

                $.ajax({
                    url: "{{ route('my.form') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        first_name: first_name,
                        last_name: last_name,
                        email: email,
                        address: address
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            alert(data.success);
                        } else {
                            printErrorMsg(data.error);
                        }
                    }
                });

            });

            function printErrorMsg(msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $.each(msg, function(key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }
        });
    </script>


</body>

</html>