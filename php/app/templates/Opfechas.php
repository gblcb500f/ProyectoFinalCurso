<?php ob_start() ?>
<!-- Esta pagina se la devolvemos al cliente que contendra toda la informacion de las aulas con la informacion que queremos inplementar en el html -->

<div class="content">

   <p>sdgseegws</p>
<?php $contenido = ob_get_clean() ?>

<?php include 'layoutAdmin.php'; ?>