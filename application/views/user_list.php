<?php session_start(); ?>
<html>
    <head>
    </head>

    <body>
        <table align="center">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Password</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $model = new DbModel();
                    foreach ($model->query("SELECT * FROM users WHERE name='".$_SESSION['name']."'") as $row) {
                        echo '<tr><td>' .$row['id'].'</td><td>'.$row['name'].'</td><td>'.$row['password'].'</td><td>';
                    }
                ?>
                </tbody>
        </table>
        <a href="/bb/bb">Log Out</a>
    </body>
</html>