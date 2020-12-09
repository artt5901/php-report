<?php include 'includes/connect.php';
/*---------------- genarate-----------------*/
$query = $db->prepare("SELECT * FROM pro_price ORDER BY pp_id DESC limit 1");
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);
$lastid = $row['pp_id'];
if ($lastid == "") {
    $t_id = "pp001";
} else {
    $t_id = substr($lastid, 3);
    $t_id = intval($t_id);
    $t_id = "pp00" . ($t_id + 1);
}
/*---------------- add-----------------*/
/*if (isset($_POST['adddata']) && $_FILES['image']['size']>0) {
    $id = $_POST['text_id'];
    $name = $_POST['pp_detail'];
    $p_og = $_POST['p_og'];
    $pp_sp = $_POST['pp_sp'];
    $p_pp = $_POST['p_pp'];
    $detail = $_POST['pt_id'];
    $type = $_POST['pro_id'];
    $images = $_FILES["pp_img"]['tmp_name'];

    $fp = fopen($images, 'rb');

        try {
                $insert_stmt = $db->prepare("INSERT INTO pro_price(pp_id,pp_img,pp_detail,p_og,pp_sp,p_pp,pt_id,pro_id) VALUES (:id,,:p_name,:og,:sp,:pp,:detail,:p_type)");
                $insert_stmt->bindParam(':id', $id);
                $insert_stmt->bindParam(1,$fp, PDO::PARAM_LOB);
                $insert_stmt->bindParam(':p_name', $name);
                $insert_stmt->bindParam(':og', $p_og);
                $insert_stmt->bindParam(':sp', $pp_sp);
                $insert_stmt->bindParam(':pp', $p_pp);
                $insert_stmt->bindParam(':detail', $detail);
                $insert_stmt->bindParam(':p_type', $type);
                

                if ($insert_stmt->execute()) {
                    $insertMsg = "Record insert successfully...";
                    header("refresh:3;");
                }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
*/
if (isset($_POST['adddata'])) {
    $id = $_POST['text_id'];
    $name = $_POST['pp_detail'];
    $p_og = $_POST['p_og'];
    $pp_sp = $_POST['pp_sp'];
    $p_pp = $_POST['p_pp'];
    $detail = $_POST['pt_id'];
    $type = $_POST['pro_id'];

    $folder = "uploads/";

    $image = $_FILES['images']['name'];

    $path = $folder . $image;

    $target_file = $folder . basename($_FILES["images"]["name"]);


    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


    $allowed = array('jpeg', 'png', 'jpg');
    $filename = $_FILES['images']['name'];

    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {

        echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";
    } else {

        move_uploaded_file($_FILES['images']['tmp_name'], $path);

        $sth = $db->prepare("INSERT INTO pro_price(pp_id,pp_img,pp_detail,p_og,pp_sp,p_pp,pt_id,pro_id) VALUES (:id,:images,:p_name,:og,:sp,:pp,:detail,:p_type)");
        $sth->bindParam(':id', $id);
        $sth->bindParam(':p_name', $name);
        $sth->bindParam(':og', $p_og);
        $sth->bindParam(':sp', $pp_sp);
        $sth->bindParam(':pp', $p_pp);
        $sth->bindParam(':detail', $detail);
        $sth->bindParam(':p_type', $type);
        $sth->bindParam(':images', $image);

        $sth->execute();
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
                $update_stmt = $db->prepare("UPDATE pro_price SET pp_detail = :name WHERE pp_id = :id");
                $update_stmt->bindParam(':names', $name);
                $update_stmt->bindParam(':id', $id);

                if ($update_stmt->execute()) {
                    $updateMsg = "Record update successfully...";
                    header("refresh:1;");
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
                $delete_stmt = $db->prepare("DELETE FROM pro_price WHERE pp_id = :id");
                $delete_stmt->bindParam(':id', $id);

                if ($delete_stmt->execute()) {
                    $deleteMsg = "Record delete successfully...";
                    header("refresh:1;");
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>category</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <?php include 'includes/navbar.php' ?>
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">ข้อมูลราคาสินค้า</h1>
                <p class="mb-4">จัดการข้อมูลราคาสินค้า</p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        <a class="btn btn-primary" role="button" aria-pressed="true" style="float: right;" data-toggle="modal" data-target="#addModal">เพิ่มข้อมูล</a>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>รหัสสินค้า</th>
                                    <th>รูปสินค้า</th>
                                    <th>รายละเอียดประเภทสินค้า</th>
                                    <th>หมวดหมู่</th>
                                    <!-- <th>ชื่่อสินค้า</th> -->
                                    <th>ราคาต้นทุน</th>
                                    <th>ราคาลูกค้าย่อย</th>
                                    <th>ราคาคู่ค้า</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>รหัสสินค้า</th>
                                    <th>รูปสินค้า</th>
                                    <th>รายละเอียดประเภทสินค้า</th>
                                    <th>หมวดหมู่</th>
                                    <!-- <th>ชื่่อสินค้า</th> -->
                                    <th>ราคาต้นทุน</th>
                                    <th>ราคาลูกค้าย่อย</th>
                                    <th>ราคาคู่ค้า</th>
                                    <th>จัดการ</th>
                                </tr>
                                </tr>
                            </tfoot>

                            <tbody>
                                <?php
                                $select_stmt = $db->prepare("SELECT * FROM pro_price AS p INNER JOIN pro_detail_type AS d ON p.pt_id = d.pt_id INNER JOIN product_type AS t ON p.pro_id = t.pro_id");
                                $select_stmt->execute();

                                while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <tr>
                                        <!-- <td><?php echo $row["pp_id"]; ?></td> -->
                                        <td><?php echo $row["pp_detail"]; ?>
                                            <!-- <td><?php echo $row["pp_img"]; ?> -->
                                        <td><img src="uploads/<?php echo $row['pp_img']; ?>" width="100" height="100">
                                        <td><?php echo $row["pt_detail"]; ?>
                                        <td><?php echo $row["pro_type"]; ?>
                                        <td><?php echo $row["p_og"]; ?>
                                        <td><?php echo $row["pp_sp"]; ?>
                                        <td><?php echo $row["p_pp"]; ?>


                                            <!--<td><a href="#editEmployeeModal?update_id=" class="btn btn-warning">Edit</a></td>-->
                                        <td><a class="btn btn-warning editbtn" data-toggle="modal" data-target="#editModal">Edit</a>
                                            <a class="btn btn-danger deletebtn" data-toggle="modal" data-target="#deleteModal">Delete</a></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


    <?php include 'includes/footer.php' ?>

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- #####################################################################################################-->
    <!-- Edit Modal HTML -->
    <div id="editModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">แก้ไข</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="id_type" name="text_id" value="<?php echo $t_id ?>" hidden>
                            <label>รหัสสินค้า</label>
                            <input type="text" class="form-control" id="pp_detail" name="pp_detail">
                        </div>
                        <label>ราคา</label>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="p_og" id="p_og" class="form-control" placeholder="ราคาต้นทุน">

                            </div>
                            <div class="col">
                                <input type="text" name="pp_sp" id="pp_sp" class="form-control" placeholder="ราคาลูกค้าย่อย">

                            </div>
                            <div class="col">
                                <input type="text" name="p_pp" id="p_pp" class="form-control" placeholder="ราคาคู่ค้า">

                            </div>
                        </div>

                        <div class="form-group">

                            <label for="exampleFormControlSelect1">หมวดหมู่สินค้า</label>

                            <select class="form-control" id="exampleFormControlSelect1" name="pro_id">
                                <option>--เลือกหมวดหมู่--</option>
                                <?php
                                $type = $db->prepare("SELECT * FROM product_type");
                                $type->execute();

                                while ($row1 = $type->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option id='" . $row1['pro_id'] . "' value='" . $row1['pro_id'] . "'>" . $row1['pro_type'] . "</option>";
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group">

                            <label for="exampleFormControlSelect1">ประเภทสินค้า</label>

                            <select class="form-control" id="exampleFormControlSelect1" name="pt_id">
                                <option>--เลือกประเภท--</option>
                                <?php
                                $type = $db->prepare("SELECT * FROM pro_detail_type");
                                $type->execute();

                                while ($row1 = $type->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option id='" . $row1['pt_id'] . "' value='" . $row1['pt_id'] . "'>" . $row1['pt_detail'] . "</option>";
                                }
                                ?>

                            </select>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="images" id="images">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" name="updatedata" class="btn btn-info" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!----------------------------------------------------- delete Modal HTML -------------------------------------------------->
    <div id="deleteModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">แก้ไขชื่อประเภท</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" id="delete_id">
                        <h4>คุณต้องการลบข้อมูลใช่หรือไม่ ?</h4>

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" name="deletedata" class="btn btn-info" value="delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!------------------------------------------------------- add Modal HTML ---------------------------------------------------->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลประเภทสินค้า</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="id_type" name="text_id" value="<?php echo $t_id ?>" hidden>
                            <label>รหัสสินค้า</label>
                            <input type="text" class="form-control" id="pp_detail" name="pp_detail">
                        </div>
                        <label>ราคา</label>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="p_og" id="p_og" class="form-control" placeholder="ราคาต้นทุน">

                            </div>
                            <div class="col">
                                <input type="text" name="pp_sp" id="pp_sp" class="form-control" placeholder="ราคาลูกค้าย่อย">

                            </div>
                            <div class="col">
                                <input type="text" name="p_pp" id="p_pp" class="form-control" placeholder="ราคาคู่ค้า">

                            </div>
                        </div>

                        <div class="form-group">

                            <label for="exampleFormControlSelect1">หมวดหมู่สินค้า</label>

                            <select class="form-control" id="exampleFormControlSelect1" name="pro_id">
                                <option>--เลือกหมวดหมู่--</option>
                                <?php
                                $type = $db->prepare("SELECT * FROM product_type");
                                $type->execute();

                                while ($row1 = $type->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option id='" . $row1['pro_id'] . "' value='" . $row1['pro_id'] . "'>" . $row1['pro_type'] . "</option>";
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group">

                            <label for="exampleFormControlSelect1">ประเภทสินค้า</label>

                            <select class="form-control" id="exampleFormControlSelect1" name="pt_id">
                                <option>--เลือกประเภท--</option>
                                <?php
                                $type = $db->prepare("SELECT * FROM pro_detail_type");
                                $type->execute();

                                while ($row1 = $type->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option id='" . $row1['pt_id'] . "' value='" . $row1['pt_id'] . "'>" . $row1['pt_detail'] . "</option>";
                                }
                                ?>

                            </select>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="images" id="images">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>


                    </div>
                    <!-- <form>
                        
                    </form> -->
                    <div class="modal-footer">
                        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" name="adddata" class="btn btn-primary">เพิ่ม</button> -->
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" name="adddata" class="btn btn-info" value="เพิ่ม">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- #####################################################################################################-->
    <script>
    
        $(document).ready(function() {
            $('.editbtn').on('click', function() {
                $('#editmodal').modal('show');
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#text_id').val(data[0]);
                $('#name').val(data[1]);
                $('#p_og').val(data[5]);
                $('#pp_sp').val(data[6]);
                $('#p_pp').val(data[7]);
                $('#pro_id').val(data[3]);
                $('#pt_id').val(data[4]);
                $('#images').val(data[2]);

                // $('#text_id').val(data[0]);
                // $('#name').val(data[1]);
                // $('#p_og').val(data[2]);
                // $('#pp_sp').val(data[3]);
                // $('#p_pp').val(data[4]);
                // $('#pro_id').val(data[5]);
                // $('#pt_id').val(data[6]);
                // $('#images').val(data[7]);

                

            });
        });
    </script>
    <!-- #####################################################################################################-->
    <script>
        $(document).ready(function() {
            $('.deletebtn').on('click', function() {
                $('#deletemodal').modal('show');
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#delete_id').val(data[0]);

            });
        });
    </script>
</body>

</html>