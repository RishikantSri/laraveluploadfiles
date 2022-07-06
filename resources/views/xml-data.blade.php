<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>XML File upload</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/pricing/">

    <!-- Bootstrap core CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        #frm-create-post label.error{
            color:red;
        }
    </style>
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


    <div class="container" style="margin-top: 50px;">
        <h4 style="text-align: center;">Employee Data: Upload And Save XML file to DB </h4>

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif

        <form action="{{ route('xml-upload') }}" id="frm-create-course" method="post" enctype="multipart/form-data">
           @csrf
            <div class="form-group">
                <label for="file">Select XML File:</label>
                <input type="file" class="form-control" required id="file" name="file">
            </div>

            <button type="submit" class="btn btn-primary" id="submit-post">Submit</button>
        </form>
    </div>
</body>

</html>
