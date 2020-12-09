
<?php
include 'includes/connect.php';

if (isset($_POST['adddata'])) {
    $id = $_POST['brand_id'];
    $name = $_POST['brand_type'];

    if (empty($name)) {
        $errorMsg = "Please Enter name";
    } else {
        try {
            if (!isset($errorMsg)) {
                $insert_stmt = $db->prepare("INSERT INTO sy_brand(b_id,b_name) VALUES (:id,:names)");
                $insert_stmt->bindParam(':names', $name);
                $insert_stmt->bindParam(':id', $id);

                if ($insert_stmt->execute()) {
                    $insertMsg = "บันทึกเรียบร้อย";
                    echo "<script type='text/javascript'>alert('$insertMsg');</script>";
                    header("refresh:0; url = brand_page.php");
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
/*-------------------update-------------------*/
if (isset($_POST['updatedata'])) {
    $id = $_POST['update_id'];
    $name = $_POST['name'];

    if (empty($name)) {
        $errorMsg = "Please Enter name";
    } else {
        try {
            if (!isset($errorMsg)) {
                $update_stmt = $db->prepare("UPDATE sy_brand SET b_name = :name WHERE b_id = :id");
                $update_stmt->bindParam(':name', $name);
                $update_stmt->bindParam(':id', $id);

                if ($update_stmt->execute()) {
                    $updateMsg = "แก้ไขเรียบร้อย";
                    echo "<script type='text/javascript'>alert('$updateMsg');</script>";
                    header("refresh:0; url = brand_page.php");
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

/*--------------------------------delete------------------------------*/
if (isset($_POST['deletedata'])) {
    $id = $_POST['delete_id'];

    if (empty($id)) {
        $errorMsg = "Don't Find id";
    } else {
        try {
            if (!isset($errorMsg)) {
                $delete_stmt = $db->prepare("DELETE FROM sy_brand WHERE b_id = :id");
                $delete_stmt->bindParam(':id', $id);

                if ($delete_stmt->execute()) {
                    $deleteMsg = "ลบเรียบร้อย";
                    echo "<script type='text/javascript'>alert('$deleteMsg');</script>";
                    header("refresh:0; url=brand_page.php");
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
