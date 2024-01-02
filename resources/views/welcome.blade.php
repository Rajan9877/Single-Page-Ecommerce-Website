<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>E-Commerce Website</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }
        .navbar{
            display: flex;
            box-shadow: rgba(198, 198, 198, 0.2) 0px 7px 29px 0px;
        }
        .nav-left{
            width: 10%;
            padding: 20px;
        }
        .nav-right{
            width: 90%;
            padding: 20px;
        }
        .nav-right ul{
            display: flex;
        }
        .nav-right ul li{
            margin-left: 50px;
            list-style: none;
            font-size: 20px;
        }
        .nav-right ul li a{
            text-decoration: none;
            color: red;
            transition: all 0.3s ease-in-out;
        }
        .nav-right ul li a:hover{
            color: green;
        }
        .fa-dumpster{
            font-size: 30px;
            color: red;
            transition: all 0.3s ease-in-out;
        }
        .fa-dumpster:hover{
            color: green;
        }
    </style>
</head>
<body>
    <livewire:home />
</body>
</html>