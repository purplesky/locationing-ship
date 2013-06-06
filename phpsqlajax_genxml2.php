<?php 
include("phpsqlajax_dbinfo.php")
?>
<?php
function parseToXML($htmlStr) 
{ 
$xmlStr=str_replace('<','&lt;',$htmlStr); 
$xmlStr=str_replace('>','&gt;',$xmlStr); 
$xmlStr=str_replace('"','&quot;',$xmlStr); 
$xmlStr=str_replace("'",'&apos;',$xmlStr); 
$xmlStr=str_replace("&",'&amp;',$xmlStr); 
return $xmlStr; 
} 
// Opens a connection to a mySQL server
$connection=mysql_connect('localhost',$mysql_user,$mysql_password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}
// Set the active mySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}
///$ngay_gio=date('d/m/Y - g:i s A');
//echo $ngay_gio;
// Select all the rows in the markers table
$query = "SELECT * FROM dvtb_chitiet";
$result = mysql_query($query);
if (!$result)
{
  die('Invalid query: ' . mysql_error());
}
header("Content-type: text/xml");
// Start XML file, echo parent node
echo '<markers>';
// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  echo '<marker ';
  echo 'name="' . parseToXML( $row['MATAU']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
 // echo 'huonggio="' . $row['HUONGGIO'] . '" ';
  echo 'nhietdo="' . $row['NHIETDO'] . '" ';
  echo 'type="' . $row['type'] . '" ';
  echo '/>';
}
// End XML file
echo '</markers>';
?>