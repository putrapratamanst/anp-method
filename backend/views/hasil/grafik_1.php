<?php 
include "./config/koneksi.php";
include "./config/library.php";
opendb();
$periode=@$_SESSION['periodenya'];
$kriteria=@$_POST['kriteria'];
$urut=@$_POST['urut'];
if($urut=="") { $urut="DESC"; }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>		
		<title>Grafik Garis</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="css/elegant-press.css" type="text/css" />
        <script src="scripts/elegant-press.js" type="text/javascript"></script>
		<script src="./js/jquery-1.10.2.min.js"></script>
		<script src="./js/knockout-3.0.0.js"></script>
		<script src="./js/globalize.min.js"></script>
		<script src="./js/dx.chartjs.js"></script>
    <style>
		body { background:none; }
		table { border:none; }
		table tr td { border:none; }
	</style>                     
	</head>
	<body>
		<script>
			$(function ()  
				{
   var dataSource = [
    <?php
	if($kriteria=="" || $kriteria==0) {
		$krit="";
	} else {
		$krit="WHERE id_kriteria='".$kriteria."'";
	}
	
	$queryX="SELECT c.id_alternatif_periode, a.id_alternatif, a.alternatif, d.nilai, d.nilai_normal 
			 FROM anp_alternatif as a, anp_alternatif_periode as c, anp_hasil as d
			 WHERE a.id_alternatif=c.id_alternatif AND 
			       c.id_alternatif_periode=d.id_alternatif_periode AND c.id_periode='$periode' ORDER BY d.nilai_normal $urut";
	$hqueryX=querydb($queryX);
	while ($dquX=mysql_fetch_array($hqueryX)){
		$no=$no+1;
    ?>
    { country: "<?php echo $dquX['alternatif'];?>", 
		<?php
		$qk2="SELECT id_kriteria, kriteria FROM anp_kriteria $krit ORDER BY id_kriteria ASC";
		$hk2=querydb($qk2);
		while($dk2=mysql_fetch_array($hk2)){
			//Ambil Nilai yang sudah disimpan (lalu tampilkan)
			$qn="SELECT nilai FROM anp_nilai_eigen WHERE tipe=1 AND id_node_0='$dk2[id_kriteria]' AND id_node='$dquX[id_alternatif_periode]'";
			$hn=querydb($qn);
			$dn=mysql_fetch_array($hn);
			?>
			dua<?php echo"$dk2[id_kriteria]"; ?>: <?php echo number_format($dn['nilai'],2,'.','.'); ?>, 
		<?php } ?>
	},
	<?php } ?>
    /*
    { country: "China", SKHUN: 74.2, BP: 308.6, BTT: 35.1, },
    { country: "Russia", SKHUN: 40, BP: 128.5, BTT: 361.8, },
    { country: "Japan", SKHUN: 22.6, BP: 241.5, BTT: 64.9, },
    { country: "India", SKHUN: 19, BP: 119.3, BTT: 28.9, },
    { country: "Germany", SKHUN: 6.1, BP: 123.6, BTT: 77.3, },
	*/
];

$("#chartContainer").dxChart({
	equalBarWidth: false,
    dataSource: dataSource,
    commonSeriesSettings: {
        argumentField: "country",
        type: "bar"
    },
    series: [
		<?php
		$qk2="SELECT a.*, b.kriteria, b.skala FROM saw_kriteria_periode as a, saw_kriteria as b WHERE a.id_kriteria=b.id_kriteria AND a.id_periode='$periode'";
		$qk2="SELECT id_kriteria, kriteria FROM anp_kriteria ORDER BY id_kriteria ASC";
		$hk2=querydb($qk2);
		while($dk2=mysql_fetch_array($hk2)){
		?>
        { valueField: "dua<?php echo $dk2['id_kriteria']; ?>", name: "<?php echo $dk2['kriteria']; ?>" },
        <?php } ?>
		/*
		{ valueField: "oil", name: "Oil" },
        { valueField: "gas", name: "Natural gas" },
        { valueField: "coal", name: "Coal" },
        { valueField: "nuclear", name: "Nuclear" }
		*/
    ],
    legend: {
        verticalAlignment: "bottom",
        horizontalAlignment: "center",
        itemTextPosition: "bottom"
    },
    title: "",
    tooltip: {
        enabled: true,
        customizeText: function () {
            return this.valueText;
        }
    }
});
}

			);
		</script>
        <div class="cek">
        <form id="form1" name="form1" method="post" action="grafik_1.php">
        <table width="100%" border="0" cellspacing="0" cellpadding="4">
          <tr>
            <td width="6%">Kriteria</td>
            <td width="1%">:</td>
            <td width="84%">
            <select name="kriteria" style="height:25px;">
                <option value="" <?php if($kriteria=="") { echo"selected"; } ?>>- Semua Kriteria -</option>
                <?php
                      opendb();
                      $query="SELECT id_kriteria, kriteria FROM anp_kriteria ORDER BY id_kriteria ASC";
                      $hquery=querydb($query);
                      closedb();
                      while ($dqu=mysql_fetch_array($hquery)) { ?>
                <option value="<?php echo"$dqu[id_kriteria]";?>" <?php if($kriteria==$dqu['id_kriteria']) { echo"selected"; } ?>><?php echo"$dqu[kriteria]";?></option>
                <?php } ?>
            </select>
            <select name="urut" style="height:25px;">
              		<option value="DESC" <?php if($urut=="DESC") { echo"selected"; } ?>>DESC</option>
              		<option value="ASC" <?php if($urut=="ASC") { echo"selected"; } ?>>ASC</option>
            </select>
            </td>
            <td width="9%"><input type="submit" name="b_lihat"  value="Perbarui Grafik" class="tombol"/></td>
          </tr>
        </table>
        </form>
        </div>
 		<div style="width:100%; height:5px; margin-bottom:20px; border-bottom:2px solid #09F;"></div>
		<div class="content">
			<div class="pane">
				<div class="long-title"><h3></h3></div>
				<div id="chartContainer" class="case-container" style="width: 100%; height: 350px;"></div>
			</div>
		</div>
        

	</body>
</html>