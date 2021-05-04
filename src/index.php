<?php


$postmodel = new Post();
$result =$postmodel->index();
$posts = $result;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach($posts as $post):?>
    <div>
        <h1><?php echo $post["title"];?></h1>
    </div>
    <div>
        <p><?php echo $post["body"];?></p>
    </div>
    <?php endforeach; ?>
</body>
</html>