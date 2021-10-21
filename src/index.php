<?php
    include("template/header.php");
?>
<div class="d-flex justify-content-center">
    <h1 class="">Người nhận máu</h1>
</div>
<div class="container mt-5">
    <a class="btn btn-primary" href="add.php">Thêm người nhận</a>
    <?php 
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

            ?>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">STT</th>
        <th scope="col">Họ và tên</th>
        <th scope="col">Tuổi</th>
        <th scope="col">Nhóm máu</th>
        <th scope="col">Lượng máu yêu cầu</th>
        <th scope="col">Giới tính</th>
        <th scope="col">Ngày yêu cầu</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Sửa</th>
        <th scope="col">Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "select * from blood_recipient";
            $res = mysqli_query($conn, $sql);
            $i = 0;
            if(mysqli_num_rows($res)>0){
                while($row = mysqli_fetch_assoc($res)){
                    $i++;
                    $id = $row['reci_id'];
                    $name = $row['reci_name'];
                    $age = $row['reci_age'];
                    $bgrp = $row['reci_bgrp'];
                    $bqnty = $row['reci_bqnty'];
                    $sex = $row['reci_sex'];
                    $date = $row['reci_reg_date'];
                    $phno = $row['reci_phno'];?>
                    <tr>
                        <th scope="row"><?php echo $i ?></th>
                        <td><a href="<?php echo SITEURL; ?>more-detail.php?id=<?php echo $id; ?>"><?php echo $name ?></a></td>
                        <td><?php echo $age ?></td>
                        <td><?php echo $bgrp ?></td>
                        <td><?php echo $bqnty ?></td>
                        <td><?php echo $sex ?></td>
                        <td><?php echo $date ?></td>
                        <td><?php echo $phno ?></td>
                        <td>
                            <a href="<?php echo SITEURL; ?>update.php?id=<?php echo $id; ?>" class="btn-secondary rounded" style="text-decoration: none">Sửa</a>
                        </td>
                        <td>
                            <a href="<?php echo SITEURL; ?>delete.php?id=<?php echo $id; ?>" class="btn-danger rounded" style="text-decoration: none">Xóa</a>
                        </td>
                    </tr>
                    <?php
                }
            }
        ?>
    </tbody>
    </table>
</div>

<?php
    include('template/footer.php')
?>