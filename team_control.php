
<?php
include 'includes/connect.php';

if (isset($_POST['adddata'])) {
    $id = $_POST['head_id'];
    $name = $_POST['head_name'];
    $number = $_POST['head_number'];


    if (empty($name)) {
        $errorMsg = "Please Enter name";
    } else {
        try {
            if (!isset($errorMsg)) {
                $insert_stmt = $db->prepare("INSERT INTO sy_team(t_id,t_head,t_number) VALUES (:id,:names,:num)");
                $insert_stmt->bindParam(':names', $name);
                $insert_stmt->bindParam(':id', $id);
                $insert_stmt->bindParam(':num', $number);

                if ($insert_stmt->execute()) {
                    $insertMsg = "บันทึกเรียบร้อย";
                    echo "<script type='text/javascript'>alert('$insertMsg');</script>";
                    header("refresh:0; url = team_page.php");
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
    $number = $_POST['number'];

    if (empty($name)) {
        $errorMsg = "Please Enter name";
    } else {
        try {
            if (!isset($errorMsg)) {
                $update_stmt = $db->prepare("UPDATE sy_team SET t_name = :name, t_number = :num WHERE t_id = :id");
                $update_stmt->bindParam(':name', $name);
                $update_stmt->bindParam(':id', $id);
                $update_stmt->bindParam(':num', $number);

                if ($update_stmt->execute()) {
                    $updateMsg = "แก้ไขเรียบร้อย";
                    echo "<script type='text/javascript'>alert('$updateMsg');</script>";
                    header("refresh:0; url = team_page.php");
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
                $delete_stmt = $db->prepare("DELETE FROM sy_team WHERE t_id = :id");
                $delete_stmt->bindParam(':id', $id);

                if ($delete_stmt->execute()) {
                    $deleteMsg = "ลบเรียบร้อย";
                    echo "<script type='text/javascript'>alert('$deleteMsg');</script>";
                    header("refresh:0; url=team_page.php");
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
