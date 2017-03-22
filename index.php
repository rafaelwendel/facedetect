<?php
require_once('files_helper.php');

$imagens = get_files_dir('img');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Face Detection</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style>
            .face{ border: 1px solid #fff; }
        </style>
  </head>
  <body>
        <div id="content">
			<p id="info"></p>
			<?php if(count($imagens) > 0) : ?>
			<?php foreach ($imagens as $img) : ?>
            <br />
            <img src="img/<?php echo $img ?>" class="imagem" />
            <?php endforeach; ?>
            <?php else: ?>
            <p>Nenhuma imagem encontrada no diretório</p>
            <?php endif; ?>
        </div>
        <script type="text/javascript" src="js/jquery.js" ></script>
        <script type="text/javascript" src="js/face.js" ></script>
        <script type="text/javascript" src="js/ccv.js" ></script>
        <script type="text/javascript" src="js/jquery.facedetection.js" ></script>
        <script type="text/javascript" src="js/detectar.js" ></script>
  </body>
</html>
