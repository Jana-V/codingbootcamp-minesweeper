<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
</head>
<body>

    This is the document's body <?php echo $__view_file; ?>
    

    <?php foreach($articles as $article) : ?>

        <?php echo $article; ?>
    <?php endforeach; ?>

    <?php echo $text; ?>
    
    <?php echo $content; ?>
    
    <form action="">
        <input type="text" name="something" value="">

        <input type="submit" value="send">

    </form>

    <?php echo $content->render(); ?>
</body>
</html>