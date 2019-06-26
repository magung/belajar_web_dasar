<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
    <title>Web Design</title>
</head>
<body>


<div class='container' >
    <button class='btn btn-primary btn-sm' onclick=f_bukatabel2()>
        Tampilkan Semua
    </button>
    <button class='btn btn-success btn-sm' onclick=f_bukatabel('Laki-Laki')>
    Laki-Laki
    </button>
    <button class='btn btn-danger btn-sm' onclick=f_bukatabel('Perempuan')>
    Perempuan
    </button>

    <div 
        class='container' 
        id="kotak" 
        style="border:solid 1px;height:535px;overflow-y:scroll">
    </div>
</div>



<?php
	ini_set("max_execution_time",300);
	if(function_exists("date_default_timezone_set")){
		date_default_timezone_set("Asia/Jakarta");
	}

	$get=array("menu","flag","z");
	for($i=0;$i<count($get);$i++){
		if(isset($_GET[$get[$i]]) ==  false) $_GET[$get[$i]]  = "";
		if(isset($_POST[$get[$i]]) == false) $_POST[$get[$i]] = "";
	}
	
	ini_set("display_errors",0);
		$con=mysqli_connect("localhost","zzzz","xxxx","yyyy");
		if(!$con)$con=mysqli_connect("localhost","root","","web_design");
	ini_set("display_errors",1);
	
	$menu=($_POST["menu"]<>""?$_POST["menu"]:$_GET["menu"]);
	$flag=($_POST["flag"]<>""?$_POST["flag"]:$_GET["flag"]);
	$z=($_POST["z"]<>""?$_POST["z"]:$_GET["z"]);
	
	if($_GET["menu"]=="bukatabel")echo urldecode("@|@".baca_data()."@|@");
	if($_GET["menu"]=="bukatabel2")echo urldecode("@|@".baca_semua()."@|@");
	
function baca_data(){
	$q=mysqli_query($GLOBALS["con"],"SELECT id,UPPER(nama) as nama,tempat_lahir,tanggal_lahir,jenis_kelamin FROM web_design where jenis_kelamin = '$_GET[flag]' LIMIT 0,100");
	
	$data="";
	while($h=mysqli_fetch_array($q)){
		$data=$data.
        "<tr>".
        "<td>$h[id]</td>".
        "<td>$h[nama]</td>".
        "<td>$h[tempat_lahir], ".f_convert(32,$h["tanggal_lahir"])."</td>".
        "<td>$h[jenis_kelamin]</td>".
    "<tr>";
	}
	
	$header=
        "<tr>".
        "<th>ID</th>".
        "<th>Nama</th>".
        "<th>Tempat Tanggal Lahir</th>".
        "<th>Jenis Kelamin</th>".
        "<tr>";
			
	$data="<table class='table table-striped'>$header$data</table>";
	
	return $data;
}
function baca_semua(){
	$q=mysqli_query($GLOBALS["con"],"SELECT id,UPPER(nama) as nama,tempat_lahir,tanggal_lahir,jenis_kelamin FROM web_design LIMIT 0,100");
	
	$datas="";
	while($h=mysqli_fetch_array($q)){
		$datas=$datas.
			"<tr>".
				"<td>$h[id]</td>".
				"<td>$h[nama]</td>".
				"<td>$h[tempat_lahir], ".f_convert(32,$h["tanggal_lahir"])."</td>".
				"<td>$h[jenis_kelamin]</td>".
			"<tr>";
	}
	
	$headers=
		"<tr>".
			"<th>ID</th>".
			"<th>Nama</th>".
			"<th>Tempat Tanggal Lahir</th>".
			"<th>Jenis Kelamin</th>".
		"<tr>";
			
	$datas="<table class='table table-striped table-primary'>$headers$datas</table>";
	
	return $datas;
}
    

