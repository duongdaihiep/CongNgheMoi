<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    <?php
        include("./classdocapi.php");
        $p=new docAPI;
        $p->xuatTBL_CPU("http://localhost:8080/NguyenVanDuong_20029511/NguyenVanDuong_taoapi/xemcpu.php");

    ?>
</body>
</html>
