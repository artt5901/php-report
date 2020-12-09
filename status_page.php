<?php include 'includes/connect.php';
/*---------------- genarate id and add-----------------*/
$query = $db->prepare("SELECT * FROM sy_status ORDER BY s_id DESC limit 1");
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);
$lastid = $row['s_id'];
if ($lastid == "") {
    $st_id = "s001";
} else {
    $st_id = substr($lastid, 3);
    $st_id = intval($st_id);
    $st_id = "s00" . ($st_id + 1);
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

    <title>สถานะ</title>

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
                <h1 class="h3 mb-2 text-gray-800">สถานะ</h1>
                <p class="mb-4">จัดการข้อมูลสถานะ</p>

                <!-- DataTales Example -->
                <div class="card shadow mb-9">
                    <div class="card-header py-8">
                        <button type="button" class="btn btn-primary" data-toggle="modal" style="float: right;" data-target="#addModal">เพิ่มข้อมูล</button>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th style="display: none;">รหัสสถานะ</th>
                                    <th>ชื่อสถานะ</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="display: none;">รหัสสถานะ</th>
                                    <th>ชื่อสถานะ</th>
                                    <th>จัดการ</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                <?php
                                $select_stmt = $db->prepare("SELECT * FROM sy_status");
                                $select_stmt->execute();

                                while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <tr>
                                        <td style="display: none;"><?php echo $row["s_id"]; ?></td>
                                        <td><?php echo $row["s_name"]; ?>
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
    <!-- ######################################## Modal ########################################################-->
    <!-- addModal HTML -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" action="status_control.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลประเภทสินค้า</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>รหัสสถานะ</label>
                            <input type="text" class="form-control" id="id_status" name="status_id" value="<?php echo $st_id ?>" readonly>

                        </div>
                        <div class="form-group">
                            <label>ชื่อสถานะ</label>
                            <input type="text" class="form-control" id="pro_status" name="status_type">
                        </div>


                    </div>
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


    <!-- Edit Modal HTML -->
    <div id="editModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="status_control.php">
                    <div class="modal-header">
                        <h4 class="modal-title">แก้ไขชื่อประเภท</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="update_id" id="update_id">
                        <div class="form-group">
                            <label>ชื่อประเภท</label>
                            <input type="text" class="form-control" id="name" name="name">
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

    <!-- deleteModal HTML -->
    <div id="deleteModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="status_control.php">
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

    <!-- ########################################## Script #########################################################-->
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

<!-------------------------------------------- edit --------------------------------->
    <script>
        $(document).ready(function() {
            $('.editbtn').on('click', function() {
                $('#editmodal').modal('show');
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#update_id').val(data[0]);
                $('#name').val(data[1]);
            });
        });
    </script>
<!-------------------------------------------- edit --------------------------------->
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