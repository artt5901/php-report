
<?php
include 'includes/connect.php';
/*-----------------testfetch Modal------------------------------*/
// if(isset($_POST['re_id']))
// {
// $reg_id = $_POST[];
//         $output = '';
//         $sql = "SELECT * FROM sy_refrig";
//         $stmt = $db->prepare($sql);
//         $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         $output .= '
//         <td></td>
//         <td></td>
//         ';
//     }

   
    // <input type="hidden" name="update_id" id="update_id">
    //                     <div class="form-group">
    //                         <label>ประเภทน้ำยา</label>
    //                         <input type="text" class="form-control" id="name" name="name">
    //                     </div>

// }
/*--------------------------------------------------------------*/

if (isset($_POST['adddata'])) {
    $id = $_POST['refrig_id'];
    $name = $_POST['refrig_type'];

    if (empty($name)) {
        $errorMsg = "Please Enter name";
    } else {
        try {
            if (!isset($errorMsg)) {
                $insert_stmt = $db->prepare("INSERT INTO sy_refrig(r_id,r_name) VALUES (:id,:names)");
                $insert_stmt->bindParam(':names', $name);
                $insert_stmt->bindParam(':id', $id);

                if ($insert_stmt->execute()) {
                    $insertMsg = "บันทึกเรียบร้อย";
                    echo "<script type='text/javascript'>alert('$insertMsg');</script>";
                    header("refresh:0; url = refrigarent_page.php");
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
                $update_stmt = $db->prepare("UPDATE sy_refrig SET r_name = :name WHERE r_id = :id");
                $update_stmt->bindParam(':name', $name);
                $update_stmt->bindParam(':id', $id);

                if ($update_stmt->execute()) {
                    $updateMsg = "แก้ไขเรียบร้อย";
                    echo "<script type='text/javascript'>alert('$updateMsg');</script>";
                    header("refresh:0; url = refrigarent_page.php");
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
                $delete_stmt = $db->prepare("DELETE FROM sy_refrig WHERE r_id = :id");
                $delete_stmt->bindParam(':id', $id);

                if ($delete_stmt->execute()) {
                    $deleteMsg = "ลบเรียบร้อย";
                    echo "<script type='text/javascript'>alert('$deleteMsg');</script>";
                    header("refresh:1; url=refrigarent_page.php");
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
