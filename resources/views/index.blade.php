<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panda Admin</title>
</head>
<body>
<div id="admin">
    <app routes="{{ json_encode($routes) }}"></app>
</div>
</body>
</html>