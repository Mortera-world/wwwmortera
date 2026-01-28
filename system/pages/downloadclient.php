 <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
         /* Agrega un contenedor alrededor de tus tarjetas */
         .contenedor-tarjetas {
             display: flex;
             justify-content: space-around; /* Puedes ajustar esto según sea necesario */
         }
         
         .tarjeta {
             width: 200px;
             background-color: #fff;
             border: 1px solid #ccc;
             border-radius: 8px;
             overflow: hidden;
             margin: 10px;
             transition: transform 0.3s;
         }
        .tarjeta:hover {
            transform: scale(1.05);
        }
        .imagen {
           width: 100%;
           height: auto; /* Cambiado a 'auto' para mantener la proporción de la imagen */
           object-fit: cover;
           display: block;
           margin: 0 auto;
        }
        .contenido {
            padding: 10px;
            height: auto; /* Cambiado a 'auto' para que se ajuste automáticamente al contenido */
            text-align: center;
        }
        .titulo {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .info-container {
            margin-bottom: 20px; /* Ajusta el espacio entre cada par de info y subinfo */
        }
        .info {
            font-size: 17px;
        }       
        .subinfo {
            font-size: 12px;
        }
        .instruccion {
            font-size: 14px;
        }
        .boton {
            display: inline-block;
            padding: 8px 16px;
            margin-top: 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }       
        .boton:hover {
            background-color: #45a049;
            color: #fff;
        }
    </style>
	<?php
// oxxo
$datos = array(
    "imagen" => "images/tibiaclient.png",
    "imagen2" => "images/tibiaclient.png",
    "imagen3" => "images/tibiaclient.png",
    "titulo" => "Mortera Launcher",
    "titulo2" => "Mortera ZIP",
    "titulo3" => "Mortera OTC",
    "cuenta" => "14.12",
    "cuenta2" => "14.12",
    "cuenta3" => "14.12",
	"Tipo" => "Windows7/8/10/11",
	"Tipo2" => "Windows7/8/10/11",
	"Tipo3" => "Windows7/8/10/11",
    "nombre" => "Launcher 1.27MB/Cliente 300MB",
    "nombre2" => "zip 300MB",
    "nombre3" => "OTC 250mb",
    "instruccion" => "Extraer el archivo MW.zip en carpeta en la ubicacion de tu preferencia, OJO no modificar ni un archivo de la carpeta, dejala en un lugar apartado del escritorio ya que te creara un acceso dirrecto en tu escritorio. una vez extraido abrir MorteraLauncher y comenzara a descargar el cliente. Este cliente actualizara automaticamente al tener alguna actializacion. pd: no necesitas tener la carpeta en el escritorio ya que te crea un ejecutable en el mismo.",
    "instruccion2" => "Solo extraer el archivo ZIP en un lugar de tu preferencia, abrir la carpeta/Bin y ejecutar el client.exe.",
    "instruccion3" => "Solo descargar , extraer y jugar, desactivar optimizar fps si se te cierra",
);
?>
<?php
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Download Client';


$getpage_download = $_GET['step'] ?? '';
if (empty($getpage_download)) {
    ?>
    <div class="TableContainer">
        <div class="CaptionContainer">
            <div class="CaptionInnerContainer">
                <span class="CaptionEdgeLeftTop"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
                <span class="CaptionEdgeRightTop"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
                <span class="CaptionBorderTop"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/table-headline-border.gif);"></span>
                <span class="CaptionVerticalLeft"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-vertical.gif);"></span>
                <div class="Text">Download Client</div>
                <span class="CaptionVerticalRight"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-vertical.gif);"></span>
                <span class="CaptionBorderBottom"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/table-headline-border.gif);"></span>
                <span class="CaptionEdgeLeftBottom"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
                <span class="CaptionEdgeRightBottom"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
            </div>
        </div>
        <table class="Table5" cellpadding="0" cellspacing="0">
            <tbody>
            <tr>
                <td>
                    <div class="InnerTableContainer">
                        <table style="width:100%;">
                            <tbody>
                            <tr>
                                <td>
                                    <div class="TableContentContainer">
                                        <table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
                                            <tbody>
                                             <div class="contenedor-tarjetas">
                                                  <!-- Tarjeta 1 -->
                                                <div class="tarjeta">
                                                  <div class="contenido">
                                                      <img class="imagen" src="<?php echo $datos['imagen']; ?>" alt="Imagen de la tarjeta">
                                                      <div class="titulo"><?php echo $datos['titulo']; ?></div>
                                                      <div class="info-container">
                                                          <div class="info">Version:</div>
                                                          <div class="subinfo"><b><?php echo $datos['cuenta']; ?></b></div>
                                                      </div>
                                                      <div class="info-container">
                                                          <div class="info">Sistema:</div>  
                                                          <div class="subinfo"><b><?php echo $datos['Tipo']; ?></b></div>
                                                      </div>
													  <div class="info-container">
                                                          <div class="info">Peso:</div>  
                                                          <div class="subinfo"><b><?php echo $datos['nombre']; ?></b></div>
                                                      </div>
                                              		<div class="info-container">
                                                          <div class="info">Instrucciones</div>  
                                                          <div class="subinfo"><b><?php echo $datos['instruccion']; ?></b></div>
                                                      </div>
                                                      <a href="https://www.mediafire.com/file/bfst0jq72axe0tn/MW.zip/file" target="BLANK" class="boton">Descargar</a>
                                                  </div>
                                                </div>
												<div class="tarjeta">
                                                  <div class="contenido">
                                                      <img class="imagen" src="<?php echo $datos['imagen2']; ?>" alt="Imagen de la tarjeta">
                                                      <div class="titulo"><?php echo $datos['titulo2']; ?></div>
                                                      <div class="info-container">
                                                          <div class="info">Version:</div>
                                                          <div class="subinfo"><b><?php echo $datos['cuenta2']; ?></b></div>
														  <div class="subinfo">Act: 14/09/2025</div>
                                                      </div>
                                                      <div class="info-container">
                                                          <div class="info">Sistema:</div>  
                                                          <div class="subinfo"><b><?php echo $datos['Tipo2']; ?></b></div>
                                                      </div>
													  <div class="info-container">
                                                          <div class="info">Peso:</div>  
                                                          <div class="subinfo"><b><?php echo $datos['nombre2']; ?></b></div>
                                                      </div>
                                              		<div class="info-container">
                                                          <div class="info">Instrucciones</div>  
                                                          <div class="subinfo"><b><?php echo $datos['instruccion2']; ?></b></div>
                                                      </div>
                                                      <a href="https://www.mediafire.com/file/p9v0f268fdu7dzw/mortera13.zip/file" target="BLANK" class="boton">Descargar</a>
                                                  </div>
                                                </div>
												<div class="tarjeta">
                                                  <div class="contenido">
                                                      <img class="imagen" src="<?php echo $datos['imagen3']; ?>" alt="Imagen de la tarjeta">
                                                      <div class="titulo"><?php echo $datos['titulo3']; ?></div>
                                                      <div class="info-container">
                                                          <div class="info">Version:</div>
                                                          <div class="subinfo"><b><?php echo $datos['cuenta3']; ?></b></div>
														  <div class="subinfo">Act: 14/09/2025</div>
                                                      </div>
                                                      <div class="info-container">
                                                          <div class="info">Sistema:</div>  
                                                          <div class="subinfo"><b><?php echo $datos['Tipo3']; ?></b></div>
                                                      </div>
													  <div class="info-container">
                                                          <div class="info">Peso:</div>  
                                                          <div class="subinfo"><b><?php echo $datos['nombre3']; ?></b></div>
                                                      </div>
                                              		<div class="info-container">
                                                          <div class="info">Instrucciones</div>  
                                                          <div class="subinfo"><b><?php echo $datos['instruccion3']; ?></b></div>
                                                      </div>
                                                      <a href="https://www.mediafire.com/file/h7l256apfvkn2yt/morteraotc.zip/file" target="BLANK" class="boton">Descargar</a>
                                                  </div>
                                                </div>
                                              </div>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="TableContentContainer">
                                        <table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
                                            <tbody>
                                            <tr>
                                                <td class="LabelV">Disclaimer</td>
                                            </tr>
                                            <tr>
                                                <td>The software and any related documentation is provided "as is"
                                                    without warranty of any kind. The entire risk arising out of use of
                                                    the software remains with you. In no event shall CipSoft GmbH be
                                                    liable for any damages to your computer or loss of data.
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <?php
}

