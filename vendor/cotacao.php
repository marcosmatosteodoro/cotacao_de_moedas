<div class='container'>
  <div class='container h-100' style='width: 70%; background-color:'>
    <h1 style='margin: 2% 0 2% 150px'>
      COTAÇÃO DE MOEDAS
    </h1>
  </div>

<?php
$json = "https://economia.awesomeapi.com.br/last/USD-BRL,EUR-BRL,CAD-BRL,GBP-BRL,JPY-BRL,ARS-BRL,CNY-BRL,BTC-BRL";
$json_file = file_get_contents($json);   
$json_str = json_decode($json_file, true);

for ($i = 1; $i <= 8; $i++) {
  if($i == 1){
    $cod = "USDBRL";
    $simbolo = "simbolo_USA";
  }
  if($i == 2){
    $cod = "EURBRL";
    $simbolo = "simbolo_EUR";
  }
  if($i == 3){
    $cod = "CADBRL";
    $simbolo = "simbolo_CAD";
  }
  if($i == 4){
    $cod = "GBPBRL";
    $simbolo = "simbolo_GBP";
  }
  if($i == 5){
    $cod = "JPYBRL";
    $simbolo = "simbolo_JPY";
  }
   if($i == 6){
    $cod = "CNYBRL";
    $simbolo = "simbolo_CNY";
  }
   if($i == 7){
    $cod = "ARSBRL";
    $simbolo = "simbolo_ARS";
  }
  if($i == 8){
    $cod = "BTCBRL";
    $simbolo = "simbolo_BITCOIN";
  }
  // number_format($number, 2, '.', ',')
  // number_format(
  $nome = $json_str[$cod]["name"];
  $alta = $json_str[$cod]["high"];
  $baixa = $json_str[$cod]["low"];
  $compra = number_format($json_str[$cod]["bid"], 2, ',', '.');
  $venda = number_format($json_str[$cod]["ask"], 2, ',', '.');
  $variacao = $json_str[$cod]["varBid"];
  $porcentagem = $json_str[$cod]["pctChange"];
  $data = $json_str[$cod]["create_date"];
  $media = ($alta + $baixa)/2;

  $media = number_format($media, 2, ',', '.');
  $alta = number_format($alta, 2, ',', '.');
  $baixa = number_format($baixa, 2, ',', '.');
    
  if($porcentagem >= 0){
    $seta = "seta_cima";
    $cor = "green";
  }
  else{
    $seta ="seta_baixo";
    $cor = "red";
  }


  echo "<div class='container h-100' style='width: 70%; background-color:'>";
  echo "    <div class='col' style='max-width: ; width: 800px'>";
  echo "        <div class='card'>";
  //          <!-- LINHA 1 -->
  echo "            <div class='card-header'>";
  echo "                <h1 class='text-center'>$nome</h1>";
  echo "            </div>";
  //            <!-- LINHA 2 -->
  echo "            <div class='row'>";
                
  echo "              <div class='col-1' style='margin: 1% 0 0 1%'>";
  echo "                  <img style='width:50px' src='vendor/img/$seta.png'>";
  echo "              </div>";

  echo "              <div class='col-7'>";
  echo "                <h1 style='margin: 2% 2% 0 2%'>";
  echo "                  R$$media";
  echo "                </h1>";
  echo "              </div>";

  echo "              <div class='col-2'>";
  echo "                <h4 style='margin: 16% 2% 0 2%; color:$cor'>";
  echo "                  $porcentagem%";
  echo "                </h4>";
  echo "              </div>";

  echo "              <div class='col-1' style='margin: 1px 1px 1px 1px'>";
  echo "                  <img style='width:100px; height:65px' src='vendor/img/$simbolo.png'>";
  echo "              </div>";
  echo "            </div>";
  echo "            <hr style='margin: 0'>";

  //            <!-- LINHA 3 -->
  echo "            <div class='card-body'>";
  echo "              <div class='row'>";

  echo "                <div class='col'>";
  echo "                  <h3>";
  echo "                    Max(dia) R$$alta";
  echo "                  </h3>";
  echo "                </div>";

  echo "                <div class='col'>";
  echo "                  <h3>";
  echo "                    Min(dia) R$$baixa";
  echo "                  </h3>";
  echo "                </div>";

  echo "             </div>";
  echo "            </div>";
  echo "            <hr style='margin: 0'>";

  //            <!-- LINHA 4 -->
  echo "            <div class='card-body'>";
  echo "              <div class='row'>";
  echo "                <div class='col'>";
  echo "                  <h3>";
  echo "                    Compra R$$compra";
  echo "                  </h3>";
  echo "                </div>";

  echo "                <div class='col'>";
  echo "                  <h3>";
  echo "                    Venda R$$venda";
  echo "                  </h3>";
  echo "                </div>";
  echo "              </div>";          
  echo "            </div>";

  echo "        </div>";
  echo "    </div>";
  echo "</div>";
  echo "<br>";
}
?>

</div>