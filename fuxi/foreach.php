<?php 

    // $arr = [10,20,30,40,50,60];
    $arr = [
        "name" =>"jack",
        "age" => 16,
        "gender" => true
    ];

    // for($i = 0; $i < count($arr); $i++){
        
    //     echo $arr[$i];
    // }

    foreach( $arr as $key => $value ):

        echo "<b>$key</b>:<span>$value</span><br/>";
    endforeach;


    foreach( $arr as $xxoo){

        echo "$xxoo<br/>";
    }
?>