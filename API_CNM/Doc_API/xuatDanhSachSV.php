<?php

    include ("myClass/classDocAPI.php");
    $p = new docapi();
    
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Xuất danh sách sinh viên</title>
</head>

<body>
</body>
<?php
        $p->xuatDanhSachSV("http://localhost:89/API_CNM/CNM/api/xem.php");
    ?>
</body>

</html>