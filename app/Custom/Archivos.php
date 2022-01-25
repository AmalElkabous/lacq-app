<?php
namespace App\Custom;

class Archivos
{
    public static function imagenABase64($ruta_relativa_al_public)
    {
        $path = $ruta_relativa_al_public;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = \File::get($path);

        $base64 = "";
        if ($type == "svg") {
            $base64 = "data:image/svg+xml;base64,".base64_encode($data);
        } else {
            $base64 = "data:image/". $type .";base64,".base64_encode($data);
        }
        return $base64;
    }
}