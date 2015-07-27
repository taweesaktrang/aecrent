<? 
session_start();
include ("config.ini.php");
include("thaipdfclass.php");

$pdf=new ThaiPDF('P','mm','A4');
$pdf->SetThaiFont();
$pdf->SetLeftMargin(0);
$pdf->SetRightMargin(0);
$pdf->SetTopMargin(0);
$pdf->SetTextColor(0,0,0);

$pdf->AddPage();

$pdf->SetFont('AngsanaNew','B',18);

$row=8;
$col=0;

$pdf->SetXY(0,$row);

$pdf->Cell(0,0,conv('อ่าวนางอีโคอินน์'),0,0,'C');

$pdf->SetFont('AngsanaNew','',16);
if ($yeehorid=="-") {
	$txttype = "ทั้งหมด";
} else {
	$mysql = "SELECT tblyeehor.yeehorname FROM tblyeehor ";
	$mysql = $mysql." WHERE tblyeehor.yeehorid = '".$yeehorid."' ";
	$myrs = mysql_query($mysql) or die(mysql_error());
	$item = mysql_fetch_assoc($myrs);
	$txttype = " ยี่ห้อ ".$item['yeehorname'];
}

$row=$row+7;
$col=0;
$pdf->SetXY(0,$row);
$txt='รายงานแสดงรายการรถจักรยานยนต์'.$txttype;
$pdf->Cell(0,0,conv($txt),0,0,'C');
$pdf->SetFont('AngsanaNew','',14);

	$ln_row_start=$row+9;

	$pdf->Line(6,24,206,24);
	$ln_row_start=$ln_row_start+7;
	$pdf->Line(6,31,206,31);

$row=$row+12;
$pdf->SetXY($col+12,$row);
$pdf->SetFont('AngsanaNew','B',14);

	$txt_row_start=$row+1;
// บรรทัดที่ 70-79 เป็นคำสั่งที่ใช้กำหนดตำแหน่งและแสดงข้อความหัวข้อของรายงานในแต่ละช่อง
	$pdf->SetXY(10,$txt_row_start);
	$pdf->Cell(5,0,conv('ลำดับที่'),0,0,'C');
	$pdf->SetXY(26,$txt_row_start);
	$pdf->Cell(5,0,conv('เลขทะเบียน'),0,0,'C');
	$pdf->SetXY(50,$txt_row_start);
	$pdf->Cell(5,0,conv('เลขเครื่องยนต์'),0,0,'C');
	$pdf->SetXY(85,$txt_row_start);
	$pdf->Cell(5,0,conv('รุ่น'),0,0,'C');
	$pdf->SetXY(120,$txt_row_start);
	$pdf->Cell(5,0,conv('ยี่ห้อ'),0,0,'C');
	$pdf->SetXY(150,$txt_row_start);
	$pdf->Cell(5,0,conv('ประเภท'),0,0,'C');
	$pdf->SetXY(180,$txt_row_start);
	$pdf->Cell(5,0,conv('สี'),0,0,'C');

$mysql = "SELECT tblmotorcy.*,tbltype.typename,tblmodel.modelname,tblcolor.colorname,tblyeehor.yeehorname FROM tblmotorcy Inner Join tbltype ON tblmotorcy.typeid = tbltype.typeid Inner Join tblmodel ON tblmotorcy.modelid = tblmodel.modelid Inner Join tblcolor ON tblmotorcy.colorid = tblcolor.colorid Inner Join tblyeehor ON tblmotorcy.yeehorid = tblyeehor.yeehorid ";
if ($yeehorid!="-") {
	$mysql = $mysql." WHERE tblmotorcy.yeehorid = '".$yeehorid."' ";
}

$myrs = mysql_query($mysql) or die(mysql_error());

	$i=1;
	$cnt =  0;
	$total = 0;
	$ntotal = 0;
	while($row=mysql_fetch_assoc($myrs)){			
			$txt_row_start = $txt_row_start + 6;
			$pdf->SetXY(8,$txt_row_start);
			$pdf->Cell(10,0,$i++,0,0,'C');
			$pdf->SetXY(24,$txt_row_start);
			$pdf->Cell(40,0,conv($row['registerno']),0,0,'L');
			$pdf->SetXY(40,$txt_row_start);
			$pdf->Cell(20,0,conv($row['machineno']),0,0,'L');
			$pdf->SetXY(70,$txt_row_start);
			$pdf->Cell(20,0,conv($row['modelname']),0,0,'L');
			$pdf->SetXY(110,$txt_row_start);
			$pdf->Cell(20,0,$row['yeehorname'],0,0,'R');
			$pdf->SetXY(146,$txt_row_start);
			$pdf->Cell(20,0,conv($row['typename']),0,0,'R');
			$pdf->SetXY(170,$txt_row_start);
			$pdf->Cell(20,0,conv($row['colorname']),0,0,'R');
			$i++;
	}
	$row_line = $txt_row_start + 3;

	//$pdf->Line(6,$row_line,206,$row_line);
	//$pdf->SetFont('AngsanaNew','B',14);
	//$pdf->SetXY(84,$txt_row_start+6);
	//$pdf->Cell(20,0,conv('ยอดรวมทั้งสิ้น'),0,0,'L');
	//$pdf->SetXY(134,$txt_row_start+6);
	//$pdf->Cell(20,0,$cnt,0,0,'R');
	//$pdf->SetXY(160,$txt_row_start+6);
	//$pdf->Cell(20,0,number_format($total,2),0,0,'R');
	//$pdf->SetXY(180,$txt_row_start+6);
	//$pdf->Cell(20,0,number_format($ntotal,2),0,0,'R');
	$row_line = $txt_row_start + 9;
	$pdf->Line(6,$row_line,206,$row_line);
	
$pdf->Output();

function conv($string) {
return iconv('UTF-8', 'TIS-620', $string);
}

?>