//----------------------------------------------------------------------------------------------
function f_convert($flag0,$flag1){
	if($flag1=="0000-00-00")return;
	$monthtext=explode("@|@","@|@Januari@|@Februari@|@Maret@|@April@|@Mei@|@Juni@|@Juli@|@Agustus@|@September@|@Oktober@|@November@|@Desember");

	if($flag1==""){return;}
	$flag1=explode("|",$flag1);
	if(count($flag1)==2&&($flag1[0]==""||$flag1[1]==""))return;

	if($flag0==0){return;}

	elseif($flag0==10){$flag1[0]=explode("/",$flag1[0]);return $flag1[0][2]."-".$flag1[0][1]."-".$flag1[0][0];} // d/m/y -> Y-m-d
	elseif($flag0==11){$flag1[0]=explode("/",$flag1[0]);return $flag1[0][0]."&nbsp;".$monthtext[intval($flag1[0][1])]."&nbsp;".$flag1[0][2];} // dd/mm/yyyy -> dd mmmm yyyy
	elseif($flag0==12){$flag1[0]=explode("/",$flag1[0]);return $flag1[0][0]." ".$monthtext[intval($flag1[0][1])]." ".$flag1[0][2];} // dd/mm/yyyy -> dd mmmm yyyy
	elseif($flag0==13){$flag1[0]=explode(" ",$flag1[0]);$flag1[0]=explode("/",$flag1[0][0]);return $flag1[0][2]."-".$flag1[0][1]."-".$flag1[0][0];} // d/m/y (age) -> Y-m-d
	elseif($flag0==14){$flag1[0]=explode("/",$flag1[0]);return $flag1[0][2].$flag1[0][1].$flag1[0][0];} // dd/mm/yyyy -> Ymd
	elseif($flag0==15){$flag1[0]=explode("/",$flag1[0]);return $flag1[0][2]."-".$flag1[0][1]."-".$flag1[0][0];} // dd/mm/yyyy -> Y-m-d

	elseif($flag0==20){$flag1[0]=explode(" ",$flag1[0]);for($i=0;$i<count($monthtext);$i++){if($monthtext[$i]==$flag1[0][1]){$flag1[0][1]=$i;break;}}return ($flag1[0][2]==""||$flag1[0][1]==""||$flag1[0][0]==""?false:$flag1[0][2]."-".$flag1[0][1]."-".$flag1[0][0]);} // dd mmmm yyyy -> Y-m-d
	elseif($flag0==21){$flag1[0]=explode(" ",$flag1[0]);return f_convert(20,$flag1[0][0]." ".$flag1[0][1]." ".$flag1[0][2])." ".$flag1[0][3];} // dd mmmm yyyy hh:nn:ss -> Y-m-d H:i:s
	elseif($flag0==22){$flag1[0]=explode(" ",$flag1[0]);for($i=0;$i<count($monthtext);$i++){if($monthtext[$i]==$flag1[0][1]){$flag1[0][1]=$i;break;}}return $flag1[0][2]."-".$flag1[0][1]."-".$flag1[0][0];} // dd mmmm yyyy -> Y-m-d
	elseif($flag0==23){$flag1[0]=explode(" ",$flag1[0]);for($i=0;$i<count($monthtext);$i++){if($monthtext[$i]==$flag1[0][1]){$flag1[0][1]=$i;break;}}return $flag1[0][2]."-".$flag1[0][1]."-".$flag1[0][0];} // dd mmmm yyyy -> Y-m-d
	elseif($flag0==24){$flag1[0]=explode(" ",$flag1[0]);for($i=0;$i<count($monthtext);$i++){if($monthtext[$i]==$flag1[0][1]){$flag1[0][1]=$i;break;}}return ($flag1[0][2]==""||$flag1[0][1]==""||$flag1[0][0]==""?false:$flag1[0][0]."/".substr("0".$flag1[0][1],-2,2)."/".$flag1[0][2]." ".$flag1[0][3]);} // dd mmmm yyyy hh:nn:ss -> dd/mm/yyyy hh:nn:ss

	elseif($flag0==30){$flag1[0]=explode("-",$flag1[0]);return $flag1[0][2]."/".$flag1[0][1]."/".$flag1[0][0];} // Y-m-d -> dd/mm/yyyy
	elseif($flag0==31){$flag1[0]=explode(" ",$flag1[0]);return f_convert(30,$flag1[0][0])." ".$flag1[0][1];} // Y-m-d H:i:s -> dd/mm/yyyy hh:nn:ss
	elseif($flag0==32){$flag1[0]=explode("-",$flag1[0]);return $flag1[0][2]." ".$monthtext[intval($flag1[0][1])]." ".$flag1[0][0];} // Y-m-d -> dd mmmm yyyy
	elseif($flag0==33){$flag1[0]=explode(" ",$flag1[0]);return f_convert(32,$flag1[0][0])." ".$flag1[0][1];} // Y-m-d H:i:s -> dd mmmm yyyy hh:nn:ss
	elseif($flag0==34){return substr($flag1[0],6,2)."/".substr($flag1[0],4,2)."/".substr($flag1[0],0,4);} // YmdHis -> dd/mm/yyyy
	elseif($flag0==35){return substr($flag1[0],6,2)."/".substr($flag1[0],4,2)."/".substr($flag1[0],0,4)." ".substr($flag1[0],8,2).":".substr($flag1[0],10,2).":".substr($flag1[0],12,2);} // YmdHis -> dd/mm/yyyy hh:nn:ss
	elseif($flag0==36){return substr($flag1[0],0,4)."-".substr($flag1[0],4,2)."-".substr($flag1[0],6,2)." ".substr($flag1[0],8,2).":".substr($flag1[0],10,2).":".substr($flag1[0],12,2);} // YmdHis -> Y-m-d H:i:s
	elseif($flag0==37){return substr($flag1[0],6,2)." ".$monthtext[intval(substr($flag1[0],4,2))]." ".substr($flag1[0],0,4);} // YmdHis -> dd mmmm yyyy
	elseif($flag0==38){$flag1[0]=explode(" ",$flag1[0]);return f_convert(30,$flag1[0][0]);} // Y-m-d H:i:s -> dd/mm/yyyy
	elseif($flag0==39){return substr($flag1[0],6,2)." ".$monthtext[intval(substr($flag1[0],4,2))]." ".substr($flag1[0],0,4)." ".substr($flag1[0],8,2).":".substr($flag1[0],10,2).":".substr($flag1[0],12,2);} // YmdHis -> dd mmmm yyyy hh:nn:ss

	elseif($flag0==40){$diff=abs((strtotime($flag1[0])-strtotime($flag1[1])))/(24*60*60*365.25);return floor($diff);} // usia
	elseif($flag0==41){$diff=abs((strtotime($flag1[0])-strtotime($flag1[1])))/(24*60*60*365.25);return f_convert(30,$flag1[1])." (".floor($diff)." th. ".floor(($diff-floor($diff))*12)." bl.)";} // Y-m-d -> dd/mm/yyyy (th. bl.)
	elseif($flag0==42){$diff=abs((strtotime($flag1[0])-strtotime($flag1[1])))/(24*60*60*365.25);return f_convert(30,$flag1[1])." (".floor($diff)." tahun ".floor(($diff-floor($diff))*12)." bulan)";} // Y-m-d -> dd/mm/yyyy (tahun bulan)
	elseif($flag0==43){$diff=abs((strtotime($flag1[0])-strtotime($flag1[1])))/(24*60*60*365.25);return f_convert(32,$flag1[1])." (".floor($diff)." tahun ".floor(($diff-floor($diff))*12)." bulan)";} // Y-m-d -> dd mmmm yyyy (tahun bulan)
	elseif($flag0==44){$diff=abs((strtotime($flag1[0])-strtotime($flag1[1])))/(24*60*60*365.25);return f_convert(30,$flag1[1])."<br>(".floor($diff)." th. ".floor(($diff-floor($diff))*12)." bl.)";} // Y-m-d -> dd/mm/yyyy<br>(th. bl.)
}

?>

<script>



</script>

</body>
</html>