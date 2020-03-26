<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        {{ get_title() }}
        {{ stylesheet_link('css/bootstrap.min.css') }}
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Time ">
        <meta name="author" content="Phalcon Team">
    </head>
    <body>
        {{ content() }}
    </body>
</html>