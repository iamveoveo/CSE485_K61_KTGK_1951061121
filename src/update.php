<?php
    include("template/header.php");

    $id = $_GET['id'];

    $sql1 = "select * from blood_recipient where reci_id = '$id';";
    $res1 = mysqli_query($conn, $sql1);
    if(mysqli_num_rows($res1) >0){
        $row1 = mysqli_fetch_assoc($res1);
        $name = $row1['reci_name'];
        $age = $row1['reci_age'];
        $bgrp = $row1['reci_bgrp'];
        $bqnty = $row1['reci_bqnty'];
        $sex = $row1['reci_sex'];
        $phno = $row1['reci_phno'];
    }

?>

<div class="m-auto" style="width:40%;">
    <form action="" method="POST">
    <div class="mb-3">
        <label for="inputname" class="form-label">Họ và tên</label>
        <input type="text" class="form-control" name="name" value="<?php echo $name ?>" id="inputname">
    </div>
    <div class="mb-3">
        <label for="inputage" class="form-label">Tuổi</label>
        <input type="text" class="form-control" name="age" value="<?php echo $age ?>" id="inputage">
    </div>
    <div class="mb-3">
        <label for="inputbgrp" class="form-label">Nhóm máu</label>
        <input type="text" class="form-control" name="bgrp" value="<?php echo $bgrp ?>" id="inputbrgp">
    </div>
    <div class="mb-3">
        <label for="inputbqnty" class="form-label">Số máu yêu cầu</label>
        <input type="text" class="form-control" name="bqnty" value="<?php echo $bqnty ?>" id="inputbqnty">
    </div>
    <div class="mb-3">
        <label for="inputsex" class="form-label">Giới tính</label>
        <select class="form-control" name="sex" id="inputsex">
        <option value="Nam"
            <?php echo $sex=='Nam'?' selected="selected"':'' ?>>Nam
        </option>
        <option value="Nữ"
            <?php echo $sex=='Nữ'?' selected="selected"':'' ?>>Nữ
        </option>
        </select>
    </div>
    <div class="mb-3">
        <label for="inputphno" class="form-label">Số điện thoại</label>
        <input type="text" class="form-control" name="phno" value="<?php echo $phno ?>" id="inputphno">
    </div>
    <div class="d-flex justify-content-center mt-3">
        <button type="submit" name="submit"  class="btn btn-primary">Sửa</button>
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

        $sql = "update blood_recipient set
                reci_name = '$name',
                reci_age = $age,
                reci_bgrp = '$bgrp',
                reci_bqnty = $bqnty,
                reci_sex = '$sex',
                reci_phno = '$phno'
                where reci_id = $id;";
        $res = mysqli_query($conn, $sql)  or die(mysqli_error($conn));
        if($res == TRUE){
            $_SESSION['update'] = "<div class='text-success'>Sửa thông tin thành công.</div>";
            header('location:'.SITEURL.'index.php');
        }else{
            $_SESSION['update'] = "<div class='text-danger'>lỗi khi sửa thông tin.</div>";
            header('location:'.SITEURL.'error.php');
        }
    }
?>

<?php
    include('template/footer.php')
?>