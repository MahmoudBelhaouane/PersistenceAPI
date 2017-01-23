<?php
function buildTableName($dataBaseName, $className){   
    return $dataBaseName.'_'.$className;
}

function asJson($array){   
    return json_encode($array);
}
?>