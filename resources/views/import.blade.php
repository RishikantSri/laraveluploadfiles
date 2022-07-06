<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Import Employee Excel</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/pricing/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
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
    <div class="card bg-light mt-3">
        <div class="card-header">
            Employee: Import/Export Excel to database
        </div>
        <div class="card-body">

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif


            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import Employee Data</button>
                <a class="btn btn-warning" href="{{ route('export') }}">Export Employee Data</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
