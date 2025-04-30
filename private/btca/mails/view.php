<?php

class viewMail
{
    public function retornarHtmlCorreoRecepcionLibro($prestamo)
    {

        $id_usuario = $prestamo['id_usuario'];
        $nombre_usuario = $prestamo['nombre_usuario'];
        $id_libro = $prestamo['id_libro'];
        $titulo = $prestamo['titulo'];
        $fecha_prestamo = $prestamo['fecha_prestamo'];
        $fecha_devolucion = $prestamo['fecha_devolucion'];
        $cantidad = $prestamo['cantidad'];
        $observacion = $prestamo['observacion'];
        $id_autor = $prestamo['id_autor'];
        $nombre_autor = $prestamo['nombre_autor'];
        $imagen_libro = $prestamo['imagen_libro'];

        $imagen_logo = __DIR__ . '/../../public/tools/images/logo_biblioteca.png';
        $imagen_book = __DIR__ . '/../../public/tools/images/images_libros/' . $imagen_libro;

        $html = <<<HTML
            <!DOCTYPE html>
                <html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
                    <head>
                        <title></title>
                        <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
                        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
                        <!--[if mso]>
                                        <xml><w:WordDocument xmlns:w="urn:schemas-microsoft-com:office:word"><w:DontUseAdvancedTypographyReadingMail/></w:WordDocument>
                                        <o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml>
                                        <![endif]-->
                        <!--[if !mso]><!-->
                        <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" type="text/css"/>
                        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet" type="text/css"/>
                        <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,400..900;1,100..900&display=swap" rel="stylesheet" type="text/css"/>
                        <!--<![endif]-->
                        <style>
                            * {
                                box-sizing: border-box;
                            }

                            body {
                                margin: 0;
                                padding: 0;
                            }

                            a[x-apple-data-detectors] {
                                color: inherit !important;
                                text-decoration: inherit !important;
                            }

                            #MessageViewBody a {
                                color: inherit;
                                text-decoration: none;
                            }

                            p {
                                line-height: inherit
                            }

                            .desktop_hide, .desktop_hide table {
                                mso-hide: all;
                                display: none;
                                max-height: 0px;
                                overflow: hidden;
                            }

                            .image_block img+div {
                                display: none;
                            }

                            sup, sub {
                                font-size: 75%;
                                line-height: 0;
                            }

