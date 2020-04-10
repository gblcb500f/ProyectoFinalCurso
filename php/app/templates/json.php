<?php 
/*Esta es la pagina en la cual enviamos la informacion al cliente mediante ajax
  comprobamos si es un array o objecto si es asi se le pasa el array mediante el json_encode y si es texto se le pasa con un echo */
if(is_array($params)){
echo json_encode($params);
}else{
    echo $params;
}
?>