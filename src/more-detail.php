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
    else{
        $_SESSION['detail'] = "<div class='text-success'>Lỗi khi xem thông tin chi tiết.</div>";
        header('location:'.SITEURL.'error.php');
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
    </form>
</div>

<?php
    include('template/footer.php')
?>
<script>
    $('input').attr('disabled', 'disabled');
    $('select').attr('disabled', 'disabled');
</script>