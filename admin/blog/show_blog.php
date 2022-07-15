<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action='' method='post'>
        <input type='hidden' name='postID' value='<?php echo $row['postID'];?>'>

        <p><label>Title</label><br />
        <input type='text' name='postTitle' value='<?php echo $row['postTitle'];?>'></p>

        <p><label>Description</label><br />
        <textarea name='postDesc' cols='60' rows='10'><?php echo $row['postDesc'];?></textarea></p>

        <p><label>Content</label><br />
        <textarea name='postCont' cols='60' rows='10'><?php echo $row['postCont'];?></textarea></p>

        <p><input type='submit' name='submit' value='Update'></p>

    </form>
    
</body>
</html>