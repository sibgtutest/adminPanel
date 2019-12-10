<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="jumbotron">
  <img src="http://lfsibgu.ru/images/logo_symbol_text.png" alt="logo">
  <div class="btn-group">
  <a href="#" class="btn btn-primary btn-lg">Apple</a>
  <a href="#" class="btn btn-primary btn-lg">Samsung</a>
  <a href="#" class="btn btn-primary btn-lg">Sony</a>
</div>  
   </div>
<div class="container">  
<div class="row">
  <div class="col-sm-2">
  <div class="btn-group-vertical">
  <button type="button" class="btn btn-primary">Apple</button>
  <button type="button" class="btn btn-primary">Сведения об </br>образовательной </br>организации</button>
  <button type="button" class="btn btn-primary">Sony</button>
</div> 
  </div>
  <div class="col-sm-8"><?= $content ?></div>
  <div class="col-sm-2"></div>
</div>

</div>


</body>
</html>
