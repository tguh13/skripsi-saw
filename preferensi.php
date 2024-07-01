<!DOCTYPE html>
<html lang="en">
  <?php
require "layout/head.php";
require "include/conn.php";
require "W.php";
require "R.php";
?>

  <body>
    <div id="app">
      <?php require "layout/sidebar.php";?>
      <div id="main">
        <header class="mb-3">
          <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
          </a>
        </header>
        <div class="page-heading">
          <h3>Nilai Preferensi (P)</h3>
        </div>
        <div class="page-content">
          <section class="row">
            <div class="col-12">
              <div class="card">

                <div class="card-header">
                  <h4 class="card-title">Tabel Nilai Preferensi (P)</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <p class="card-text">
                    Nilai preferensi (P) merupakan penjumlahan dari perkalian matriks ternormalisasi R dengan vektor bobot W.</p>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                    <caption>
    Nilai Preferensi (P)
  </caption>
  <tr>
    <th>No</th>
    <!-- <th>Alternatif</th> -->
    <th>Nama</th>
    <th>Hasil</th>
  </tr>
  <?php

$P = array();
$res = array();
$m = count($W);
foreach ($R as $i => $r) {
  for ($j = 0; $j < $m; $j++) {
    $P[$i] = (isset($P[$i]) ? $P[$i] : 0) + $r[$j] * $W[$j];
  }
  $res[$i] = [
    'name' => $r[count($r) - 1],
    'result' => $P[$i], 
  ];
}
uasort($res, function($a, $b){
  return $a['result'] > $b['result'] ? -1 : 1;
});
$no = 0;
foreach($res as $i => $v) {
  echo "<tr class='center'>
  <td>" . (++$no) . "</td>
    <td>{$v['name']}</td>
    <td>{$v['result']}</td>
  </tr>";
}
?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <?php require "layout/footer.php";?>
      </div>
    </div>
    <?php require "layout/js.php";?>
  </body>

</html>
