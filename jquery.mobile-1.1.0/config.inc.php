<?
$host = "localhost";
$user = "root";
$pass = "1234";

$condb= mysql_connect($host,$user,$pass);  //สร้างการเชื่อมต่อฐานข้อมูลเก็บไว้ในตัวแปร $condb
define(titlename,"(-.-) @@@ บริษัทท่าทรายตรัง จำกัด @@@ (-.-)");
if(!$condb)
{
   echo "ไม่สามารถติดต่อฐานข้อมูล MySQL ได้";
}	

$dbname = "dbsand";
mysql_select_db($dbname,$condb) or die("ไม่สามารถใช้ฐานข้อมูล $dbname ได้");
mysql_query("set names utf8");
?>