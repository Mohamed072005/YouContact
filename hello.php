<?php
session_start()
?>
<DOCTYPE html>
<html lang = 'en'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>YouContact</title>
</head>
<body class="bg-info">
    <main class=" d-flex align-items-center justify-content-center h-75">
        <div class=" d-flex flex-column justify-content-evenly h-75 mt-5">
            <div>
                <h1 class="text-light">Hello, <?= $_SESSION['USER_NAME_1'], " ", $_SESSION['USER_NAME_2'] ?></h1>
            </div>
            <div class="text-center">
                <a class="btn btn-outline-success" href="main.php">Enter</a>
            </div>
        </div>
    </main>
</body>