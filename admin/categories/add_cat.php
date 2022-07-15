<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <title>Document</title>
<style>
    form{
        padding: 50px;
    }
    label{
        font-size: larger;
        font-weight: 700;
    }

</style>


</head>

<body>
    <form action='add_cat_php.php' method='post'>

        <p><label>Title</label><br />
            <input type='text' name='title' value=''>
        </p>

        <p><label>Category</label><br />
            <textarea name='category' cols='60' rows='10'></textarea>
        </p>

        <p><label>Image</label><br />
            <textarea name='image' cols='60' rows='3'></textarea>
        </p>

        <p><input type='submit' name='submit' value='submit'></p>
    </form>
</body>

</html>