if ($_GET['subtopic'] == 'downloadclient' and $getpage_download == 'downloadagreement') {
    ?>
    <p>Before you can download the client program please read the Tibia Service Agreement and state if you agree to it
        by clicking on the appropriate button below.</p>

    <div class="TableContainer">
        <div class="CaptionContainer">
            <div class="CaptionInnerContainer">
                <span class="CaptionEdgeLeftTop"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
                <span class="CaptionEdgeRightTop"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
                <span class="CaptionBorderTop"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/table-headline-border.gif);"></span>
                <span class="CaptionVerticalLeft"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-vertical.gif);"></span>
                <div class="Text">Tibia Service Agreement</div>
                <span class="CaptionVerticalRight"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-vertical.gif);"></span>
                <span class="CaptionBorderBottom"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/table-headline-border.gif);"></span>
                <span class="CaptionEdgeLeftBottom"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
                <span class="CaptionEdgeRightBottom"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
            </div>
        </div>
        <table class="Table1" cellpadding="0" cellspacing="0">
            <tbody>
            <tr>
                <td>
                    <div class="InnerTableContainer"><p>This agreement describes the terms on which CipSoft GmbH offers
                            you access to an account for being able to play the online role playing game "Tibia". By
                            creating an account or downloading the client software you accept the terms and conditions
                            below and state that you are of full legal age in your country or have the permission of
                            your parents to play this game.</p>
                        <p>You agree that the use of the software is at your sole risk. We provide the software, the
                            game, and all other services "as is". We disclaim all warranties or conditions of any kind,
                            expressed, implied or statutory, including without limitation the implied warranties of
                            title, non-infringement, merchantability and fitness for a particular purpose. We do not
                            ensure continuous, error-free, secure or virus-free operation of the software, the game, or
                            your account.</p>
                        <p>We are not liable for any lost profits or special, incidental or consequential damages
                            arising out of or in connection with the game, including, but not limited to, loss of data,
                            items, accounts, or characters from errors, system downtime, or adjustments of the
                            gameplay.</p>
                        <p>While you are playing "Tibia", you must abide by some rules ("Tibia Rules") that are stated
                            on this homepage. If you break any of these rules, your account may be removed and all other
                            services terminated immediately.</p>
                        <p>CipSoft GmbH is neither willing nor required to take part in out-of-court dispute
                            resolution.</p>
                        <p>By creating an account or downloading the client software, you also accept the terms and
                            conditions stated in the BattlEye End-User Licence Agreement.</p>
                        <table style="width:100%;"></table>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <br>
    <center>
        <form action="?subtopic=downloadclient" method="post" style="padding:0px;margin:0px;">
            <div class="BigButton"
                 style="background-image:url(<?= $template_path; ?>/images/global/buttons/sbutton.gif)">
                <div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
                    <div class="BigButtonOver"
                         style="background-image:url(<?= $template_path; ?>/images/global/buttons/sbutton_over.gif);"></div>
                    <input class="BigButtonText" type="submit" value="I agree"></div>
            </div>
        </form>
    </center>
    <?php
}
