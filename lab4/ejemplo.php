<?php
if(!isset($_GET['n_cajas']))
    $txt='
        <form>
        <input name="n_cajas"/> Número de cajas (tamaño del array)
        <button>Enviar</button>
        </form>
    ';
    
else{
    $txt='<form action="?n_cajas='.$_GET['n_cajas'];
    $txt.='" method="post">';
    for($i=0;$i<$_GET['n_cajas'];$i++){
        $txt.='<div>';
        $txt.='<input name="caja[]"';
        if(isset($_POST['caja'][$i])
            and is_numeric($_POST['caja'][$i])
            and $_POST['caja'][$i]%2==0)
                $txt.=' value="'.$_POST['caja'][$i].'"';
        $txt.='/>';
        $txt.='</div>';
    }
    $txt.='<button>Enviar</button>';
    $txt.='</form>';
}
echo $txt;