                            @media (max-width: 620px) {
                                .desktop_hide table.icons-outer {
                                    display: inline-table !important;
                                }

                                .desktop_hide table.icons-inner {
                                    display: inline-block !important;
                                }

                                .icons-inner {
                                    text-align: center;
                                }

                                .icons-inner td {
                                    margin: 0 auto;
                                }

                                .mobile_hide {
                                    display: none;
                                }

                                .row-content {
                                    width: 100% !important;
                                }

                                .stack .column {
                                    width: 100%;
                                    display: block;
                                }

                                .mobile_hide {
                                    min-height: 0;
                                    max-height: 0;
                                    max-width: 0;
                                    overflow: hidden;
                                    font-size: 0px;
                                }

                                .desktop_hide, .desktop_hide table {
                                    display: table !important;
                                    max-height: none !important;
                                }

                                .row-2 .column-1 .block-1.spacer_block, .row-2 .column-1 .block-3.spacer_block, .row-3 .column-1 .block-1.spacer_block {
                                    height: 40px !important;
                                }

                                .row-2 .column-1 .block-4.paragraph_block td.pad {
                                    padding: 10px 0 !important;
                                }

                                .row-2 .column-1 .block-5.heading_block h1 {
                                    font-size: 44px !important;
                                }

                                .row-1 .column-1 {
                                    padding: 20px 0 5px 15px !important;
                                }

                                .row-1 .column-2 {
                                    padding: 20px 15px 5px 0 !important;
                                }

                                .row-2 .column-1, .row-4 .column-1 {
                                    padding: 5px 15px !important;
                                }
                            }
                        </style>
                        <!--[if mso ]><style>sup, sub { font-size: 100% !important; } sup { mso-text-raise:10% } sub { mso-text-raise:-10% }</style> <![endif]-->
                    </head>
                    <body class="body" style="margin: 0; background-color: #ffffff; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
                        <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table  align="center" border="0" cellpadding="0" cellspacing="0" class="row-content" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 600px; margin: 0 auto;" width="600">
                                                            <tbody>
                                                                <tr style="background:black; width:100%; height:150px;">
                                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-left: 20px; padding-top: 20px; vertical-align: middle;" width="50%">
                                                                        <table border="0" cellpadding="0" cellspacing="0" class="image_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                                            <tr style="">
                                                                                <td class="pad" style="width:100%;padding-right:0px;padding-left:0px;">
                                                                                    <div align="left" class="alignment">
                                                                                        <div style="max-width: 100px; background:white; margin-bottom:20px; border-radius:10px;">
                                                                                            <img alt="Logo" height="auto" src="$imagen_logo" style="display: block; height: auto; border: 0; width: 100%;" title="" width="201.6"/>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    <td class="column column-2" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-right: 20px; padding-top: 20px; vertical-align: middle;" width="50%">
                                                                        <div class="spacer_block block-1" style="height:1px;line-height:1px;font-size:1px;"></div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table  align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table style="border: 1px solid black; border-bottom:0;"  align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-radius: 0; color: #000000; width: 600px; margin: 0 auto;" width="600">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-left: 20px; padding-right: 20px; padding-top: 5px; vertical-align: top;" width="100%">
                                                                        <div class="spacer_block block-1" style="height:40px;line-height:40px;font-size:1px;"></div>
                                                                        <table border="0" cellpadding="0" cellspacing="0" class="image_block block-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                                            <tr>
                                                                                <td class="pad" style="width:100%;">
                                                                                    <div align="center" class="alignment">
                                                                                        <div style="max-width: 150px;">
                                                                                            <img alt="Presentacion" height="auto" src="https://png.pngtree.com/recommend-works/png-clipart/20250321/ourmid/pngtree-green-check-mark-icon-png-image_15808519.png" style="display: block; height: auto; border: 0; width: 100%;" title="" width="560"/>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <div class="spacer_block block-3" style="height:40px;line-height:40px;font-size:1px;"></div>
                                                                        <table border="0" cellpadding="0" cellspacing="0" class="paragraph_block block-4" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                                            <tr>
                                                                                <td class="pad" style="padding-bottom:10px;padding-top:10px;">
                                                                                    <div style="color:#333333;direction:ltr;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:14px;font-weight:400;letter-spacing:2px;line-height:1.2;text-align:left;mso-line-height-alt:17px;">
                                                                                        <p style="margin: 0; text-align:center; font-size:25px;">
                                                                                            Hola <b>Jeifer Marrugo</b>
                                                                                            su libro
                                                                                        </p>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <table border="0" cellpadding="0" cellspacing="0" class="heading_block block-5" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                                            <tr>
                                                                                <td class="pad" style="text-align:center; width:100%;">
                                                                                    <h1 style="margin: 0; text-align:center; color: #000; direction: ltr; font-family: 'Inter Tight','Arial'; font-size: 30px; font-weight: 600; letter-spacing: normal; line-height: 1.2; margin-top: 0; margin-bottom: 0; mso-line-height-alt: 77px;">
                                                                                        <span class="tinyMce-placeholder" style="word-break: break-word;">$titulo</span>
                                                                                    </h1>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pad" style="width:100%;padding-right:0px;padding-left:0px;">
                                                                                    <div align="center" class="alignment">
                                                                                        <div style="max-width: 201.6px; margin-top:15px;">
                                                                                            <img alt="Imagen Libro" height="auto" src="$imagen_book" style="display: block; height: auto; border: 0; width: 100%;" title="" width="201.6"/>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <table border="0" cellpadding="0" cellspacing="0" class="paragraph_block block-6" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                                            <tr>
                                                                                <td class="pad" style="padding-bottom:10px;padding-top:10px;">
                                                                                    <div style="color:#000;direction:ltr;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:16px;font-weight:400;letter-spacing:0px;line-height:1.8;text-align:left;mso-line-height-alt:29px;">
                                                                                        <p style="margin: 0; text-align:center; width:100%;">
                                                                                            Ah sido recibido en la biblioteca. <br>Gracias por preferirnos.
                                                                                        </p>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-4" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-radius: 0; color: #000000; width: 600px; margin: 0 auto; border: 1px solid black; border-top:0;" width="600">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-left: 20px; padding-right: 20px; padding-top: 5px; vertical-align: top;" width="100%">
                                                                        <div class="spacer_block block-3" style="height:20px;line-height:20px;font-size:1px;"></div>
                                                                        <table border="0" cellpadding="0" cellspacing="0" class="paragraph_block block-4" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                                            <tr>
                                                                                <td class="pad" style="padding-bottom:10px;padding-top:10px;">
                                                                                    <div style="color:#000;direction:ltr;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:14px;font-weight:400;letter-spacing:0px;line-height:1.5;text-align:center;mso-line-height-alt:21px;">
                                                                                        <p style="margin: 0;">
                                                                                            ©️Biblioteca JES<br/>JM Software
                                                                                        </p>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <div class="spacer_block block-5" style="height:25px;line-height:25px;font-size:1px;"></div>
                                                                        <table border="0" cellpadding="0" cellspacing="0" class="icons_block block-6" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; text-align: center; line-height: 0;" width="100%">
                                                                            <tr>
                                                                                <td class="pad" style="vertical-align: middle; color: #000000; font-family: inherit; font-size: 14px; font-weight: 400; text-align: center;">
                                                                                    <table cellpadding="0" cellspacing="0" class="icons-outer" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-table;">
                                                                                        <tr>
                                                                                            <td style="vertical-align: middle; text-align: center; padding-top: 5px; padding-bottom: 5px; padding-left: 5px; padding-right: 30px;">
                                                                                                <img align="center" alt="Facebook" class="icon" height="auto" src="https://cdn.pixabay.com/photo/2023/12/22/05/01/facebook-8463155_1280.png" style="display: block; height: auto; margin: 0 auto; border: 0;" width="32"/>
                                                                                            </td>
                                                                                            <td style="vertical-align: middle; text-align: center; padding-top: 5px; padding-bottom: 5px; padding-left: 15px; padding-right: 30px;">
                                                                                                <img align="center" alt="Instagram" class="icon" height="auto" src="https://cdn-icons-png.flaticon.com/512/1077/1077093.png" style="display: block; height: auto; margin: 0 auto; border: 0;" width="32"/>
                                                                                            </td>
                                                                                            <td style="vertical-align: middle; text-align: center; padding-top: 5px; padding-bottom: 5px; padding-left: 15px; padding-right: 30px;">
                                                                                                <img align="center" alt="Twitter" class="icon" height="auto" src="https://img.icons8.com/ios_filled/512/twitterx.png" style="display: block; height: auto; margin: 0 auto; border: 0;" width="32"/>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- End -->
                    </body>
                </html>

