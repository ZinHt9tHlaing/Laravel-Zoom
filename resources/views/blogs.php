<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
</head>

<body>


    <div class="container">
        <h1>My Awesome Blogs Website</h1>

        <?php foreach ($blogs as $blog) : ?>
            <?= $blog; ?>
        <?php endforeach; ?>


    </div>


</body>

</html>
