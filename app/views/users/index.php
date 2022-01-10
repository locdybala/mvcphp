<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h2 class="text-center">
            Manager User
        </h2>
        <table class="table">
            <a href="/user/create">Them</a>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>FirstName</th>
                    <th>Last Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php 
            if (count($data) > 0):
                foreach($data as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['first_name']; ?></td>
                        <td><?php echo $user['last_name']; ?></td>
                        <td>
                            <a href="/user/edit/<?php echo $user['id'] ?>">Edit</a>
                            <a href="/user/destroy/<?php echo $user['id'] ?>" onclick="return confirm('Are you sure')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;
            endif;
        ?>
        </table>
    </div>
</body>

</html>