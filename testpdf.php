<?php
// <!-- ########################################-->
// 'D': download the PDF file
// 'I': serves in-line to the browser
// 'S': returns the PDF document as a string
// 'F': save as file $file_out
// <!-- ########################################-->
// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';
// $mpdf = new \Mpdf\Mpdf();
$mpdf =new \Mpdf\Mpdf([
	'mode' => 'utf-8' 
]);
$mpdf->use_kwt = true;
// ให้เราทำการ Dowload Font จากแหล่งต่าง ๆ แล้วนำไปเก็บไว้ที่โฟลเดอร์ ttfonts ครับ
// $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
// $fontData = $defaultFontConfig['fontdata'];
// $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp',
//     'fontdata' => $fontData + [
//             'sarabun' => [ // ส่วนที่ต้องเป็น lower case ครับ
//                 'R' => 'THSarabunNew.ttf',
//                 'I' => 'THSarabunNewItalic.ttf',
//                 'B' =>  'THSarabunNewBold.ttf',
//                 'BI' => "THSarabunNewBoldItalic.ttf",
//             ]
//         ],
// ]);
ob_start();
// <!-- ################################################################################################-->
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
$mpdf->WriteHTML('
	<style>
   .wikitable tbody tr th, table.jquery-tablesorter thead tr th.headerSort, .header-cell {
   background-color: #ff0000;
   color: white;
   font-family: "Courier New", Courier, "Lucida Sans Typewriter", "Lucida Typewriter", monospace;
   font-weight: bold;
   font-size: 13pt;
   }
   .wikitable, table.jquery-tablesorter {
   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
   }
   .tabela, .wikitable {
   border: 1px solid #A2A9B1;
   border-collapse: collapse; 
   }
   .tabela tbody tr td, .wikitable tbody tr td {
   padding: 5px 10px 5px 10px;
   border: 1px solid #A2A9B1;
   border-collapse: collapse;
   }
   .config-value {
   font-family: "Courier New", Courier, "Lucida Sans Typewriter", "Lucida Typewriter", monospace;
   font-size:13pt; 
   background: white; 
   font-weight: bold;
   }
</style>
<table class="wikitable tabela">
   <tr>
      <th colspan="4"> SY Report</th>
   </tr>
   <tr>
      <td style="text-align: center;"> Customer Name </td>
      <td class="config-value" colspan="3"> black </td>
   </tr>
   <tr>
      <td style="text-align: center;"> Instance Number</td>
      <td class="config-value"> 00 </td>
      <td style="text-align: center;"> System ID</td>
      <td class="config-value"> 500</td>
   </tr>
   <tr>
      <td style="text-align: center;"> Usuário</td>
      <td class="config-value"> 234234  </td>
      <td style="text-align: center;"> Senha</td>
      <td class="config-value"> dev@2543</td>
   </tr>
   <tr>
      <td style="text-align: center;"> Depósito</td>
      <td class="config-value"> AWS </td>
      <td style="text-align: center;">  Centro </td>
      <td class="config-value">  001</td>
   </tr>
   <tr>
      <td style="text-align: center;"> Sistema de Depósito</td>
      <td colspan="3" class="config-value">  WHY</td>
   </tr>
   <tr>
      <td style="text-align: center;">SAP Router</td>
      <td colspan="3" style="&quot;text-align:left;" class="config-value"></td>
   </tr>
</table>');
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

.myfixed {
    position: absolute;
    overflow: visible;
    left: 0;
    right: 0;
    width: 200mm;   /* you must specify a width */
    margin-top: center;
    margin-bottom: auto;
    margin-left: auto;
    margin-right: auto;
    border: 1px solid #000088;
    background-color: #EEDDFF;
}

</style>

<div class="myfixed">
Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
ridiculus mus. Donec mattis lacus ac purus feugiat semper. Donec aliquet nunc odio, vitae
pellentesque diam. Pellentesque sed velit lacus. Duis quis dui quis sem consectetur
sollicitudin. Cras dolor quam, dapibus et pretium sit amet, elementum vel arcu.
</div>');
// $mpdf->WriteHTML('<style>
// table {
// 	font-family: sans-serif;
// 	border: 7mm solid aqua;
// 	border-collapse: collapse;
// }
// table.table2 {
// 	border: 2mm solid aqua;
// 	border-collapse: collapse;
// }
// table.layout {
// 	border: 0mm solid black;
// 	border-collapse: collapse;
// }
// td.layout {
// 	text-align: center;
// 	border: 0mm solid black;
// }
// td {
// 	padding: 3mm;
// 	border: 2mm solid blue;
// 	vertical-align: middle;
// }
// td.redcell {
// 	border: 3mm solid red;
// }
// td.redcell2 {
// 	border: 2mm solid red;
// }
// </style>');
// <!-- ################################################################################################-->
// <!-- ################################################################################################-->
$file_name = 'SY_Report.pdf';
$mpdf->Output($file_name, 'D');
// <!-- ################################################################################################-->