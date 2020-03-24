<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <?= $this->tag->getTitle() ?>
        <?= $this->tag->stylesheetLink('css/bootstrap.min.css') ?>
        <?= $this->tag->stylesheetLink('css/style.css') ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Time ">
        <meta name="author" content="Phalcon Team">
    </head>
    <body>
        <?= $this->getContent() ?>
    </body>
</html>