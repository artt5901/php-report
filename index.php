<?php include 'includes/connect.php' ?>
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

    <!-- Bootstrap datepick -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.th.min.js" integrity="sha512-cp+S0Bkyv7xKBSbmjJR0K7va0cor7vHYhETzm2Jy//ZTQDUvugH/byC4eWuTii9o5HN9msulx2zqhEXWau20Dg==" crossorigin="anonymous"></script> -->

    <!-- <script>
        $(document).ready(function () {
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: true,
                language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
                thaiyear: true              //Set เป็นปี พ.ศ.
            }).datepicker("setDate", "0");  //กำหนดเป็นวันปัจุบัน
        });
    </script> -->

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
            <div class="col-lg-12">
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
                            <!-- <h1>Grid Example</h1>
            <p>This example demonstrates a 50%/50% split on small, medium, large and xlarge devices. On extra small devices, it will stack (100% width).</p>      
            <p>Resize the browser window to see the effect.</p>  -->
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
                                                format: 'dd/mmmm/yyyy',
                                            });
                                        </script>

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="usr">ขนาดBTU : </label>
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
                        <!-- <h5 class="card-title">Special title treatment</h5> -->
                        <table class="table table-bordered table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">หัวข้อ</th>
                                    <th scope="col">สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>• ผลการตรวจสอบก่อนการล้าง ปริมาณฝุ่นที่สะสมอยู่ในคอยล์เย็น อยู่ในเกณฑ์</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                เลือกสถานะ
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Link 1</a>
                                                <a class="dropdown-item" href="#">Link 2</a>
                                                <a class="dropdown-item" href="#">Link 3</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>• ผลการตรวจสอบก่อนการล้าง สภาพทางกายภาพของเครื่องปรับอากาศ คอยล์ร้อน/เย็น อยู่ในเกณฑ์</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                เลือกสถานะ
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Link 1</a>
                                                <a class="dropdown-item" href="#">Link 2</a>
                                                <a class="dropdown-item" href="#">Link 3</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>• ผลการตรวจสอบ สภาพการทำงานของคอยล์เย็น หลังล้าง อยู่ในเกณฑ์</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                เลือกสถานะ
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Link 1</a>
                                                <a class="dropdown-item" href="#">Link 2</a>
                                                <a class="dropdown-item" href="#">Link 3</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>• ผลการตรวจสอบ สภาพการทำงานของคอยล์ร้อน หลังล้าง อยู่ในเกณฑ์</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                เลือกสถานะ
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Link 1</a>
                                                <a class="dropdown-item" href="#">Link 2</a>
                                                <a class="dropdown-item" href="#">Link 3</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>• ผลการตรวจสอบ การทำอุณหภูมิ หลังล้าง ทำอุณหภูมิได้ อยู่ในเกณฑ์</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                เลือกสถานะ
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Link 1</a>
                                                <a class="dropdown-item" href="#">Link 2</a>
                                                <a class="dropdown-item" href="#">Link 3</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>• ผลการตรวจสอบ แรงลมของพัดลมที่คอยล์เย็น หลังล้าง อยู่ในเกณฑ์</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                เลือกสถานะ
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Link 1</a>
                                                <a class="dropdown-item" href="#">Link 2</a>
                                                <a class="dropdown-item" href="#">Link 3</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>• ผลการตรวจสอบ แรงดันน้ำยาทำความเย็น หลังล้าง อยู่ในเกณฑ์</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                เลือกสถานะ
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Link 1</a>
                                                <a class="dropdown-item" href="#">Link 2</a>
                                                <a class="dropdown-item" href="#">Link 3</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- ################################################################################################-->
                <div class="card text-left">
                    <div class="card-header">
                        <div class="card bg-primary text-white">
                            <h4>
                                <div class="card-body">ผลการวัดก่อน และหลังล้าง (Checking Result)</div>
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- <h5 class="card-title">Special title treatment</h5> -->
                        <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                        <table class="table table-bordered table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">รายการ</th>
                                    <th scope="col">ก่อนล้าง</th>
                                    <th scope="col">หลังล้าง</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>ตรวจสอบอุณหภูมิหน้าเครื่อง (°C)</td>
                                    <td><input type="text" class="form-control" id="usr"></td>
                                    <td><input type="text" class="form-control" id="usr"></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>ตรวจสอบแรงลมหน้าเครื่อง (เมตร/วินาที)</td>
                                    <td><input type="text" class="form-control" id="usr"></td>
                                    <td><input type="text" class="form-control" id="usr"></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>ตรวจสอบแรงดันน้ำยาแอร์ (PSI.)</td>
                                    <td><input type="text" class="form-control" id="usr"></td>
                                    <td><input type="text" class="form-control" id="usr"></td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>ตรวจสอบกระแสไฟของคอมเพรสเซอร์. (A)</td>
                                    <td><input type="text" class="form-control" id="usr"></td>
                                    <td><input type="text" class="form-control" id="usr"></td>
                                </tr>
                            </tbody>
                        </table>
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
                        <!-- <h5 class="card-title">Special title treatment</h5> -->
                        <span style="padding-left:50px">จากการปฏิบัติงานล้างเครื่องปรับอากาศของทีมช่าง ทีมที่1 หัวหน้าช่างณัตพงษ์ แก้วทา ที่ศูนย์บริการทรีบรอดแบนด์(3BB) สาขาบึงสามพัน</span>
                        <!-- <p class="card-text">จากการปฏิบัติงานล้างเครื่องปรับอากาศของทีมช่าง ทีมที่1  หัวหน้าช่างณัตพงษ์ แก้วทา  ที่ศูนย์บริการทรีบรอดแบนด์(3BB) สาขาบึงสามพัน</p> -->
                        <p class="card-text">สภาพการทำงานของเครื่องปรับอากาศคุณลูกค้า อยู่ในเกณฑ์ปกติการตรวจวัดค่าต่างๆ ทั้งก่อนและหลังล้างเป็นไปตาม ตารางที่ 1 แสดงดังตางรางข้างบน</p>
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
                        <!-- <h5 class="card-title">Special title treatment</h5> -->
                        <p class="card-text">• หมั่นตรวจสอบระบบระบายอากาศภายในห้องให้มีความเหมาะสมเพียงพอที่จะทำให้เกิดการหมุนเวียน อากาศบริสุทธิ์เข้ามาในห้องและดึงอากาศ</p>
                        <p class="card-text">ที่มีการปนเปื้อนออกนอกห้อง หากมีความจำเป็นให้ติดตั้งระบบกรองอากาศตามความเหมาะสม</p>
                        <p class="card-text">• ทำการปรับอุณหภูมิให้อยู่ในช่วงที่เหมาะสม เช่น การตั้งอุณหภูมิที่ 25 องศาเซลเซียส เพื่อช่วยลดความชื้นที่เกิดขึ้นภายในห้อง</p>
                        <p class="card-text">• หมั่นทำความสะอาดเฟอร์นิเจอร์ ผ้าห่มและพื้น เพื่อกำจัดฝุ่นละอองที่สะสมให้ลดปริมาณลง เพื่อป้องกันฝุ่นสะสมที่เครื่องปรับอากาศ</p>
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
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                </div>
                                <div class="col-sm-6">
                                    <p>หลังล้าง</p>
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                    <img src="..." class="rounded float-left" alt="..."><br>
                                </div>
                                <div class="col-sm-6">
                                    <p>ภาพการปฏิบัติงาน</p>
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
                        <!-- <h5 class="card-title">Special title treatment</h5> -->
                        <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                    </div>
                </div>
                <!-- ################################################################################################-->
                <!-- <div class="row">
            <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            </div>
            </div>
            <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            </div>
            </div>
            </div> -->
                <!-- ################################################################################################-->
                <button type="button" class="btn btn-success btn-lg btn-block far fa-file-pdf"> PRINT</button>
                <!-- ################################################################################################-->
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