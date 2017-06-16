<! -- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang='jp'>
  <head>
    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <title>Book List</title>
  </head>

  <body>
    <div class='container'>
      <nav class='navbar navbar-default'>
      <!-- ナビバーの内容 -->
      </nav>
      
      @yield('content')
    </div>
  </body>
</html>
