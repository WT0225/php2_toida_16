<?php
require_once('function.php');

loginCheck();


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src=""></script>
    <title>Document</title>
    <link rel="stylesheet" href="./home.css">
</head>
<body>
    <header>
        <h1>ORV</h1>
        <h2>On-site Repair for Vehicle</h2>
        <!-- <button class="login"><a href="user_login.php">Login/New Account</a></button>    -->
            
    </header>
    <section class="main_message">
        <p> ORV gets your vehicle repaired on your site.</p>

    </section>
    <section class="request_input">
        <h3>How can we help you?</h3>
        <form action="result.php" method="post">
            <dl>
                <dt>Servie menu</dt>
                <dd>                 
                    <input type="checkbox" name="services[]" id="servicemenu" value="Battery">Battery
                    <input type="checkbox" name="services[]" id="servicemenu" value="Engine">Engine
                    <input type="checkbox" name="services[]" id="servicemenu" value="Air-conditioner">Air-conditioner
                    <input type="checkbox" name="services[]" id="servicemenu" value="Car washing">Car wahshing
                    <input type="checkbox" name="services[]" id="servicemenu" value="Drive recoder">Drive recoder           
                </dd>
                <dt>Prefered timing for maintenance</dt>
                <dd><input type="datetime-local" name="time" id="time"></dd>
                <dt>Your location</dt>
                <dd><input type="text" name="address" id="address" value="Tokyo"></dd>  
            </dl>
            <input type="submit" value="Search" id="search">
           
        </form>

    </section>




    <section class="service_provider">
        <p>Service mechanic/Service shop owner?</p>
            <button>
                <a href="./register.html">For service providers</a>
            </button>
    </section>

    
    <footer>
        <small>MIL 2nd</small>
    </footer>
    
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- JQuery -->

    <!-- 入力した場所の値を受け渡し -->
    <!-- <script>
        $("#search").on("click",function(){
            let Place = $("#Place").val()
            location.href = './search_result.html?name='+ encodeURIComponent(Place);
        })
    </script> -->
</body>
</html>