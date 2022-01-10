<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <div class=" container">
    <form method="POST" action="/user/update/<?php echo $data['id']; ?>">
    <div class="form-group">
            <label for="first_name">ID</label>
            <input type="text" name="id" readonly id="id" value="<?php echo $data['id'] ?>" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="first_name">First name</label>
            <input type="text" name="first_name" id="first_name" value="<?php echo $data['first_name'] ?>" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="last_name">Last name</label>
            <input type="text" name="last_name" id="last_name" value="<?php echo $data['last_name'] ?>" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-primary" onclick="history.go(-1)">Back</button>
    </form>
    </div>
</body>
</html>