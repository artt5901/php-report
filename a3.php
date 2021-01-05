<?php
include ('includes/connect.php');
include('a1.php');
require_once __DIR__ . '/vendor/autoload.php';
// $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
// $fontData = $defaultFontConfig['fontdata'];
$mpdf = new \Mpdf\Mpdf([
    'format' => 'A4',
    'mode'   => 'utf-8',
    'default_font_size' => 15,
    'default_font' => 'sarabun',
]);
// <!-- ################################################################################################-->
// <!-- ################################################################################################-->
$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp',
    'fontdata' => $fontData + [
            'sarabun' => [ // ส่วนที่ต้องเป็น lower case ครับ
                'R' => 'THSarabunNew.ttf',
                'I' => 'THSarabunNewItalic.ttf',
                'B' => 'THSarabunNewBold.ttf',
                'BI' => 'THSarabunNewBoldItalic.ttf',
            ],
            'kanit' => [ // ส่วนที่ต้องเป็น lower case ครับ
                'R' => 'Kanit-Regular.ttf',
                'I' => 'Kanit-Italic.ttf',
                'B' => 'Kanit-Bold.ttf',
            ]
        ],
    'format' => 'A4',
    'mode'   => 'utf-8',
]);
// <!-- ################################################################################################-->
// <!-- ################################################################################################-->
// <!-- ########################################-->
// 'D': download the PDF file
// 'I': serves in-line to the browser
// 'S': returns the PDF document as a string
// 'F': save as file $file_out
// <!-- ########################################-->
// <!-- ################################################################################################-->
// <!-- ################################################################################################-->
//TEST METHODS##########################################################################################-->
// <!-- ################################################################################################-->
$mpdf->SetHeader('
<table width="100%">
    <tr>
        <td width="33%">{DATE j-m-Y}</td>
        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">SY ElectricSystem</td>
    </tr>
</table>');
// <!-- ################################################################################################-->
$mpdf->SetFooter('
<table width="100%">
    <tr>
        <td width="33%">{DATE j-m-Y}</td>
        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">SY ElectricSystem</td>
    </tr>
</table>');
// <!-- ################################################################################################-->
$mpdf->WriteHTML('<style>
   .testtable {
    background: #000000;
    width: 180mm;
   }
   .config-value3 {
   font-family: "sarabun";
   font-size:15pt;
   background: #FFFFFF;
   }
   .config-value4 {
   font-family: "sarabun";
   font-size:15pt;
   background: #A2A9B1;
   }
   .config-value5 {
   font-family: "kanit";
   font-size:13pt;
   text-align: center;
   }
</style>
<table class="testtable">
   <tr>
      <td colspan="3" style="background: #FA5E05 " class="config-value5"> รายงานสรุปผลการล้างแอร์ (Air Conditioner Checking and Cleaning Summary Report) </td>
   </tr>
   <tr>
      <td colspan="2" width:50% style="background: #EAA47D " class="config-value5"> รายละเอียด </td>
      <td rowspan="9 width:50%"><img src="uploads/ho.jpg" alt="" height=300 width=350></img></td>
   </tr>
   <tr>
      <td class="config-value4" style="text-align: left;"> ชื่อลูกค้า: </td>
      <td class="config-value3" style="text-align: left; width:30%">' . $_POST['name_txt'] . '</td>
   </tr>
   <tr>
      <td class="config-value4" style="text-align: left;"> เลขที่ใบงาน: </td>
      <td class="config-value3" style="text-align: left; width:30%">' . $_POST['num_txt'] . '</td>
   </tr>
   <tr>
      <td class="config-value4" style="text-align: left;"> วันที่ปฏิบัติงาน: </td>
      <td class="config-value3" style="text-align: left; width:30%">' . $_POST['day_txt'] . '</td>
   </tr>
   <tr>
      <td class="config-value4" style="text-align: left;"> หัวหน้าทีมช่างที่รับผิดชอบ: </td>
      <td class="config-value3" style="text-align: left; width:30%">' . $_POST['boss_txt'] . '</td>
   </tr>
   <tr>
      <td class="config-value4" style="text-align: left;"> ยี่ห้อเครื่องปรับอากาศ: </td>
      <td class="config-value3" style="text-align: left; width:30%">' . $_POST['brand_txt'] . '</td>
   </tr>
   <tr>
      <td class="config-value4" style="text-align: left;"> รหัสรุ่น: </td>
      <td class="config-value3" style="text-align: left; width:30%">' . $_POST['code_txt'] . '</td>
   </tr>
   <tr>
      <td class="config-value4" style="text-align: left;"> ขนาด BTU: </td>
      <td class="config-value3" style="text-align: left; width:30%">' . $_POST['size_txt'] . '</td>
  </tr>
   <tr>
      <td class="config-value4" style="text-align: left;"> ประเภทน้ำยาทำความเย็น: </td>
      <td class="config-value3" style="text-align: left; width:30%">' . $_POST['type_txt'] . '</td>
   </tr>
   </table>');
// <!-- ################################################################################################-->
// <!-- ################################################################################################-->

$mpdf->WriteHTML('
  <style>
   .testtable2 {
    background: #000000;
    width: 180mm;
   }
   .config-value6 {
   font-family: "sarabun";
   font-size:15pt; 
   background: #A2A9B1;
   }
   .config-value5 {
   font-family: "kanit";
   font-size:13pt;
   text-align: center;
   }
   .config-value8 {
   font-family: "sarabun";
   font-size:15pt;
   background: #FFFFFF;
   }
</style>

<table class="testtable2">
   <tr>
      <td colspan="2" style="background: #FA5E05 " class="config-value5"> ภาพรวม (Overview) </td>
   </tr>
   <tr>
      <td class="config-value5" style="text-align: center; background: #EAA47D width:80%"> หัวข้อ: </td>
      <td class="config-value5" style="text-align: center; background: #EAA47D width:20%"> สถานะ: </td>
   </tr>
   <tr>
      <td class="config-value6" style="text-align: left; width:80%">• ผลการตรวจสอบก่อนการล้าง สภาพทางกายภาพของเครื่องปรับอากาศ คอยล์ร้อน/เย็น อยู่ในเกณฑ์</td>
      <td class="config-value8" style="text-align: center; width:20%">ไม่ปกติ</td>
   </tr>
   <tr>
      <td class="config-value6" style="text-align: left; width:80%">• ผลการตรวจสอบก่อนการล้าง ปริมาณฝุ่นที่สะสมอยู่ในคอยล์เย็น อยู่ในเกณฑ์</td>
      <td class="config-value8" style="text-align: center; width:20%">ไม่ปกติ</td>
   </tr>
   <tr>
      <td class="config-value6" style="text-align: left; width:80%">• ผลการตรวจสอบ สภาพการทำงานของคอยล์เย็น หลังล้าง อยู่ในเกณฑ์</td>
      <td class="config-value8" style="text-align: center; width:20%">ไม่ปกติ</td>
   </tr>
   <tr>
      <td class="config-value6" style="text-align: left; width:80%">• ผลการตรวจสอบ สภาพการทำงานของคอยล์ร้อน หลังล้าง อยู่ในเกณฑ์</td>
      <td class="config-value8" style="text-align: center; width:20%">ไม่ปกติ</td>
   </tr>
   <tr>
      <td class="config-value6" style="text-align: left; width:80%">• ผลการตรวจสอบ การทำอุณหภูมิ หลังล้าง ทำอุณหภูมิได้ อยู่ในเกณฑ์</td>
      <td class="config-value8" style="text-align: center; width:20%">ไม่ปกติ</td>
   </tr>
   <tr>
      <td class="config-value6" style="text-align: left; width:80%">• ผลการตรวจสอบ แรงลมของพัดลมที่คอยล์เย็น หลังล้าง อยู่ในเกณฑ์</td>
      <td class="config-value8" style="text-align: center; width:20%">ไม่ปกติ</td>
   </tr>
   <tr>
      <td class="config-value6" style="text-align: left; width:80%">• ผลการตรวจสอบ แรงดันน้ำยาทำความเย็น หลังล้าง อยู่ในเกณฑ์</td>
      <td class="config-value8" style="text-align: center; width:20%">ไม่ปกติ</td>
   </tr>
</table>');
// <!-- ################################################################################################-->
$mpdf->WriteHTML('
  <style>
   .testtable3 {
    background: #000000;
    width: 180mm;
   }
   .config-value6 {
   font-family: "sarabun";
   font-size:15pt; 
   background: #A2A9B1;
   }
   .config-value5 {
   font-family: "kanit";
   font-size:13pt;
   text-align: center;
   }
   .config-value8 {
   font-family: "sarabun";
   font-size:15pt;
   background: #FFFFFF
   }
</style>
<table class="testtable3">
   <tr>
      <td colspan="3" style="background: #FA5E05 " class="config-value5"> ผลการวัดก่อนล้าง และหลังล้าง (Checking Result) </td>
   </tr>
   <tr>
      <td class="config-value5" style="text-align: center; background: #EAA47D width:60%"> รายการ: </td>
      <td class="config-value5" style="text-align: center; background: #EAA47D width:20%"> สถานะ: </td>
      <td class="config-value5" style="text-align: center; background: #EAA47D width:20%"> สถานะ: </td>
   </tr>
   <tr>
      <td class="config-value6" style="text-align: left; width:60%">ตรวจสอบอุณหภูมิหน้าเครื่อง (°C)</td>
      <td class="config-value8" style="text-align: center; width:20%">123.00</td>
      <td class="config-value8" style="text-align: center; width:20%">123.00</td>
   </tr>
   <tr>
      <td class="config-value6" style="text-align: left; width:60%">ตรวจสอบแรงลมหน้าเครื่อง (เมตร/วินาที)</td>
      <td class="config-value8" style="text-align: center; width:20%">123.00</td>
      <td class="config-value8" style="text-align: center; width:20%">123.00</td>
   </tr>
   <tr>
      <td class="config-value6" style="text-align: left; width:60%">ตรวจสอบแรงดันน้ำยาแอร์ (PSI.)</td>
      <td class="config-value8" style="text-align: center; width:20%">123.00</td>
      <td class="config-value8" style="text-align: center; width:20%">123.00</td>
   </tr>
   <tr>
      <td class="config-value6" style="text-align: left; width:60%">ตรวจสอบกระแสไฟของคอมเพรสเซอร์</td>
      <td class="config-value8" style="text-align: center; width:20%">123.00</td>
      <td class="config-value8" style="text-align: center; width:20%">123.00</td>
   </tr>
</table>');
// <!-- ################################################################################################-->
$mpdf->AddPage();
// <!-- ################################################################################################-->
$mpdf->WriteHTML('
  <style>
  .testtable4 {
    background: #000000;
    width: 180mm;
   }
   .config-value6 {
   font-family: "sarabun";
   font-size:14pt; 
   background: #A2A9B1;
   }
   .config-value5 {
   font-family: "kanit";
   font-size:13pt;
   text-align: center;
   }
</style>
<table class="testtable4">
   <tr>
      <td colspan="1" style="background: #FA5E05 " class="config-value5"> ข้อเสนอแนะ (Suggestion) </td>
   </tr>
   <tr>
      <td class="config-value6" style="text-align: left;  width:100%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จากการปฏิบัติงานล้างเครื่องปรับอากาศของทีมช่าง ทีมที่ 1 หัวหน้าทีมซักทีมนึง ที่ศูนย์บริการทรีบรอดแบนด์(3BB) สาขาบึงสามพันสภาพการทำงานของเครื่องปรับอากาศคุณลูกค้า อยู่ในเกณฑ์ปกติการตรวจวัดค่าต่างๆ ทั้งก่อนและหลังล้างเป็นไปตาม ตารางที่แสดงข้างบน</td>
   </tr>
   <tr>
      <td colspan="1" style="background: #FA5E05 " class="config-value5"> สรุปผล (Summary Result) </td>
   </tr>
   <tr>
      <td class="config-value6" style="text-align: left;  width:100%">• หมั่นตรวจสอบระบบระบายอากาศภายในห้องให้มีความเหมาะสมเพียงพอที่จะทำให้เกิดการหมุนเวียน อากาศบริสุทธิ์เข้ามาในห้องและดึงอากาศที่มีการปนเปื้อนออกนอกห้อง หากมีความจำเป็นให้ติดตั้งระบบกรองอากาศตามความเหมาะสม<br>
    • ทำการปรับอุณหภูมิให้อยู่ในช่วงที่เหมาะสม เช่น การตั้งอุณหภูมิที่ 25 องศาเซลเซียส เพื่อช่วยลดความชื้นที่เกิดขึ้นภายในห้อง<br>
    • หมั่นทำความสะอาดเฟอร์นิเจอร์ ผ้าห่มและพื้น เพื่อกำจัดฝุ่นละอองที่สะสมให้ลดปริมาณลง เพื่อป้องกันฝุ่นสะสมที่เครื่องปรับอากาศ</td>
   </tr>
</table>');
// <!-- ################################################################################################-->
$mpdf->SetHeader('
<table width="100%">
    <tr>
        <td width="33%">{DATE j-m-Y}</td>
        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">SY ElectricSystem</td>
    </tr>
</table>');
// <!-- ################################################################################################-->
$mpdf->AddPage();
// <!-- ################################################################################################-->
$mpdf->SetFooter('
<table width="100%">
    <tr>
        <td width="33%">{DATE j-m-Y}</td>
        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">SY ElectricSystem</td>
    </tr>
</table>');
// <!-- ################################################################################################-->
$mpdf->WriteHTML('<style>
.tagban {
   font-family: "kanit";
   font-size:13pt;
   text-align: center;
}
</style>
<div class="tagban" style="background: #FA5E05 ">
ภาพผลงานการล้างแอร์
</div>');
// // <!-- ################################################################################################-->
// <!-- ################################################################################################-->
$file_name = 'Test_Post_method.pdf';
$mpdf->Output($file_name, 'D');
exit;
// <!-- ################################################################################################-->
// <!-- ################################################################################################-->