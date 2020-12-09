<?php include 'includes/connect.php';
/*---------------- genarate id and add-----------------*/
$query = $db->prepare("SELECT * FROM sy_refrig ORDER BY r_id DESC limit 1");
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);
$lastid = $row['r_id'];
if ($lastid == "") {
    $rt_id = "r001";
} else {

    $rt_idd = str_replace("r","",$lastid);
    $rt_id = str_pad($rt_idd + 1, 3, 0, STR_PAD_LEFT);
    $number = 'r' .$rt_id;
}

?>
<!DOCTYPE html>
<html lang="en">
    <title>ประเภทน้ำยา</title>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <?php include 'includes/navbar.php' ?>
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">ประเภทน้ำยา</h1>
                <p class="mb-4">จัดการข้อมูลประเภทน้ำยา</p>

                <!-- DataTales Example -->
                <div class="card shadow mb-9">
                    <div class="card-header py-8">
                        <button type="button" class="btn btn-primary" data-toggle="modal" style="float: right;" data-target="#addModal">เพิ่มข้อมูล</button>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered" id="mytable" width="100%" cellspacing="0" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th style="display: none;">รหัสประเภทน้ำยา</th>
                                    <th>ชื่อประเภทน้ำยา</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="display: none;">รหัสประเภทน้ำยา</th>
                                    <th>ชื่อประเภทน้ำยา</th>
                                    <th>จัดการ</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                <?php
                                $select_stmt = $db->prepare("SELECT * FROM sy_refrig");
                                $select_stmt->execute();

                                while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <tr>
                                        <td style="display: none;"><?php echo $row["r_id"]; ?></td>
                                        <td><?php echo $row["r_name"]; ?>
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
                <form method="POST" action="refrigarent_control.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลประเภทน้ำยา</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group" style="display: none;">
                            <label>รหัสประเภทน้ำยา</label>
                            <input type="text" class="form-control" id="id_status" name="refrig_id" value="<?php echo $number ?>" readonly>

                        </div>
                        <div class="form-group">
                            <label>ชื่อประเภทน้ำยา</label>
                            <input type="text" class="form-control" id="pro_status" name="refrig_type">
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
                <form method="POST" action="refrigarent_control.php">
                    <div class="modal-header">
                        <h4 class="modal-title">แก้ไขชื่อประเภทน้ำยา</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="update_id" id="update_id">
                        <div class="form-group">
                            <label>ประเภทน้ำยา</label>
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
                <form method="POST" action="refrigarent_control.php">
                    <div class="modal-header">
                        <h4 class="modal-title">ลบชื่อประเภทน้ำยา</h4>
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