function f_bukatabel($kelamin){
    $.get("index.php?menu=bukatabel&flag="+$kelamin,
        function($data){
            $data=f_split($data);
            $("#kotak").html($data);
        }
    );
}

function f_split($data){
    $data=$data.split("@|@");
    $data.shift();
    $data.pop();
    return $data;
}

function f_bukatabel2(){
    $.get("index.php?menu=bukatabel2",
        function($datas){
            $datas=f_split2($datas);
            $("#kotak").html($datas);
        }
    );
}

function f_split2($datas){
    $datas=$datas.split("@|@");
    $datas.shift();
    $datas.pop();
    return $datas;
}
