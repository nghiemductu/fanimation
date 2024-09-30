<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    
    <!-- Custom Font from onlinewebfonts -->
    <link href="https://db.onlinewebfonts.com/c/b82329475307e0380dc1ea23f0c35266?family=adineue+PRO" rel="stylesheet" type="text/css"/>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/public/css/code1.css">
    <link rel="stylesheet" href="/public/css/code2.css">
</head>


<body style="font-family: 'AdihausDIN', Arial, Helvetica, sans-serif;">
    <div class="container-fluid">
        
        <div id="preloader"></div>

        <div class="notification-bar" id="notification-bar">
            <div class="notification-content">
                <p id="notification-text">EASY RETURN</p>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
        </div>

        <!-- Desktop View -->
        <div class="header">
            <div class="header-top d-flex justify-content-end">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="#">help</a></li>
                    <li class="list-inline-item"><a href="#">order tracker</a></li>
                    <li class="list-inline-item"><a href="#">become a member</a></li>
                    <li class="list-inline-item"><img src="/img/Flag_of_the_United_States.svg.png" alt="Flag" class="header-flag"></li>
                </ul>
            </div>

            <img src="/img/adidas_logo.png" alt="Adidas Logo" class="adidas-logo d-block mx-auto">

            <div class="header-bottom  pb-2">              

                <ul class="middle-section ">
                    <li class="list-inline-item fw-bold"> <a href="#">MEN</a> </li>
                    <li class="list-inline-item fw-bold"> <a href="#">WOMEN</a></li>
                    <li class="list-inline-item fw-bold"> <a href="#">KIDS</a></li>
                    <li class="list-inline-item"> <a href="#">SPORTS</a></li>
                    <li class="list-inline-item"> <a href="#">BRANDS</a></li>
                    <li class="list-inline-item"> <a href="#">YEEZY</a></li>
                    <li class="list-inline-item fw-bold"> <a href="#">UP TO 20% OFF*</a></li>
                </ul>

                <div class="right-section ">
                    <div class="search-bar d-none d-md-flex align-items-center me-3 ">
                        <input type="text" placeholder="Search" class="form-control border-0">
                        <button class="btn"><i class="fa fa-search"></i></button>
                    </div>

                    <div class="header-icons">
                        <a href="#" class="me-2"><i class="fa-regular fa-user"></i></a>
                        <a href="#" class="me-2"><i class="fa-regular fa-heart"></i></a>
                        <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile View -->
        <div class="header-mobile">
            <div class="mobile-left">
                <button><i class="fa-solid fa-bars"></i></button>
                <a href="#" class="me-2"><i class="fa-regular fa-heart"></i></a>
            </div>

            <div class="mobile-middle">
                <img src="/img/adidas_logo.png" alt="Adidas Logo" >
            </div>

            <div class="mobile-right">
                <ul>
                    <li><a href="#" class="me-2"><i class="fa-regular fa-user"></i></a></li>
                    <li><a href="#" class="me-2"><i class="fa fa-search"></i></a></li>
                    <li><a href="#"><i class="fa-solid fa-bag-shopping"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signInModalLabel">Sign In Required</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                You must sign in or register to perform this action.
            </div>
            <div class="modal-footer">
                <a href="login.html" class="btn btn-primary">Sign In</a>
                <a href="register.html" class="btn btn-secondary">Register</a>
            </div>
        </div>
    </div>
</div>


