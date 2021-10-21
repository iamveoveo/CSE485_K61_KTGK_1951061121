<?php 
    include('config/constants.php');

    $id = $_GET['id'];
    $sql = "DELETE FROM blood_recipient WHERE reci_id=$id";

    $res = mysqli_query($conn, $sql);

    if($res==true)
    {
        $_SESSION['delete'] = "<div class='text-success'>Xóa thành công.</div>";
        header('location:'.SITEURL.'index.php');
    }
    else
    {

        $_SESSION['delete'] = "<div class='text-danger'>Lỗi khi xóa.</div>";
        header('location:'.SITEURL.'error.php');
    }
?>