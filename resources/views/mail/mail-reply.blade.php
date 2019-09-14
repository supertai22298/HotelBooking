<!doctype html>
<html lang="en">
  <head>
    <title>{{ $data['subject'] }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin_page_asset/css/lib/bootstrap.min.css') }}">
  </head>
  <body>
      <div class="container">
          <div class="card text-left">
            <div class="card-body">
              <h4 class="card-title">{{ $data['subject'] }}</h4>
              <p class="card-text"> {!! $data['description'] !!}</p>
            </div>
          </div>
         
      </div>
  </body>
</html>