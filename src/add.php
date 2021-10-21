<?php
    include("template/header.php");
?>

<div class="m-auto" style="width:40%;">
    <form action="" method="POST">
    <div class="mb-3">
        <label for="inputname" class="form-label">Họ và tên</label>
        <input type="text" class="form-control" name="name" id="inputname">
    </div>
    <div class="mb-3">
        <label for="inputage" class="form-label">Tuổi</label>
        <input type="text" class="form-control" name="age" id="inputage">
    </div>
    <div class="mb-3">
        <label for="inputbgrp" class="form-label">Nhóm máu</label>
        <input type="text" class="form-control" name="bgrp" id="inputbrgp">
    </div>
    <div class="mb-3">
        <label for="inputbqnty" class="form-label">Số máu yêu cầu</label>
        <input type="text" class="form-control" name="bqnty" id="inputbqnty">
    </div>
    <div class="mb-3">
        <label for="inputsex" class="form-label">Giới tính</label>
        <select class="form-control" name="sex" id="inputsex">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="inputphno" class="form-label">Số điện thoại</label>
        <input type="text" class="form-control" name="phno" id="inputphno">
    </div>
    <div class="d-flex justify-content-center mt-3">
        <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
    </div>
    </form>
</div>

<?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $age = $_POST['age'];
        $bgrp = $_POST['bgrp'];
        $bqnty = $_POST['bqnty'];
        $sex = $_POST['sex'];
        $phno = $_POST['phno'];

        $sql = "insert into blood_recipient set
                reci_name = '$name',
                reci_age = $age,
                reci_bgrp = '$bgrp',
                reci_bqnty = $bqnty,
                reci_sex = '$sex',
                reci_phno = '$phno';";
        $res = mysqli_query($conn, $sql);
        if($res == TRUE){
            $_SESSION['add'] = "<div class='text-success'>Thêm thành công.</div>";
            header("location:".SITEURL.'index.php');
        }
        else{
            $_SESSION['add'] = "<div class='text-danger'>Lỗi khi thêm</div>";
            header("location:".SITEURL.'error.php');
        }
    }
?>

<?php
    include('template/footer.php')
?>