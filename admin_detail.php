<?php

require_once('function.php');
$pdo = db_conn();

$id = $_GET['id'];

$stmt=$pdo->prepare('SELECT*FROM workshop_db WHERE id= :id');
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();


if($status == false){
    sql_error($stmt);
}else{
    $result=$stmt->fetch();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./register.css">
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- JQuery  -->
</head>
<body>
    <header>
        <h1>Data Edit</h1>
    </header>

    <section class="info_input">
        <form action="admin_update.php" method="post">
            <dl>
                <dt>Service shop name</dt>
                <dd><input type="text" name="workshop_name" value="<?= $result['workshop_name']?>"></dd>

                <dt>email address</dt>
                <dd><input type="text" name="email" id="" value="<?= $result['email']?>"></dd>

                <dt>TEL</dt>
                <dd><input type="text" name="tel" id="" value="<?= $result['tel']?>"></dd>

                <dt>Working time</dt>
                <dd>
                    Monday <input type="time" name="mon_open" id="" value="<?= $result['mon_open'] ?>"> ~ <input type="time" name="mon_close" id="" value="<?= $result['mon_close'] ?>">
                    Tuesday <input type="time" name="tue_open" id="" value="<?= $result['tue_open'] ?>"> ~ <input type="time" name="tue_close" id="" value="<?= $result['tue_close'] ?>">
                    Wednesday <input type="time" name="wed_open" id="" value="<?= $result['wed_open'] ?>"> ~ <input type="time" name="wed_close" id="" value="<?= $result['wed_close'] ?>">
                    Thursday <input type="time" name="thu_open" id="" value="<?= $result['thu_open'] ?>"> ~ <input type="time" name="thu_close" id="" value="<?= $result['thu_close'] ?>">
                    Friday <input type="time" name="fri_open" id="" value="<?= $result['fri_open'] ?>"> ~ <input type="time" name="fri_close" id="" value="<?= $result['fri_close'] ?>">
                    Saturday <input type="time" name="sat_open" id="" value="<?= $result['sat_open'] ?>"> ~ <input type="time" name="sat_close" id="" value="<?= $result['sat_close'] ?>">
                    Sunday <input type="time" name="sun_open" id="" value="<?= $result['sun_open'] ?>"> ~ <input type="time" name="sun_close" id="" value="<?= $result['sun_close'] ?>">
                </dd>

                <dt>Services</dt>
                <dd>  
                    <input type="checkbox" name="services[]" id="servicemenu" value="Battery" <?= preg_match('/Battery/', $result['service'])===1 ? 'checked' : '' ?> >Battery
                    <input type="checkbox" name="services[]" id="servicemenu" value="Engine" <?= preg_match('/Engine/', $result['service'])===1 ? 'checked' : '' ?>>Engine
                    <input type="checkbox" name="services[]" id="servicemenu" value="Air-conditioner" <?= preg_match('/Air-conditioner/', $result['service'])===1 ? 'checked' : '' ?>>Air-conditioner
                    <input type="checkbox" name="services[]" id="servicemenu" value="Car washing" <?= preg_match('/Car washing/', $result['service'])===1 ? 'checked' : '' ?>>Car wahshing
                    <input type="checkbox" name="services[]" id="servicemenu" value="Drive recoder" <?= preg_match('/Drive recoder/', $result['service'])===1 ? 'checked' : '' ?>>Drive recoder
                </dd>  

                <dt>Address</dt>
                <dd><input type="text" name="address" value="<?= $result['address'] ?>"></dd>
                <input type="hidden" name="id" value="<?= $result['id']?>">
            </dl>
            <input type="submit" value="update">
        </form>
        <div id="success"></div>
    </section>
    


</body>
</html>