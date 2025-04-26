<?php
class ModelLibros
{
    public static function obtener_libros($valor = '')
    {
        if ($valor != '') {
            $sqlCondition = "AND l.titulo LIKE '%$valor%' OR au.autor_nombre LIKE '%$valor%'";
        }

        $query = "
        SELECT l.id, l.titulo, l.id_autor, l.cantidad, l.id_editorial, l.anio_edicion, l.id_materia, l.num_pagina, l.descripcion, l.imagen, l.pdf_name, l.estado
        FROM libro AS l 
        INNER JOIN autor AS au 
        ON l.id_autor = au.autor_id 
        WHERE l.estado = 'A' $sqlCondition
        GROUP BY l.titulo, l.id_autor 
        ORDER BY l.titulo, l.id_autor ASC;
        ";


        $result = consultar($query);

        return $result;
    }

    public static function espefic_libro($id_libro)
    {
        $query = "SELECT * FROM libro WHERE 1=1 AND id = '$id_libro' AND estado='A'";
        $result = consultar($query);

        return $result[0];
    }

    public static function ingresar_libro($data)
    {
        $titulo = $data['titulo'];
        $descripcion = $data['descripcion'];
        $fecha_edicion = $data['fecha_edicion'];
        $cantidad = $data['cantidad'];
        $numero_paginas = $data['numero_paginas'];
        $autores = $data['autores'];
        $datos = explode(",", $autores);
        $id_autor = $datos[0];
        $categoria = $data['categoria'];
        $datos = explode(",", $categoria);
        $id_categoria = $datos[0];
        $estado = $data['estado'];

        if (isset($_FILES['file'])) {
            $file = $_FILES['file'];
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileType = $file['type'];
            $uploadDirectory = 'public/tools/images/images_libros/';
            $destPath = $uploadDirectory . $fileName;

            if (!is_dir($uploadDirectory)) {
                mkdir($uploadDirectory, 0777, true);
            }

            move_uploaded_file($fileTmpName, $destPath);
            $imagen = $fileName;
        } else {
            $imagen = 'https://static.vecteezy.com/system/resources/previews/011/186/876/non_2x/male-profile-picture-symbol-vector.jpg';
        }

        if (isset($_FILES['pdfFile']) && $_FILES['pdfFile']['error'] === UPLOAD_ERR_OK) {
            $pdf = $_FILES['pdfFile'];
            $pdfName = $pdf['name'];
            $pdfTmpName = $pdf['tmp_name'];
            $pdfSize = $pdf['size'];
            $pdfType = $pdf['type'];
            $pdfExt = strtolower(pathinfo($pdfName, PATHINFO_EXTENSION));

            $uploadPdfDir = 'public/tools/pdf/pdf_libros/';
            if (!is_dir($uploadPdfDir)) mkdir($uploadPdfDir, 0777, true);

            if ($pdfExt === 'pdf' && $pdfType === 'application/pdf' && $pdfSize <= 50 * 1024 * 1024) {
                $pdfFinalName = uniqid('pdf_', true) . '.' . $pdfExt;
                move_uploaded_file($pdfTmpName, $uploadPdfDir . $pdfFinalName);
                $archivo_pdf = $pdfFinalName;
            } else {
                $archivo_pdf = null; // PDF inválido
            }
        } else {
            $archivo_pdf = 'no-pdf.pdf';
        }

        $sqlquery = "INSERT INTO libro (titulo, cantidad, id_autor, anio_edicion, id_materia, num_pagina, descripcion, imagen, pdf_name, estado) VALUES ('$titulo', '$cantidad', '$id_autor', '$fecha_edicion', '$id_categoria', '$numero_paginas', '$descripcion', '$imagen', '$archivo_pdf', '$estado')";

        $res = insertar($sqlquery);

        return $res;
    }
}
