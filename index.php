<?php
include_once './entity/Person.php';
include_once './entity/Student.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Object Oriented PHP</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <?php
            $student = new Student();
            $student->setBirthDate('1998-10-05');
            $student->setId('1572000');
            $student->setName('Dummy User');
            echo 'Print student data<br>';
            echo 'ID: ' . $student->getId() . '<br>';
            echo 'Name: ' . $student->getName() . '<br>';
            $date = date_create($student->getBirthDate());
            echo 'Birth Date: ' . date_format($date, 'D, d M Y') . '<br>';
            ?>
        </div>
    </body>
</html>
