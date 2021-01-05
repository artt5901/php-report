<?php
include 'includes/connect.php';
if(isset($_POST["refrig_id"]))
{
$query = $db->prepare("SELECT * FROM sy_refrig WHERE r_id = '".$_POST["refrig_id"]."'");
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);
echo json_encode($row);
}
?>