<html>
    <body>
    <form method="post" action="">
        <label>Nombre fichero:</label>
        <input type="text" id="fichero" required>
        <input type="submit" value="Enviar">
    </form>
            

        <?php
        include(dirname(__FILE__)."/ejercicio2metodos.php");

        $tipos = [
            "PDF" => "Documento Adobe PDF",
            "DOC" => "Documento de Microsoft Word",
            "DOCX" => "Documento de Microsoft Word",
            "XLS" => "Hoja de cálculo de Microsoft Excel",
            "XLSX" => "Hoja de cálculo de Microsoft Excel",
            "PPT" => "Presentación de Microsoft PowerPoint",
            "PPTX" => "Presentación de Microsoft PowerPoint",
            "TXT" => "Archivo de texto plano",
            "JPG" => "Imagen JPEG",
            "PNG" => "Imagen PNG",
            "GIF" => "Imagen GIF",
            "MP3" => "Archivo de audio MP3",
            "MP4" => "Archivo de video MP4",
            "ZIP" => "Archivo comprimido ZIP",
            "RAR" => "Archivo comprimido RAR"
        ];

        $solucion = $_POST['fichero'];
        // a) calculamos la extension 
       
        if(!empty($solucion)){
            calcularextension($solucion);
        }

        // a) devolvemos la cadena correspondiente
        if(!empty($solucion)){
            devuelvetipofich($solucion);

            echo"<br> a la extension $solucion le coresponde $ficherosol[solucion]";
        }


        ?>
    </body>
</html>