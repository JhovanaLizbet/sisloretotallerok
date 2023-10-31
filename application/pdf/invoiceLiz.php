<?php
	
	$peticion_ajax=true;
	$code=(isset($_GET['code'])) ? $_GET['code'] : 0;

	/*---------- Incluyendo configuraciones ----------*/
	require_once "../../config/app.php";
    require_once "../../autoload.php";
	require_once "../../app/controllers/literal.php";

	/*---------- Instancia al controlador venta ----------*/
	use app\controllers\saleController;
	$ins_venta = new saleController();

	$datos_venta=$ins_venta->seleccionarDatos("Normal","venta INNER JOIN cliente ON venta.cliente_id=cliente.cliente_id INNER JOIN usuario ON venta.usuario_id=usuario.usuario_id INNER JOIN caja ON venta.caja_id=caja.caja_id WHERE (venta_codigo='$code')","*",0);

	if($datos_venta->rowCount()==1){

		/*---------- Datos de la venta ----------*/
		$datos_venta=$datos_venta->fetch();

		/*---------- Seleccion de datos de la empresa ----------*/
		$datos_empresa=$ins_venta->seleccionarDatos("Normal","empresa LIMIT 1","*",0);
		$datos_empresa=$datos_empresa->fetch();


		require "./code128.php";	

		$pdf = new PDF_Code128('P','mm','Letter');
		$pdf->SetMargins(17,17,17);
		$pdf->AddPage();
		$pdf->Image(APP_URL.'app/views/img/loretosin.png',15,12,35,35,'PNG');
		$pdf->Ln(5);

		$pdf->SetFont('Arial','B',13);
		$pdf->SetTextColor(32,100,210);
	    $pdf->Cell(185,0,iconv("UTF-8", "ISO-8859-1",strtoupper('ESCUELA DE NATACION')),0,0,'C');
		$pdf->Ln(4);
		
		$pdf->SetFont('Arial','B',12);
		$pdf->SetTextColor(32,100,210);
	    $pdf->Cell(185,2,iconv("UTF-8", "ISO-8859-1",strtoupper('CENTRO ACUATICO LORETO')),0,0,'C');
	    $pdf->Ln(5);
		
		$pdf->SetFont('Arial','B',10);
		$pdf->SetTextColor(32,100,210);
	    $pdf->Cell(185,2,iconv("UTF-8", "ISO-8859-1",strtoupper('Calle Nicacio Rios # 797 Zona Loreto')),0,0,'C');
	    $pdf->Ln(5);
		
		$pdf->SetFont('Arial','B',10);
		$pdf->SetTextColor(32,100,210);
	    $pdf->Cell(185,2,iconv("UTF-8", "ISO-8859-1",strtoupper('Cel. 70368576')),0,0,'C');
		$pdf->Ln(15);

		$pdf->SetFont('Arial','',10);
		$pdf->SetTextColor(39,39,51);
		$pdf->Cell(30,7,iconv("UTF-8", "ISO-8859-1",'Fecha de emisión:'),0,0,'L');
		$pdf->SetTextColor(97,97,97);
		$pdf->Cell(116,7,iconv("UTF-8", "ISO-8859-1",date("d/m/Y", strtotime($datos_venta['venta_fecha']))." ".$datos_venta['venta_hora']),0,0,'L');

		$pdf->SetFillColor(23,83,201);
		$pdf->SetDrawColor(23,83,201);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetTextColor(255,255,255);
		$pdf->Cell(35,7,iconv("UTF-8", "ISO-8859-1",strtoupper('Recibo Nro.')),0,0,'C',true);
		$pdf->Ln(7);

		$pdf->SetFont('Arial','',10);
		$pdf->SetTextColor(39,39,51);
		$pdf->Cell(12,7,iconv("UTF-8", "ISO-8859-1",'Cajero:'),0,0,'L');
		$pdf->SetTextColor(97,97,97);
		$pdf->Cell(134,7,iconv("UTF-8", "ISO-8859-1",$datos_venta['usuario_nombre']." ".$datos_venta['usuario_apellido']),0,0,'L');
		
		$pdf->SetFont('Arial','B',10);
		$pdf->SetTextColor(97,97,97);
		$pdf->Cell(35,7,iconv("UTF-8", "ISO-8859-1",strtoupper($datos_venta['venta_id'])),'LRB',0,'C'); // LINEA AL NRO DE RECIBO

		$pdf->Ln(10);

		if($datos_venta['cliente_id']==1){
			$pdf->SetFont('Arial','',10);
			$pdf->SetTextColor(39,39,51);
			$pdf->Cell(13,7,iconv("UTF-8", "ISO-8859-1",'Cliente:'),0,0);
			$pdf->SetTextColor(97,97,97);
			$pdf->Cell(60,7,iconv("UTF-8", "ISO-8859-1","N/A"),0,0,'L');
			$pdf->SetTextColor(39,39,51);
			$pdf->Cell(8,7,iconv("UTF-8", "ISO-8859-1","Razon Social: "),0,0,'L');
			$pdf->SetTextColor(97,97,97);
			$pdf->Cell(60,7,iconv("UTF-8", "ISO-8859-1","N/A"),0,0,'L');
			$pdf->SetTextColor(39,39,51);
			$pdf->Cell(7,7,iconv("UTF-8", "ISO-8859-1",'Tel:'),0,0,'L');
			$pdf->SetTextColor(97,97,97);
			$pdf->Cell(35,7,iconv("UTF-8", "ISO-8859-1","N/A"),0,0);
			$pdf->SetTextColor(39,39,51);
			$pdf->Ln(7);
		}
		else
		{
			$pdf->SetFont('Arial','',10);
			$pdf->SetTextColor(39,39,51);
			$pdf->Cell(13,7,iconv("UTF-8", "ISO-8859-1",'Cliente:'),0,0);
			$pdf->SetTextColor(97,97,97);
			$pdf->Cell(60,7,iconv("UTF-8", "ISO-8859-1",$datos_venta['cliente_nombre']." ".$datos_venta['cliente_apellido']),0,0,'L');
			$pdf->SetTextColor(39,39,51);
			$pdf->Cell(23,7,iconv("UTF-8", "ISO-8859-1","Razon Social: "),0,0,'L');
			$pdf->SetTextColor(97,97,97);
			$pdf->Cell(55,7,iconv("UTF-8", "ISO-8859-1",$datos_venta['cliente_numero_documento']),0,0,'L');
			$pdf->SetTextColor(39,39,51);
			$pdf->Cell(7,7,iconv("UTF-8", "ISO-8859-1",'Tel:'),0,0,'L');
			$pdf->SetTextColor(97,97,97);
			$pdf->Cell(35,7,iconv("UTF-8", "ISO-8859-1",$datos_venta['cliente_telefono']),0,0);
			$pdf->SetTextColor(39,39,51);
			$pdf->Ln(7);
		}

		$pdf->Ln(9);

		$pdf->SetFillColor(23,83,201);
		$pdf->SetDrawColor(23,83,201);
		$pdf->SetFont('Arial','B',11);
		$pdf->SetTextColor(255,255,255);
		$pdf->Cell(100,8,iconv("UTF-8", "ISO-8859-1",'Descripción'),1,0,'C',true);
		$pdf->Cell(15,8,iconv("UTF-8", "ISO-8859-1",'Cant.'),1,0,'C',true);
		$pdf->Cell(32,8,iconv("UTF-8", "ISO-8859-1",'Precio'),1,0,'C',true);
		$pdf->Cell(34,8,iconv("UTF-8", "ISO-8859-1",'Subtotal'),1,0,'C',true);

		$pdf->Ln(8);

		$pdf->SetFont('Arial','',10);
		$pdf->SetTextColor(39,39,51);

		/*----------  Seleccionando detalles de la venta  ----------*/
		$venta_detalle=$ins_venta->seleccionarDatos("Normal","venta_detalle WHERE venta_codigo='".$datos_venta['venta_codigo']."'","*",0);
		$venta_detalle=$venta_detalle->fetchAll();

		foreach($venta_detalle as $detalle){
			$pdf->Cell(100,7,iconv("UTF-8", "ISO-8859-1",$ins_venta->limitarCadena($detalle['venta_detalle_descripcion'],80,"...")),'L',0,'C');
			$pdf->Cell(15,7,iconv("UTF-8", "ISO-8859-1",$detalle['venta_detalle_cantidad']),'L',0,'C');
			$pdf->Cell(32,7,iconv("UTF-8", "ISO-8859-1",($detalle['venta_detalle_precio_venta'])),'L',0,'C');
			$pdf->Cell(34,7,iconv("UTF-8", "ISO-8859-1",($detalle['venta_detalle_total'])),'LR',0,'C');
			$pdf->Ln(7);
		}

		$pdf->SetFont('Arial','B',11);
		$pdf->Cell(100,7,iconv("UTF-8", "ISO-8859-1",''),'T',0,'C');
			$pdf->Cell(15,7,iconv("UTF-8", "ISO-8859-1",''),'T',0,'C');

		$pdf->Cell(32,7,iconv("UTF-8", "ISO-8859-1",'TOTAL Bs.'),'T',0,'C');
		$pdf->Cell(34,7,iconv("UTF-8", "ISO-8859-1",($datos_venta['venta_total']).' '),'T',0,'C');

		$pdf->Ln(7);

		
//////////////////////////////////////////////////////////////////////////////////////////////////////
		$ejemploMonto=($datos_venta['venta_total']);
		$monto_literal=numtoletras($ejemploMonto);/////////////////////////// 625 con 80 
		$pdf->Ln(7);

		

		$pdf->SetFont('Arial','B',11);
		$pdf->SetTextColor(39,39,51);
		$pdf->Cell(12,7,iconv("UTF-8", "ISO-8859-1",'Son: '),0,0,'L');
		$pdf->SetTextColor(97,97,97);
		$pdf->Cell(134,7,iconv("UTF-8", "ISO-8859-1",$monto_literal),0,0,'L');
////////////////////////////////////////////////////////////////////////////	
		$pdf->Ln(12);


		$pdf->SetFont('Arial','',10);

		$pdf->SetTextColor(39,39,51);
		$pdf->MultiCell(0,9,iconv("UTF-8", "ISO-8859-1","*** Para poder realizar un reclamo o devolución, debe presentar este recibo ***"),0,'C',false);

		$pdf->SetFont('Arial','B',10);
		$pdf->MultiCell(0,9,iconv("UTF-8", "ISO-8859-1","*** Gracias por su preferencia ***"),0,'C',false);

		$pdf->Ln(9);

		$pdf->SetFillColor(39,39,51);
		$pdf->SetDrawColor(23,83,201);
        $pdf->Code128(72,$pdf->GetY(),$datos_venta['venta_codigo'],70,20);
        $pdf->SetXY(12,$pdf->GetY()+21);
        $pdf->SetFont('Arial','',12);
        $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1",$datos_venta['venta_codigo']),0,'C',false);

		$pdf->Output("I","Factura_Nro".$datos_venta['venta_id'].".pdf",true);

	}else{
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php echo APP_NAME; ?></title>
	<?php include '../views/inc/head.php'; ?>
</head>
<body>
	<div class="main-container">
        <section class="hero-body">
            <div class="hero-body">
                <p class="has-text-centered has-text-white pb-3">
                    <i class="fas fa-rocket fa-5x"></i>
                </p>
                <p class="title has-text-white">¡Ocurrió un error!</p>
                <p class="subtitle has-text-white">No hemos encontrado datos de la venta</p>
            </div>
        </section>
    </div>
	<?php include '../views/inc/script.php'; ?>
</body>
</html>
<?php } 

     
        


?>
<?php
$pdf->SetFont('helvetica', 'B', 8);
        $pdf->SetY(-15);
        $pdf->Cell(95,5,utf8_decode('Página ').$pdf->PageNo().' / {nb}',0,0,'L');
        $pdf->Cell(95,5,date('d/m/Y | g:i:a') ,00,1,'R');
        $pdf->Line(10,287,200,287);
        $pdf->Cell(0,5,utf8_decode("Kodo Sensei © Todos los derechos reservados."),0,0,"C");

?>
