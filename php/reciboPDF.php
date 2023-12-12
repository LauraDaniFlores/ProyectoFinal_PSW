<?php
    session_start();
    $IdPedido = $_SESSION['IdPedido'];
    $envio = $_SESSION['envioRecibo'];
    $impuestos = $_SESSION['impuestosRecibo'];
    $TOTAL = 0;
    $banco = $_SESSION['tipoPagoRecibo'];
    $nombre = $_SESSION['nombreRecibo'];
    $titularTarjeta = $_SESSION['nombrePagoRecibo'];
    
    $cuenta = $_SESSION['tarjetaRecibo'];
    if($_SESSION['tipoPagoRecibo'] != "OXXO"){
        $cuentaBancaria = str_repeat('*', strlen($_SESSION['tarjetaRecibo']) - 4) . substr($_SESSION['tarjetaRecibo'], -4);
    }
    $direccion = $_SESSION['direccionRecibo'];
    $telefono = $_SESSION['telRecibo'];
    $cupon = $_SESSION['cupon'];
    $correo = $_SESSION['correoRecibo'];
    
    
    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='Store';
    
    //conexión a la base de datos
    $conexion = new mysqli($servidor, $cuenta, $password, $bd);
    
    if($conexion -> connect_errno){
        die('Error en la conexión');
    }else{
        require('../librerias/fpdf/fpdf.php');
        $pdf = new FPDF();
        $pdf->addPage("P","Letter");
        
        
        
        $margin=17;
        $pdf->SetMargins($margin,$margin,$margin);
        $pdf->SetAutoPageBreak(true,0.5);
        function base($pdf,$Id){
            $pageWidth = $pdf->GetPageWidth();
            $pageHeight = $pdf->GetPageHeight();
            $pdf->Image("../imagenes/fondoPDF.png",0,0,$pageWidth,$pageHeight);
        
            $pdf->AddFont('BebasNeue', '', 'BebasNeue-Regular.php');
            $pdf->SetFont('BebasNeue', '', 31);
            $pdf->SetXY(20,15);
            $pdf->SetTextColor(216, 0, 108);
            $pdf->Cell(20,11,"RECIBO",0,2);
            $pdf->Cell(20,11,"#$Id",0,2);
            
            $pdf->AddFont('Playball', 'B', 'Playball-Regular.php');
            $pdf->SetFont('Playball', 'B', 31);
    
            $pdf->SetXY(145,26);
            $pdf->Cell(56,11,"CandyCraze",0,2);
            $pdf->SetFont('courier', '', 11);
            $pdf->SetTextColor(0,0,0);
            $pdf->SetXY(120,$pdf->getY()+2);
            $pdf->MultiCell(80,5,utf8_decode("Av. Universidad # 940, Ciudad Universitaria, C.P. 20100, Aguascalientes, Ags. México"),0,"R");
            
            $pdf->Image("../imagenes/LogoPDF.png",163,3,0,21);
    
            $pdf->SetFont('courier', '', 11);
            $pdf->SetXY(120,260);
            $pdf->Cell(80,5,"(541) 754-3010",0,2,"R");
            $pdf->Cell(80,5,"CandyCraze@gmail.com",0,2,"R");
            
        }
        function titulos($pdf){
            $yTabla = $pdf->GetY()+6;
            $pdf->SetFont('BebasNeue', '', 18.5);
            $pdf->SetTextColor(61,12,17);
            $pdf->SetFillColor(249,222,201);
            $pdf->SetXY(17,$yTabla);
            $pdf->Cell(80,13,"    PRODUCTO",0,0,"C",true);
            $pdf->Cell(34,13,"CANTIDAD",0,0,"C",true);
            $pdf->Cell(34,13,"PRECIO",0,0,"C",true);
            $pdf->Cell(34,13,"TOTAL",0,1,"C",true);
    
            $pdf->SetFont('courier', '', 13);
            $pdf->SetTextColor(115,115,115);
            $pdf->SetDrawColor(220,220,220);
            $pdf->SetFillColor(247,247,248);
        }
        base($pdf,$IdPedido);
    
        
        $pdf->SetFont('BebasNeue', '', 20);
        $pdf->SetXY(20,55);
        $pdf->Cell(20,11,"CLIENTE",0,2);
        
        $pdf->SetFont('courier', '', 13);
        $pdf->SetXY(20,68);
        $pdf->Cell(20,7,utf8_decode($nombre),0,2);
        // $pdf->SetXY(20,81);
        $pdf->MultiCell(150,6,utf8_decode($direccion),0,2);
        $pdf->SetX(20);
        $pdf->Cell(20,7,"Tel. $telefono",0,2);
        $pdf->Cell(20,7,$correo,0,2);
        titulos($pdf);
    
    
        // -------------------------------------------
        $cont=0;
        
        // Consulta SQL para obtener el id más alto en la tabla productos
        $consulta = "SELECT pv.IdProducto, pv.Cantidad, p.nombre, p.precio, p.descuento FROM productovendidos pv JOIN productos p ON pv.IdProducto = p.idProducto WHERE pv.IdPedido = $IdPedido;";
        $result = $conexion->query($consulta);
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $yTemp=$pdf->GetY();
                $pdf->MultiCell(80,10,utf8_decode($fila['nombre']),"TB","C",true);
                $yTemp2=$pdf->GetY();
                $pdf->SetXY(97,$yTemp);
                $pdf->Cell(34,$yTemp2-$yTemp,$fila['Cantidad'],"TB",0,"C",true);
                $precio = (100-$fila['descuento']) / 100 * $fila['precio'];
                $pdf->Cell(34,$yTemp2-$yTemp,"$" . number_format($precio, 2),"TB",0,"C",true);
                $pdf->Cell(34,$yTemp2-$yTemp,"$" . number_format($fila['Cantidad'] * $precio, 2),"TB",1,"C",true);
                $pdf->SetXY(17,$yTemp2);
        
                $cont++;
                if($cont==11){
                    $cont=0;
                    $pdf->addPage("P","Letter");
                    base($pdf,$IdPedido);
                    $pdf->SetY(65);
                    titulos($pdf);
                }
                $TOTAL += $fila['Cantidad'] * $precio;
            }
        }
        
       
        
        //--------------------------------------------
        
        $yPrecios = $pdf->GetY() + 5;
        $pdf->SetFont('courier', '', 12);
        $pdf->SetTextColor(0,0,0);
    
        $pdf->SetXY(130,$yPrecios);
        $pdf->Cell(35,7,"Subtotal:",0,2);
        $pdf->Cell(35,7,utf8_decode("Cupón:"),0,2);
        $pdf->Cell(35,7,"Impuestos:",0,2);
        $pdf->Cell(35,7,utf8_decode("Envío:"),0,2);
    
        $pdf->SetXY(165,$yPrecios);
        $pdf->Cell(32,7,"$" . number_format($TOTAL,2),0,2,"R");
        $pdf->Cell(32,7,"-$" . number_format($cupon,2),0,2,"R");
        $pdf->Cell(32,7,"$" . number_format($impuestos,2),0,2,"R");
        $pdf->Cell(32,7,"$" . number_format($envio,2),0,2,"R");
        
    
        $yTotal = $pdf->GetY()+8;
        $pdf->SetXY(130,$yTotal);
        $pdf->SetFont('BebasNeue', '', 23);
        $pdf->SetTextColor(61,12,17);
        $pdf->SetFillColor(249,222,201);
        $pdf->Cell(69,10,"TOTAL: $" . number_format($TOTAL + $envio + $impuestos - $cupon, 2),0,0,"C",true);
        
        $pdf->SetTextColor(0,0,0);
        $pdf->SetXY(17,$yPrecios+10);
        $pdf->SetFont('BebasNeue', '', 18.5);
        $pdf->Cell(35,7,utf8_decode("INFORMACIÓN DE PAGO"),0,2);
    
        
        $pdf->SetXY(17,$yPrecios+20);
        if($banco != "OXXO"){
            $pdf->SetFont('courier', 'B', 12);
            $pdf->Cell(35,7,"Banco:",0,2);
            $pdf->Cell(35,7,"Nombre:",0,2);
            $pdf->Cell(35,7,"Cuenta:",0,2);

            $pdf->SetFont('courier', '', 12);
            $pdf->SetXY(42,$yPrecios+20);
            $pdf->Cell(32,7,$banco,0,2);
            $pdf->Cell(32,7,utf8_decode($titularTarjeta),0,2);
            $pdf->Cell(32,7,$cuentaBancaria,0,2);
        }else{
            $pdf->SetFont('courier', '', 12);
            $pdf->Cell(35,7,"Pago en OXXO",0,2);
        }
        
    
        
    
        
        $pdf->Output('../recibos/recibo.pdf', 'I');
    }
?>