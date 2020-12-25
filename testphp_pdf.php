<?php
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp',
    'fontdata' => $fontData + [
            'sarabun' => [ // ส่วนที่ต้องเป็น lower case ครับ
                'R' => 'THSarabunNew.ttf',
                'I' => 'THSarabunNewItalic.ttf',
                'B' =>  'THSarabunNewBold.ttf',
                'BI' => "THSarabunNewBoldItalic.ttf",
            ]
        ],
]);

$mpdf->SetHeader('
<table width="100%">
    <tr>
        <td width="33%">{DATE j-m-Y}</td>
        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">SY ElectricSystem</td>
    </tr>
</table>');

$mpdf->SetFooter('
<table width="100%">
    <tr>
        <td width="33%">{DATE j-m-Y}</td>
        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">SY ElectricSystem</td>
    </tr>
</table>');

$mpdf->WriteHTML('<style>
.tagban {
    position: absolute;
    overflow: visible;
    left: 0;
    right: 0;
    width: 180mm;   /* you must specify a width */
    margin-top: center;
    margin-bottom: auto;
    margin-left: auto;
    margin-right: auto;
    text-align: left;
    border: 1px solid #000000;
    background-color: #EE8E4C;
    font-family: sarabun;
    font-size: 20pt;
}
</style>
<div class="tagban">
รายงานสรุปผลการล้างแอร์
</div>
<style>
   .testtable {
    background: #FF7000;
    border: 4px;
    border-collapse: collapse;
    width: 180mm;
   }
   .config-value2 {
   font-family: "sarabun";
   font-size:15pt; 
   background: #A2A9B1;
   }
</style>
<br><br><table class="testtable">
   <tr>
      <th colspan="4"> SY Report</th>
   </tr>
   <tr>
      <td class="config-value2" style="text-align: left;"> ชื่อลูกค้า: </td>
      <td class="config-value2" style="text-align: left;"> Sample </td>
      <td class="config-value2" style="text-align: left;"> ยี่ห้อเครื่องปรับอากาศ: </td>
      <td class="config-value2" style="text-align: left;"> Sample </td>
   </tr>
   <tr>
      <td class="config-value2" style="text-align: left;"> เลขที่ใบงาน: </td>
      <td class="config-value2" style="text-align: left;"> 01234 </td>
      <td class="config-value2" style="text-align: left;"> รหัสรุ่น: </td>
      <td class="config-value2" style="text-align: left;"> 01234 </td>
   </tr>
   <tr>
      <td class="config-value2" style="text-align: left;"> วันที่ปฏิบัติงาน: </td>
      <td class="config-value2"> dd/mm/yy </td>
      <td class="config-value2" style="text-align: left;"> ขนาด BTU: </td>
      <td class="config-value2"> Sample </td>
   </tr>
   <tr>
      <td class="config-value2" style="text-align: left;"> หัวหน้าทีมช่างที่รับผิดชอบ: </td>
      <td class="config-value2"> Sample </td>
      <td class="config-value2" style="text-align: left;"> ประเภทน้ำยาทำความเย็น: </td>
      <td class="config-value2"> Sample </td>
   </tr>
</table>
');


// $mpdf->WriteHTML('<br><columns column-count="3" vAlign="J" column-gap="7" /><br>');

// $mpdf->WriteHTML('Some text...<br>');

// $mpdf->WriteHTML('<columnbreak />');

// $mpdf->WriteHTML('Next column...<br>');

// $menuitem = 'Chilli con carne <dottab />&amp; nbsp; £7.95';

// $mpdf->WriteHTML($menuitem);
// $mpdf->WriteHTML('<style>
//    .wikitable tbody tr th, table.jquery-tablesorter thead tr th.headerSort, .header-cell {
//    background-color: #FF7000;
//    color: FF7000;
//    font-family: "Courier New", Courier, "Lucida Sans Typewriter", "Lucida Typewriter", monospace;
//    font-weight: bold;
//    font-size: 13pt;
//    }
//    .wikitable, table.jquery-tablesorter {
//    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
//    }
//    .tabela, .wikitable {
//    border: 1px solid #A2A9B1;
//    border-collapse: collapse; 
//    }
//    .tabela tbody tr td, .wikitable tbody tr td {
//    padding: 5px 10px 5px 10px;
//    border: 3px solid #A2A9B1;
//    border-collapse: collapse;
//    }
//    .config-value {
//    font-family: "Courier New", Courier, "Lucida Sans Typewriter", "Lucida Typewriter", monospace;
//    font-size:13pt; 
//    background: white; 
//    font-weight: bold;
//    }
//    .config-value2 {
//    font-family: "sarabun";
//    font-size:15pt; 
//    background: #A2A9B1;
//    }
// </style>');
// <!-- ################################################################################################-->
$mpdf->WriteHTML('
  <style>
   .testtable2 {
    background: #FF7000;
    border: 4px;
    border-collapse: collapse;
   }
   .config-value3 {
   font-family: "sarabun";
   font-size:15pt; 
   background: #A2A9B1;
   }
</style>
<br><br><table class="testtable2">
   <tr>
      <th colspan="4"> SY Report</th>
   </tr>
   <tr>
      <td class="config-value3" style="text-align: left;"> ชื่อลูกค้า: </td>
      <td class="config-value3" style="text-align: left;"> Sample </td>
      <td class="config-value3" style="text-align: left;"> ยี่ห้อเครื่องปรับอากาศ: </td>
      <td class="config-value3" style="text-align: left;"> Sample </td>
   </tr>
   <tr>
      <td class="config-value3" style="text-align: left;"> เลขที่ใบงาน: </td>
      <td class="config-value3" style="text-align: left;"> 01234 </td>
      <td class="config-value3" style="text-align: left;"> รหัสรุ่น: </td>
      <td class="config-value3" style="text-align: left;"> 01234 </td>
   </tr>
   <tr>
      <td class="config-value3" style="text-align: left;"> วันที่ปฏิบัติงาน: </td>
      <td class="config-value3"> dd/mm/yy </td>
      <td class="config-value3" style="text-align: left;"> ขนาด BTU: </td>
      <td class="config-value3"> Sample </td>
   </tr>
   <tr>
      <td class="config-value3" style="text-align: left;"> หัวหน้าทีมช่างที่รับผิดชอบ: </td>
      <td class="config-value3"> Sample </td>
      <td class="config-value3" style="text-align: left;"> ประเภทน้ำยาทำความเย็น: </td>
      <td class="config-value3"> Sample </td>
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

$mpdf->AddPage();

$mpdf->SetFooter('
<table width="100%">
    <tr>
        <td width="33%">{DATE j-m-Y}</td>
        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">SY ElectricSystem</td>
    </tr>
</table>');

$mpdf->WriteHTML('<style>
.tagban {
    position: absolute;
    overflow: visible;
    left: 0;
    right: 0;
    width: 180mm;   /* you must specify a width */
    margin-top: center;
    margin-bottom: auto;
    margin-left: auto;
    margin-right: auto;
    text-align: left;
    border: 2px solid #000000;
    background-color: #EE8E4C;
    font-family: sarabun;
    font-size: 20pt;
}
</style>
<div class="tagban">
ภาพผลงานการล้างแอร์
</div>');

// <!-- ################################################################################################-->
// <!-- ################################################################################################-->
$file_name = 'Test_Report.pdf';
$mpdf->Output($file_name, 'D');
// <!-- ################################################################################################-->