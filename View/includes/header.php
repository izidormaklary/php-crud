<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD-php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<header>

<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container-fluid">
        <h1 class="navbar-brand">Create, Read, Update & Delete</h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  me-auto mb-2 mb-lg-0">
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
            <form method="post" class="d-flex">
                <div class="input-group my-3">
                    <input class="form-control  <?php echo $error; ?>" name="searchInput" type="text">
                    <input class=" btn btn-primary" type="submit" name="search" value="Search">
                </div>
            </form>
        </div>
    </div>
</nav>
</header>

<div class="container">
    <div class ="row">