<?php include 'includes/connect.php';?>
<!DOCTYPE html>
<html lang="en">
<title>Report</title>

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.th.min.js" integrity="sha512-cp+S0Bkyv7xKBSbmjJR0K7va0cor7vHYhETzm2Jy//ZTQDUvugH/byC4eWuTii9o5HN9msulx2zqhEXWau20Dg==" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <?php include 'includes/navbar.php' ?>
<!-- ################################################################################################-->
            <div class="col d-flex justify-content-center">
                <div class="col-lg-9">
                <div class="card text-left">
                    <div class="card-header">
                        <div class="card bg-primary text-white">
                            <h4>
                                <div class="card-body">รายงานสรุปการตรวจสอบและทำความสะอาดเครื่องปรับอากาศ</div>
                            </h4>
                            <h4>
                                <div class="card-body">(Air Conditioner Checking and Cleaning Summary Report)
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="container text-left">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="usr">ชื่อลูกค้า : </label>
                                            <input type="text" class="form-control" id="usr">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="usr">ยี่ห้อเครื่องปรับอากาศ :</label>
                                        <div class="dropdown">
                                            <select class="custom-select" id="inputGroupSelect01">
                                                <option>เลือกยี่ห้อเครื่องปรับอากาศ</option>
                                                <?php
                                                $type = $db->prepare("SELECT * FROM sy_brand");
                                                $type->execute();

                                                while ($row1 = $type->fetch(PDO::FETCH_ASSOC)) {
                                                    echo "<option id='" . $row1['b_id'] . "' value='" . $row1['b_id'] . "'>" . $row1['b_name'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="usr">เลขที่ใบงาน : </label>
                                            <input type="text" class="form-control" id="usr">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="usr">รหัสรุ่น : </label>
                                            <input type="text" class="form-control" id="usr">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        วันที่ปฏิบัติงาน : <br>
                                        <input id="datepicker" width="276" />
                                        <script>
                                            $('#datepicker').datepicker({
                                                footer: true,
                                                modal: true,
                                                header: true,
                                                uiLibrary: 'bootstrap4',
                                                format: 'dd-mmmm-yyyy',
                                            });
                                        </script>

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="usr">ขนาด BTU : </label>
                                            <input type="text" class="form-control" id="usr">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="usr">หัวหน้าทีมช่างที่รับผิดชอบ :</label>

                                        <div class="dropdown">
                                            <select class="custom-select" id="inputGroupSelect01">
                                                <option>หัวหน้าทีม</option>
                                                <?php
                                                $type = $db->prepare("SELECT * FROM sy_team");
                                                $type->execute();

                                                while ($row1 = $type->fetch(PDO::FETCH_ASSOC)) {
                                                    echo "<option id='" . $row1['t_id'] . "' value='" . $row1['t_id'] . "'>" . $row1['t_head'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="usr">ประเภทน้ำยาทำความเย็น :</label>
                                        <div class="dropdown">
                                            <select class="custom-select" id="inputGroupSelect01">
                                                <option> ประเภทน้ำยาทำความเย็น</option>
                                                <?php
                                                $type = $db->prepare("SELECT * FROM sy_refrig");
                                                $type->execute();

                                                while ($row1 = $type->fetch(PDO::FETCH_ASSOC)) {
                                                    echo "<option id='" . $row1['r_id'] . "' value='" . $row1['r_id'] . "'>" . $row1['r_name'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!-- ################################################################################################-->
                <div class="card text-left">
                    <div class="card-header">
                        <div class="card bg-primary text-white">
                            <h4>
                                <div class="card-body">ภาพรวม (Overview)</div>
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container text-right">
                        <button type="button" class="btn btn-primary">เพิ่มรายการ</button>
                        </div><br>

                        <!-- ################################################################################################-->
                        <table class="table table-bordered table-dark" id="mytable" width="100%" cellspacing="0" style="text-align: left;">
                            <thead>
                                <tr>
                                    <th style="display: none;">รหัสหัวข้อ</th>
                                    <th class="text-center w-5"></th>
                                    <th class="text-center w-45">หัวข้อ</th>
                                    <th class="text-center w-25">สถานะ</th>
                                    <th class="text-center w-25">จัดการ</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $select_stmt = $db->prepare("SELECT * FROM sy_overview");
                                $select_stmt->execute();

                                while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <tr>
                                        <td><div class="form-check"><input type="checkbox" class="form-check-input" id="exampleCheck1"></div></td>
                                        <td style="display: none;"><?php echo $row["v_id"]; ?></td>
                                        <td><?php echo $row["v_list"]; ?>

                                        <td>
                                        <div class="dropdown">
                                        <select class="custom-select" id="inputGroupSelect01">
                                        <option>เลือกสถานะ</option>
                                        <?php
                                        $type = $db->prepare("SELECT * FROM sy_status");
                                        $type->execute();

                                        while ($row1 = $type->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<option id='" . $row1['s_id'] . "' value='" . $row1['s_id'] . "'>" . $row1['s_name'] . "</option>";
                                        }
                                        ?>
                                        </select>
                                        </div>
                                        </td>

                                        <td class="text-center">
                                        <button type="button" class="btn btn-warning">แก้ไข</button>
                                        <button type="button" class="btn btn-danger">ลบ</button>
                                        </td>
                                <?php } ?>
                            </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- ################################################################################################-->
<!-- ################################################################################################-->
                        <!-- <table class="table table-bordered table-dark">
                        <thead>
                        <tr class="d-flex">
                        <th class="col-7 text-center">หัวข้อ</th>
                        <th class="col-3 text-center">สถานะ</th>
                        <th class="col-2 text-center">จัดการ</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="d-flex">
                        <td class="col-sm-7">
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <textarea class="form-control" rows="1" id="comment">• ผลการตรวจสอบก่อนการล้าง ปริมาณฝุ่นที่สะสมอยู่ในคอยล์เย็น อยู่ในเกณฑ์</textarea>
                            </div>
                        </td>
                        <td class="col-sm-3">
                            <div class="dropdown">
                            <select class="custom-select" id="inputGroupSelect01">
                            <option> เลือกสถานะ</option>
                            <?php
                                $type = $db->prepare("SELECT * FROM sy_status");
                                $type->execute();

                                while ($row1 = $type->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option id='" . $row1['s_id'] . "' value='" . $row1['s_id'] . "'>" . $row1['s_name'] . "</option>";
                                }
                            ?>
                            </select>
                            </div>
                        </td>
                        <td class="col-sm-2 text-center">
                            <button type="button" class="btn btn-warning">แก้ไข</button>
                            <button type="button" class="btn btn-danger">ลบ</button>
                        </td>
                        </tr>
                        
                        <tr class="d-flex">
                        <td class="col-sm-7">
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck2">
                            <textarea class="form-control" rows="2" id="comment">• ผลการตรวจสอบก่อนการล้าง สภาพทางกายภาพของเครื่องปรับอากาศ คอยล์ร้อน/เย็น อยู่ในเกณฑ์</textarea>
                            </div>
                        </td>
                        <td class="col-sm-3">
                            <div class="dropdown">
                            <select class="custom-select" id="inputGroupSelect02">
                            <option> เลือกสถานะ</option>
                            <?php
                                $type = $db->prepare("SELECT * FROM sy_status");
                                $type->execute();

                                while ($row1 = $type->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option id='" . $row1['s_id'] . "' value='" . $row1['s_id'] . "'>" . $row1['s_name'] . "</option>";
                                }
                            ?>
                            </select>
                            </div>
                        </td>
                        <td class="col-sm-2 text-center">
                            <button type="button" class="btn btn-warning">แก้ไข</button>
                            <button type="button" class="btn btn-danger">ลบ</button>
                        </td>
                        </tr>
                        
                        <tr class="d-flex">
                        <td class="col-sm-7">
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck3">
                            <textarea class="form-control" rows="1" id="comment">• ผลการตรวจสอบ สภาพการทำงานของคอยล์เย็น หลังล้าง อยู่ในเกณฑ์</textarea>
                            </div>
                        </td>
                        <td class="col-sm-3">
                            <div class="dropdown">
                            <select class="custom-select" id="inputGroupSelect03">
                            <option> เลือกสถานะ</option>
                            <?php
                                $type = $db->prepare("SELECT * FROM sy_status");
                                $type->execute();

                                while ($row1 = $type->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option id='" . $row1['s_id'] . "' value='" . $row1['s_id'] . "'>" . $row1['s_name'] . "</option>";
                                }
                            ?>
                            </select>
                            </div>
                        </td>
                        <td class="col-sm-2 text-center">
                            <button type="button" class="btn btn-warning">แก้ไข</button>
                            <button type="button" class="btn btn-danger">ลบ</button>
                        </td>
                        </tr>
                        
                        <tr class="d-flex">
                        <td class="col-sm-7">
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck4">
                            <textarea class="form-control" rows="1" id="comment">• ผลการตรวจสอบ สภาพการทำงานของคอยล์ร้อน หลังล้าง อยู่ในเกณฑ์</textarea>
                            </div>
                        </td>
                        <td class="col-sm-3">
                            <div class="dropdown">
                            <select class="custom-select" id="inputGroupSelect04">
                            <option> เลือกสถานะ</option>
                            <?php
                                $type = $db->prepare("SELECT * FROM sy_status");
                                $type->execute();

                                while ($row1 = $type->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option id='" . $row1['s_id'] . "' value='" . $row1['s_id'] . "'>" . $row1['s_name'] . "</option>";
                                }
                            ?>
                            </select>
                            </div>
                        </td>
                        <td class="col-sm-2 text-center">
                            <button type="button" class="btn btn-warning">แก้ไข</button>
                            <button type="button" class="btn btn-danger">ลบ</button>
                        </td>
                        </tr>
                        
                        <tr class="d-flex">
                        <td class="col-sm-7">
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck5">
                            <textarea class="form-control" rows="1" id="comment">• ผลการตรวจสอบ การทำอุณหภูมิ หลังล้าง ทำอุณหภูมิได้ อยู่ในเกณฑ์</textarea>
                            </div>
                        </td>
                        <td class="col-sm-3">
                            <div class="dropdown">
                            <select class="custom-select" id="inputGroupSelect05">
                            <option> เลือกสถานะ</option>
                            <?php
                                $type = $db->prepare("SELECT * FROM sy_status");
                                $type->execute();

                                while ($row1 = $type->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option id='" . $row1['s_id'] . "' value='" . $row1['s_id'] . "'>" . $row1['s_name'] . "</option>";
                                }
                            ?>
                            </select>
                            </div>
                        </td>
                        <td class="col-sm-2 text-center">
                            <button type="button" class="btn btn-warning">แก้ไข</button>
                            <button type="button" class="btn btn-danger">ลบ</button>
                        </td>
                        </tr>
                        
                        <tr class="d-flex">
                        <td class="col-sm-7">
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck6">
                            <textarea class="form-control" rows="1" id="comment">• ผลการตรวจสอบ แรงลมของพัดลมที่คอยล์เย็น หลังล้าง อยู่ในเกณฑ์</textarea>
                            </div>
                        </td>
                        <td class="col-sm-3">
                            <div class="dropdown">
                            <select class="custom-select" id="inputGroupSelect06">
                            <option> เลือกสถานะ</option>
                            <?php
                                $type = $db->prepare("SELECT * FROM sy_status");
                                $type->execute();

                                while ($row1 = $type->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option id='" . $row1['s_id'] . "' value='" . $row1['s_id'] . "'>" . $row1['s_name'] . "</option>";
                                }
                            ?>
                            </select>
                            </div>
                        </td>
                        <td class="col-sm-2 text-center">
                            <button type="button" class="btn btn-warning">แก้ไข</button>
                            <button type="button" class="btn btn-danger">ลบ</button>
                        </td>
                        </tr>
                        
                        <tr class="d-flex">
                        <td class="col-sm-7">
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck7">
                            <textarea class="form-control" rows="1" id="comment">• ผลการตรวจสอบ แรงดันน้ำยาทำความเย็น หลังล้าง อยู่ในเกณฑ์</textarea>
                            </div>
                        </td>
                        <td class="col-sm-3">
                            <div class="dropdown">
                            <select class="custom-select" id="inputGroupSelect07">
                            <option> เลือกสถานะ</option>
                            <?php
                                $type = $db->prepare("SELECT * FROM sy_status");
                                $type->execute();

                                while ($row1 = $type->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option id='" . $row1['s_id'] . "' value='" . $row1['s_id'] . "'>" . $row1['s_name'] . "</option>";
                                }
                            ?>
                            </select>
                            </div>
                        </td>
                        <td class="col-sm-2 text-center">
                            <button type="button" class="btn btn-warning">แก้ไข</button>
                            <button type="button" class="btn btn-danger">ลบ</button>
                        </td>
                        </tr>
                        </tbody>
                        </table> -->
                    </div>
                </div>
<!-- ################################################################################################-->
                <div class="card text-left">
                    <div class="card-header">
                        <div class="card bg-primary text-white">
                            <h4>
                                <div class="card-body">ผลการวัดก่อนล้าง และหลังล้าง (Checking Result)</div>
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">เพิ่มรายการ</button>
                        </div><br>
                        <!-- ################################################################################################-->
                        <table class="table table-bordered table-dark" id="mytable" width="100%" cellspacing="0" style="text-align: left;">
                            <thead>
                                <tr>
                                    <th style="display: none;">รหัสรายการ</th>
                                    <th class="text-center w-5"></th>
                                    <th class="text-center w-50">รายการ</th>
                                    <th class="text-center w-10">ก่อนล้าง</th>
                                    <th class="text-center w-10">หลังล้าง</th>
                                    <th class="text-center w-25">จัดการ</th>
                                </tr>
                            </thead>
<!-- ################################################################################################-->
                            <tbody>
                                <?php
                                $select_stmt = $db->prepare("SELECT * FROM sy_check");
                                $select_stmt->execute();

                                while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <tr>
                                        <td><div class="form-check"><input type="checkbox" class="form-check-input" id="lists"></div></td>
                                        <td style="display: none;"><?php echo $row["c_id"]; ?></td>
                                        <td><?php echo $row["c_list"]; ?>

                                        <td><input type="text" class="form-control" id="bef"></td>
                                        <td><input type="text" class="form-control" id="aft"></td>

                                        <td class="text-center">
                                        <button type="button" class="btn btn-warning editbtn" data-toggle="modal" data-target="#editModal">แก้ไข</button>
                                        <button type="button" class="btn btn-danger deletebtn" data-toggle="modal" data-target="#deleteModal">ลบ</button>
                                        </td>
                                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" style="float: right;" data-target="#addModal">เพิ่มข้อมูล</button> -->
                                        <!-- <a class="btn btn-danger deletebtn" data-toggle="modal" data-target="#deleteModal">Delete</a> -->
                                <?php } ?>
                            </td>
                            </tr>
                            </tbody>
                        </table>
<!-- ################################################################################################-->
                        <!-- <table class="table table-bordered table-dark">
                        <thead>
                        <tr class="d-flex">
                        <th class="col-6 text-center">รายการ</th>
                        <th class="col-2 text-center">ก่อนล้าง</th>
                        <th class="col-2 text-center">หลังล้าง</th>
                        <th class="col-2 text-center">จัดการ</th>
                        </tr>
                        </thead>
                        
                        <tr class="d-flex">
                        <td class="col-sm-6">
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck001">
                            <textarea class="form-control" rows="1" id="comment">ตรวจสอบอุณหภูมิหน้าเครื่อง (°C)</textarea></div></td>
                        <td class="col-sm-2"><input type="text" class="form-control" id="usr"></td>
                        <td class="col-sm-2"><input type="text" class="form-control" id="usr"></td>
                        <td class="col-sm-2 text-center">
                            <button type="button" class="btn btn-warning">แก้ไข</button>
                            <button type="button" class="btn btn-danger">ลบ</button>
                        </td>
                        </tr>
                        
                        
                        <tr class="d-flex">
                        <td class="col-sm-6">
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck002">
                            <textarea class="form-control" rows="1" id="comment">ตรวจสอบแรงลมหน้าเครื่อง (เมตร/วินาที)</textarea></div></td>
                        <td class="col-sm-2"><input type="text" class="form-control" id="usr"></td>
                        <td class="col-sm-2"><input type="text" class="form-control" id="usr"></td>
                        <td class="col-sm-2 text-center">
                            <button type="button" class="btn btn-warning">แก้ไข</button>
                            <button type="button" class="btn btn-danger">ลบ</button>
                        </td>
                        </tr>
                        
                        
                        <tr class="d-flex">
                        <td class="col-sm-6">
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck003">
                            <textarea class="form-control" rows="1" id="comment">ตรวจสอบแรงดันน้ำยาแอร์ (PSI.)</textarea></div></td>
                        <td class="col-sm-2"><input type="text" class="form-control" id="usr"></td>
                        <td class="col-sm-2"><input type="text" class="form-control" id="usr"></td>
                        <td class="col-sm-2 text-center">
                            <button type="button" class="btn btn-warning">แก้ไข</button>
                            <button type="button" class="btn btn-danger">ลบ</button>
                        </td>
                        </tr>
                        
                        
                        <tr class="d-flex">
                        <td class="col-sm-6"><div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck004">
                            <textarea class="form-control" rows="1" id="comment">ตรวจสอบกระแสไฟของคอมเพรสเซอร์.</textarea></div></td>
                        <td class="col-sm-2"><input type="text" class="form-control" id="usr"></td>
                        <td class="col-sm-2"><input type="text" class="form-control" id="usr"></td>
                        <td class="col-sm-2 text-center">
                            <button type="button" class="btn btn-warning">แก้ไข</button>
                            <button type="button" class="btn btn-danger">ลบ</button>
                        </td>
                        </tr>
                        
                        </table> -->
                    </div>
                </div>
<!-- ################################################################################################-->
                <div class="card text-left">
                    <div class="card-header">
                        <div class="card bg-primary text-white">
                            <h4>
                                <div class="card-body">สรุปผล (Summary Result)</div>
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                        <textarea class="form-control" rows="3" id="comment">       จากการปฏิบัติงานล้างเครื่องปรับอากาศของทีมช่าง ทีมที่1  หัวหน้าช่างณัตพงษ์ แก้วทา  ที่ศูนย์บริการทรีบรอดแบนด์(3BB) สาขาบึงสามพันสภาพการทำงานของเครื่องปรับอากาศคุณลูกค้า อยู่ในเกณฑ์ปกติการตรวจวัดค่าต่างๆ ทั้งก่อนและหลังล้างเป็นไปตาม ตารางที่แสดงข้างบน</textarea>
                        </div>
                    </div>
                </div>
<!-- ################################################################################################-->
                <div class="card text-left">
                    <div class="card-header">
                        <div class="card bg-primary text-white">
                            <h4>
                                <div class="card-body">ข้อเสนอแนะ (Suggestion)</div>
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                        <textarea class="form-control" rows="5" id="comment">
    • หมั่นตรวจสอบระบบระบายอากาศภายในห้องให้มีความเหมาะสมเพียงพอที่จะทำให้เกิดการหมุนเวียน อากาศบริสุทธิ์เข้ามาในห้องและดึงอากาศที่มีการปนเปื้อนออกนอกห้อง หากมีความจำเป็นให้ติดตั้งระบบกรองอากาศตามความเหมาะสม
    • ทำการปรับอุณหภูมิให้อยู่ในช่วงที่เหมาะสม เช่น การตั้งอุณหภูมิที่ 25 องศาเซลเซียส เพื่อช่วยลดความชื้นที่เกิดขึ้นภายในห้อง
    • หมั่นทำความสะอาดเฟอร์นิเจอร์ ผ้าห่มและพื้น เพื่อกำจัดฝุ่นละอองที่สะสมให้ลดปริมาณลง เพื่อป้องกันฝุ่นสะสมที่เครื่องปรับอากาศ</textarea>
                        </div>
                    </div>
                </div>
<!-- ################################################################################################-->
                <div class="card text-left">
                    <div class="card-header">
                        <div class="card bg-primary text-white">
                            <h4>
                                <div class="card-body">ภาพเปรียบเทียบ ก่อนและหลังล้าง (Comparision)</div>
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p>ก่อนล้าง</p>
                                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#addModal">เพิ่มภาพ</button><br>
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                </div>
                                <div class="col-sm-6">
                                    <p>หลังล้าง</p>
                                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#addModal">เพิ่มภาพ</button><br>
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                </div>
                                <div class="col-sm-6">
                                    <p>ภาพการปฏิบัติงาน</p>
                                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#addModal">เพิ่มภาพ</button><br>
                                </div>
                                <div class="col-sm-6">
                                    <p></p>
                                </div>
                                <div class="col-sm-6">
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                </div>
                                <div class="col-sm-6">
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                </div>
                                <div class="col-sm-6">
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                </div>
                                <div class="col-sm-6">
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                </div>
                                <div class="col-sm-6">
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                </div>
                                <div class="col-sm-6">
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                </div>
                                <div class="col-sm-6">
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                </div>
                                <div class="col-sm-6">
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!-- ################################################################################################-->
                <div class="container">
                <div class="row">
                <div class="col text-center">
                <button type="button" class="btn btn-success btn-lg far fa-file-pdf"> PRINT</button>
                </div>
                </div>
                </div>
<!-- ################################################################################################-->

            </div>
</div>
            
            <!-- End of Main Content -->

            <?php include 'includes/footer.php' ?>
<!-- ################################################################################################-->
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>