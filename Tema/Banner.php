<?php if (!isset($_SESSION['banner'])) {
  $current_date = date("Y\-m\-d");
  $sql = "SELECT count(*) FROM eventos_descuentos";
  $memory = $connection->query($sql);

  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $num = $info[0];
    $num = (int) $num;
  }

  $cont = 0;
  $event_date = array();

  for ($cont2 = 0; $cont < $num; $cont2++) {
    $sql = "SELECT *  FROM eventos_descuentos WHERE id='" . $cont2 . "'";
    $memory2 = $connection->query($sql);
    if ($memory2 && $memory2->num_rows > 0) {
      $info = $memory2->fetch_array();
      if ($info['fecha_in'] <= $current_date) {
        if ($info['fecha_fin'] >= $current_date) {
          $name = $info['nombre'];
          $banner = $info['banner'];
          $end_date = date("d-m-Y", strtotime($info['fecha_fin']));
          $start_date = date("d-m-Y", strtotime($info['fecha_in']));
          $percent = $info['porciento']; ?>


          <div id="header">
            <h1 id="banner">
              <?php echo $name;
              if ($banner != '') { ?> -
              <?php }

              echo $banner ?> - Del
              <?php echo $start_date ?> al
              <?php echo $end_date ?>
            </h1>
            <h1 style="color: red;font-size: 22px" id="banner">
              <?php echo $percent ?> % de descuento
            </h1>
            <a href="../Controladores/CerrarBanner.php" id="download">Cerrar</a>
          </div>

        <?php }
      }
      $cont++;
    }
  }
} ?>