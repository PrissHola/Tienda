<?php

//prepara la cadena para imprimirla con echo
function Limpiacadena($str)
{
        //convertimos la cadena en UTF-8 derivado de la configuracion actual
        $str=mb_convert_encoding($str, 'UTF-8','ISO-8859-1');
        return $str;
}
?>