        HTML;

        return $html;
    }

    public function retornarHtmlCorreoPrestamoLibros($prestamo)
    {
        $id_prestamo = $prestamo['id_prestamo'];
        $id_usuario = $prestamo['id_usuario'];
        $nombre_usuario = $prestamo['nombre_usuario'];
        $id_libro = $prestamo['id_libro'];
        $titulo = $prestamo['titulo'];
        $categoria = $prestamo['categoria'];
        $fecha_prestamo = $prestamo['fecha_prestamo'];
        $fecha_devolucion = $prestamo['fecha_devolucion'];
        $cantidad = $prestamo['cantidad'];
        $observacion = $prestamo['observacion'];
        $id_autor = $prestamo['id_autor'];
        $nombre_autor = $prestamo['nombre_autor'];
        $imagen_libro = $prestamo['imagen_libro'];
        $imagen_usuario = $prestamo['imagen_usuario'];
        $autor_imagen = $prestamo['autor_imagen'];
        $correo_usuario = $prestamo['correo_usuario'];


        $imagen_logo = __DIR__ . '/../../public/tools/images/logo_biblioteca.png';
        $imagen_book = __DIR__ . '/../../public/tools/images/images_libros/' . $imagen_libro;
        $imagen_autor = __DIR__ . '/../../public/tools/images/images_autores/' . $autor_imagen;
        $imagen_user = __DIR__ . '/../../public/tools/images/images_perfiles/' . $imagen_usuario;


        $html = <<<HTML
            <!DOCTYPE html>
            <html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">

            <head>
                <title></title>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--[if mso]>
            <xml><w:WordDocument xmlns:w="urn:schemas-microsoft-com:office:word"><w:DontUseAdvancedTypographyReadingMail/></w:WordDocument>
            <o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml>
            <![endif]--><!--[if !mso]><!-->
                <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&amp;display=swap" rel="stylesheet" type="text/css">
                <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&amp;display=swap" rel="stylesheet" type="text/css"><!--<![endif]-->
                <style>
                    * {
                        box-sizing: border-box;
                    }

                    body {
                        margin: 0;
                        padding: 0;
                    }

                    a[x-apple-data-detectors] {
                        color: inherit !important;
                        text-decoration: inherit !important;
                    }

                    #MessageViewBody a {
                        color: inherit;
                        text-decoration: none;
                    }

                    p {
                        line-height: inherit
                    }

                    .desktop_hide,
                    .desktop_hide table {
                        mso-hide: all;
                        display: none;
                        max-height: 0px;
                        overflow: hidden;
                    }

                    .image_block img+div {
                        display: none;
                    }

                    sup,
                    sub {
                        font-size: 75%;
                        line-height: 0;
                    }

                    @media (max-width:620px) {
                        .desktop_hide table.icons-inner {
                            display: inline-block !important;
                        }

                        .icons-inner {
                            text-align: center;
                        }

                        .icons-inner td {
                            margin: 0 auto;
                        }

                        .image_block div.fullWidth {
                            max-width: 100% !important;
                        }

                        .mobile_hide {
                            display: none;
                        }

                        .row-content {
                            width: 100% !important;
                        }

                        .stack .column {
                            width: 100%;
                            display: block;
                        }

                        .mobile_hide {
                            min-height: 0;
                            max-height: 0;
                            max-width: 0;
                            overflow: hidden;
                            font-size: 0px;
                        }

                        .desktop_hide,
                        .desktop_hide table {
                            display: table !important;
                            max-height: none !important;
                        }

                        .row-2 .column-1 .block-1.heading_block h1 {
                            font-size: 40px !important;
                        }

                        .row-2 .column-1 .block-2.paragraph_block td.pad>div,
                        .row-3 .column-1 .block-1.paragraph_block td.pad>div {
                            font-size: 16px !important;
                        }

                        .row-4 .column-2 .block-2.paragraph_block td.pad>div,
                        .row-4 .column-2 .block-3.paragraph_block td.pad>div,
                        .row-6 .column-2 .block-2.paragraph_block td.pad>div,
                        .row-6 .column-2 .block-3.paragraph_block td.pad>div {
                            text-align: center !important;
                            font-size: 16px !important;
                        }

                        .row-4 .column-2 .block-2.paragraph_block td.pad,
                        .row-6 .column-2 .block-2.paragraph_block td.pad {
                            padding: 0 20px 10px !important;
                        }

                        .row-4 .column-2 .block-1.heading_block h3,
                        .row-6 .column-2 .block-1.heading_block h3 {
                            text-align: center !important;
                            font-size: 20px !important;
                        }

                        .row-4 .column-2 .block-1.heading_block td.pad,
                        .row-6 .column-2 .block-1.heading_block td.pad {
                            padding: 20px 20px 15px !important;
                        }

                        .row-4 .column-2,
                        .row-4 .column-2 .block-3.paragraph_block td.pad,
                        .row-6 .column-2,
                        .row-6 .column-2 .block-3.paragraph_block td.pad,
                        .row-7 .column-1,
                        .row-8 .column-1,
                        .row-8 .column-2 {
                            padding: 0 20px !important;
                        }

                        .row-5 .column-1 .block-2.spacer_block {
                            height: 30px !important;
                        }

                        .row-8 .column-1 .block-1.heading_block h3,
                        .row-8 .column-2 .block-1.heading_block h3 {
                            text-align: left !important;
                            font-size: 18px !important;
                        }

                        .row-8 .column-1 .block-1.heading_block td.pad,
                        .row-8 .column-2 .block-1.heading_block td.pad,
                        .row-9 .column-1 .block-1.button_block td.pad {
                            padding: 0 !important;
                        }

                        .row-8 .column-1 .block-2.heading_block h3,
                        .row-8 .column-1 .block-3.heading_block h3,
                        .row-8 .column-1 .block-4.heading_block h3,
                        .row-8 .column-2 .block-2.heading_block h3,
                        .row-8 .column-2 .block-3.heading_block h3 {
                            text-align: left !important;
                            font-size: 16px !important;
                        }

                        .row-8 .column-1 .block-2.heading_block td.pad,
                        .row-8 .column-1 .block-3.heading_block td.pad,
                        .row-8 .column-1 .block-4.heading_block td.pad,
                        .row-8 .column-2 .block-2.heading_block td.pad,
                        .row-8 .column-2 .block-3.heading_block td.pad {
                            padding: 15px 0 0 !important;
                        }

                        .row-9 .column-1 .block-1.button_block span {
                            font-size: 18px !important;
                            line-height: 27px !important;
                        }

                        .row-1 .column-1 {
                            padding: 25px 0 !important;
                        }

                        .row-2 .column-1 {
                            padding: 48px 25px 0 !important;
                        }

                        .row-3 .column-1,
                        .row-9 .column-1 {
                            padding: 48px 20px !important;
                        }

                        .row-4 .column-1,
                        .row-6 .column-1 {
                            padding: 0 25px 0 24px !important;
                        }

                        .row-4 .column-3,
                        .row-6 .column-3 {
                            padding: 0 24px !important;
                        }
                    }
                </style><!--[if mso ]><style>sup, sub { font-size: 100% !important; } sup { mso-text-raise:10% } sub { mso-text-raise:-10% }</style> <![endif]-->
            </head>

            <body class="body" style="margin: 0; background-color: #ffffff; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
                <table class="nl-container" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff;">
                    <tbody>
                        <tr>
                            <td>
                                <table class="row row-1" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 600px; margin: 0 auto;" width="600">
                                                    <tbody>
                                                        <tr>
                                                            <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 25px; padding-top: 25px; vertical-align: top;">
                                                                <table class="image_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                                    <tr>
                                                                        <td class="pad" style="width:100%;padding-right:0px;padding-left:0px;">
                                                                            <div class="alignment" align="center">
                                                                                <div style="max-width: 120px;"><img src="$imagen_logo" style="display: block; height: auto; border: 0; width: 100%;" width="120" alt="Logo" title="Logo" height="auto"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="row row-2" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-left: 2px solid #000000; border-right: 2px solid #000000; color: #000000; background-color: #ffffff; border-radius: 15px 15px 0 0; border-top: 2px solid #000000; width: 600px; margin: 0 auto;" width="600">
                                                    <tbody>
                                                        <tr>
                                                            <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-left: 50px; padding-right: 50px; padding-top: 50px; vertical-align: top;">
                                                                <table class="heading_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                                    <tr>
                                                                        <td class="pad" style="text-align:center;width:100%;">
                                                                            <h1 style="margin: 0; color: #000000; direction: ltr; font-family: 'Alfa Slab One','Arial'; font-size: 59px; font-weight: 400; letter-spacing: normal; line-height: 1.2; text-align: center; margin-top: 0; margin-bottom: 0; mso-line-height-alt: 71px;">NUEVO PRESTAMO</h1>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table class="paragraph_block block-2" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                                                    <tr>
                                                                        <td class="pad" style="padding-bottom:30px;padding-top:20px;">
                                                                            <div style="color:#000000;direction:ltr;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:20px;font-weight:400;letter-spacing:0px;line-height:1.5;text-align:center;mso-line-height-alt:30px;">
                                                                                <p style="margin: 0;">Hola <b>$nombre_usuario</b>, usted a solicitado un prestamo en nuestra biblioteca.</p>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="row row-3" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; border-left: 2px solid #000000; border-radius: 0; border-right: 2px solid #000000; color: #000000; width: 600px; margin: 0 auto;" width="600">
                                                    <tbody>
                                                        <tr>
                                                            <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 18px; padding-left: 50px; padding-right: 50px; vertical-align: top;">
                                                                <table class="paragraph_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                                                    <tr>
                                                                        <td class="pad" style="padding-top:20px;">
                                                                            <div style="color:#150811;direction:ltr;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:16px;font-weight:400;letter-spacing:0px;line-height:1.5;text-align:center;mso-line-height-alt:24px;">
                                                                                <p style="margin: 0;"><b>Orden Nro:</b> $id_prestamo</p>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="row row-4" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; border-left: 2px solid #000000; border-radius: 0; border-right: 2px solid #000000; color: #000000; width: 600px; margin: 0 auto;" width="600">
                                                    <tbody>
                                                        <tr>
                                                            <td class="column column-1" width="33.333333333333336%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 10px; padding-left: 50px; padding-right: 12px; padding-top: 10px; vertical-align: top;">
                                                                <table class="image_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                                    <tr>
                                                                        <td class="pad" style="width:100%;padding-right:0px;padding-left:0px;">
                                                                            <div class="alignment" align="center">
                                                                                <div class="fullWidth" style="max-width: 136.667px;"><img src="$imagen_book" style="display: block; height: auto; border: 0; width: 100%;" width="136.667" alt="Foto Libro" title="Foto Libro" height="auto"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td class="column column-2" width="41.666666666666664%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-left: 12px; padding-right: 24px; padding-top: 24px; vertical-align: top;">
                                                                <table class="heading_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                                    <tr>
                                                                        <td class="pad" style="padding-bottom:15px;text-align:center;width:100%;">
                                                                            <h3 style="margin: 0; color: #150811; direction: ltr; font-family: 'Alfa Slab One','Arial'; font-size: 18px; font-weight: 400; letter-spacing: normal; line-height: 1.2; text-align: left; margin-top: 0; margin-bottom: 0; mso-line-height-alt: 22px;">INFORMACION LIBRO</h3>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table class="paragraph_block block-2" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                                                    <tr>
                                                                        <td class="pad" style="padding-bottom:5px;">
                                                                            <div style="color:#18171c;direction:ltr;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:14px;font-weight:400;letter-spacing:0px;line-height:1.5;text-align:left;mso-line-height-alt:21px;">
                                                                                <p style="margin: 0;"><b>Nombre:</b> <br> $titulo</p>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table class="paragraph_block block-3" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                                                    <tr>
                                                                        <td class="pad">
                                                                            <div style="color:#150811;direction:ltr;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:14px;font-weight:400;letter-spacing:0px;line-height:1.5;text-align:left;mso-line-height-alt:21px;">
                                                                                <p style="margin: 0;"><b>Cantidad:</b> <br> $cantidad</p>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="row row-5" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; border-left: 2px solid #000000; border-radius: 0; border-right: 2px solid #000000; color: #000000; width: 600px; margin: 0 auto;" width="600">
                                                    <tbody>
                                                        <tr>
                                                            <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top;">
                                                                <table class="divider_block block-1" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                                    <tr>
                                                                        <td class="pad">
                                                                            <div class="alignment" align="center">
                                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                                                    <tr>
                                                                                        <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 1px solid #dddddd;"><span style="word-break: break-word;">&#8202;</span></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <div class="spacer_block block-2" style="height:24px;line-height:24px;font-size:1px;">&#8202;</div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="row row-6" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; border-left: 2px solid #000000; border-radius: 0; border-right: 2px solid #000000; color: #000000; width: 600px; margin: 0 auto;" width="600">
                                                    <tbody>
                                                        <tr>
                                                            <td class="column column-1" width="33.333333333333336%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 10px; padding-left: 50px; padding-right: 12px; padding-top: 10px; vertical-align: top;">
                                                                <table class="image_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                                    <tr>
                                                                        <td class="pad" style="width:100%;padding-right:0px;padding-left:0px;">
                                                                            <div class="alignment" align="center">
                                                                                <div class="fullWidth" style="max-width: 136.667px;"><img src="$imagen_autor" style="display: block; height: auto; border: 0; width: 100%;" width="136.667" alt="Foto Autor" title="Foto Autor" height="auto"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td class="column column-2" width="41.666666666666664%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-left: 12px; padding-right: 24px; padding-top: 24px; vertical-align: top;">
                                                                <table class="heading_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                                    <tr>
                                                                        <td class="pad" style="padding-bottom:15px;text-align:center;width:100%;">
                                                                            <h3 style="margin: 0; color: #150811; direction: ltr; font-family: 'Alfa Slab One','Arial'; font-size: 18px; font-weight: 400; letter-spacing: normal; line-height: 1.2; text-align: left; margin-top: 0; margin-bottom: 0; mso-line-height-alt: 22px;"><span class="tinyMce-placeholder" style="word-break: break-word;">INFORMACION AUTOR</span></h3>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table class="paragraph_block block-2" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                                                    <tr>
                                                                        <td class="pad" style="padding-bottom:5px;">
                                                                            <div style="color:#18171c;direction:ltr;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:14px;font-weight:400;letter-spacing:0px;line-height:1.5;text-align:left;mso-line-height-alt:21px;">
                                                                                <p style="margin: 0;"><b>Nombre:</b> <br> $nombre_autor</p>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table class="paragraph_block block-3" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                                                    <tr>
                                                                        <td class="pad">
                                                                            <div style="color:#150811;direction:ltr;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:14px;font-weight:400;letter-spacing:0px;line-height:1.5;text-align:left;mso-line-height-alt:21px;">
                                                                                <p style="margin: 0;"><b>Categoria:</b> <br> $categoria</p>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="row row-7" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; border-left: 2px solid #000000; border-radius: 0; border-right: 2px solid #000000; color: #000000; width: 600px; margin: 0 auto;" width="600">
                                                    <tbody>
                                                        <tr>
                                                            <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-left: 50px; padding-right: 50px; vertical-align: top;">
                                                                <table class="divider_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                                    <tr>
                                                                        <td class="pad" style="padding-bottom:40px;padding-top:40px;">
                                                                            <div class="alignment" align="center">
                                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                                                    <tr>
                                                                                        <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 1px solid #18171c;"><span style="word-break: break-word;">&#8202;</span></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="row row-8" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; border-left: 2px solid #000000; border-radius: 0; border-right: 2px solid #000000; color: #000000; width: 600px; margin: 0 auto;" width="600">
                                                    <tbody>
                                                        <tr>
                                                            <td class="column column-1" width="50%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-left: 50px; padding-right: 35px; padding-top: 10px; vertical-align: top;">
                                                                <table class="heading_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                                    <tr>
                                                                        <td class="pad" style="padding-bottom:5px;text-align:center;width:100%;">
                                                                            <h3 style="margin: 0; color: #150811; direction: ltr; font-family: 'Alfa Slab One','Arial'; font-size: 18px; font-weight: 400; letter-spacing: normal; line-height: 1.2; text-align: left; margin-top: 0; margin-bottom: 0; mso-line-height-alt: 22px;"><span class="tinyMce-placeholder" style="word-break: break-word;">DATOS DEL SOLICITANTE</span></h3>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table class="heading_block block-2" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                                    <tr>
                                                                        <td class="pad" style="padding-bottom:5px;padding-top:10px;text-align:center;width:100%;">
                                                                            <h3 style="margin: 0; color: #42383e; direction: ltr; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 14px; font-weight: 400; letter-spacing: normal; line-height: 1.2; text-align: left; margin-top: 0; margin-bottom: 0; mso-line-height-alt: 17px;"><span class="tinyMce-placeholder" style="word-break: break-word;"><b>Nombre:</b> <br> $nombre_usuario</span></h3>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table class="heading_block block-3" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                                    <tr>
                                                                        <td class="pad" style="padding-bottom:5px;padding-top:10px;text-align:center;width:100%;">
                                                                            <h3 style="margin: 0; color: #42383e; direction: ltr; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 14px; font-weight: 400; letter-spacing: normal; line-height: 1.2; text-align: left; margin-top: 0; margin-bottom: 0; mso-line-height-alt: 17px;"><span class="tinyMce-placeholder" style="word-break: break-word;"><b>Correo:</b> <br> $correo_usuario</span></h3>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td class="column column-2" width="50%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-left: 50px; padding-right: 35px; padding-top: 10px; vertical-align: top;">
                                                                <table class="heading_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                                    <tr>
                                                                        <td class="pad" style="padding-bottom:5px;text-align:center;width:100%;">
                                                                            <h3 style="margin: 0; color: #150811; direction: ltr; font-family: 'Alfa Slab One','Arial'; font-size: 18px; font-weight: 400; letter-spacing: normal; line-height: 1.2; text-align: left; margin-top: 0; margin-bottom: 0; mso-line-height-alt: 22px;"><span class="tinyMce-placeholder" style="word-break: break-word;">INFORMACION <br> EXTRA</span></h3>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table class="heading_block block-2" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                                    <tr>
                                                                        <td class="pad" style="padding-bottom:5px;padding-top:10px;text-align:center;width:100%;">
                                                                            <h3 style="margin: 0; color: #42383e; direction: ltr; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 14px; font-weight: 400; letter-spacing: normal; line-height: 1.2; text-align: left; margin-top: 0; margin-bottom: 0; mso-line-height-alt: 17px;"><span class="tinyMce-placeholder" style="word-break: break-word;"><b>Fecha Prestamo:</b> <br> $fecha_prestamo</span></h3>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table class="heading_block block-3" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                                    <tr>
                                                                        <td class="pad" style="padding-bottom:5px;padding-top:10px;text-align:center;width:100%;">
                                                                            <h3 style="margin: 0; color: #42383e; direction: ltr; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 14px; font-weight: 400; letter-spacing: normal; line-height: 1.2; text-align: left; margin-top: 0; margin-bottom: 0; mso-line-height-alt: 17px;"><span class="tinyMce-placeholder" style="word-break: break-word;"><b>Fecha Devolicion:</b> <br> $fecha_devolucion</span></h3>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="row row-9" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-left: 2px solid #000000; border-right: 2px solid #000000; color: #000000; background-color: #ffffff; border-bottom: 2px solid #000000; border-radius: 0 0 15px 15px; width: 600px; margin: 0 auto;" width="600">
                                                    <tbody>
                                                        <tr>
                                                            <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 25px; padding-left: 50px; padding-right: 50px; padding-top: 33px; vertical-align: top;">
                                                                <table class="button_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; padding-top:15px;">
                                                                    <tr>
                                                                        <td class="pad" style="padding-left:10px;padding-right:10px;text-align:center;">
                                                                            <div class="alignment" align="center"><a href="http://localhost/biblioteca_proyecto_grado/private/btca/" target="_blank" style="color:#fff;text-decoration:none;"><span class="button" style="background-color: #18171c; border-bottom: 0px solid transparent; border-left: 0px solid transparent; border-radius: 60px; border-right: 0px solid transparent; border-top: 0px solid transparent; color: #fff; display: inline-block; font-family: 'Alfa Slab One','Arial'; font-size: 18px; font-weight: 400; mso-border-alt: none; padding-bottom: 15px; padding-top: 15px; padding-left: 30px; padding-right: 30px; text-align: center; width: auto; word-break: keep-all; letter-spacing: normal;"><span style="word-break: break-word; line-height: 36px;">Nueva Solicitud</span></span></a></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table><!-- End -->
            </body>

            </html>
        
        HTML;

        return $html;
    }
}
