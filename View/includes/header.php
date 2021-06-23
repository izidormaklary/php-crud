<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD-php</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
</head>
<body>
<header>
    <h1>Create, Read, Update & Delete</h1>
</header>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a href="?page=teacher" class="nav-link <?php echo $teacherpage; ?>">Teachers page</a>
    </li>
    <li class="nav-item">
        <a href="?page=class" class="nav-link <?php echo $classpage; ?>">Classes page</a>

    </li>
    <li class="nav-item">
        <a href="?page=student" class="nav-link <?php echo $studentpage; ?>">Students page</a>
    </li>
</ul>