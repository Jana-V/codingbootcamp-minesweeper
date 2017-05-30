<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo \codingbootcamp\tinymvc\config::get('app.name', ''); ?></title>
</head>
<body>

    <?php echo isset($navigation)?$navigation:''; ?>

    <?php echo $content; ?>
    This is the body of the document.

    <form action="">
        <input type="submit" value="submit">
    </form>

</body>
</html>