<?php
    include("../conexion_bd/conexion.php");

    print_r($_POST);
    
    if(!empty($_POST)){
        if(!empty($_POST["id1"] && !empty($_POST["price1"]))){
            $id1 = $_POST["id1"];
            $price = $_POST["price1"];
            $id_camping = $_POST["id_camping"];
            //echo $id1." ".$price." ".$id_camping;
            $sql = "insert into tiene values ($id1,$id_camping,$price)";
            $conn -> query($sql);
            echo $sql;
           
        }
        if(!empty($_POST["id2"] && !empty($_POST["price2"]))){
            $id2 = $_POST["id2"];
            $price = $_POST["price2"];
            $id_camping = $_POST["id_camping"];
            //echo $id1." ".$price." ".$id_camping;
            $sql = "insert into tiene values ($id2,$id_camping,$price)";
            $conn -> query($sql);
            echo $sql;
           
        }
        if(!empty($_POST["id3"] && !empty($_POST["price3"]))){
            $id3 = $_POST["id3"];
            $price = $_POST["price3"];
            $id_camping = $_POST["id_camping"];
            //echo $id1." ".$price." ".$id_camping;
            $sql = "insert into tiene values ($id3,$id_camping,$price)";
            $conn -> query($sql);
            echo $sql;
           
        }
        if(!empty($_POST["id4"] && !empty($_POST["price4"]))){
            $id4 = $_POST["id4"];
            $price = $_POST["price4"];
            $id_camping = $_POST["id_camping"];
            //echo $id1." ".$price." ".$id_camping;
            $sql = "insert into tiene values ($id4,$id_camping,$price)";
            $conn -> query($sql);
            echo $sql;
           
        }
        if(!empty($_POST["id5"] && !empty($_POST["price5"]))){
            $id5 = $_POST["id5"];
            $price = $_POST["price5"];
            $id_camping = $_POST["id_camping"];
            //echo $id1." ".$price." ".$id_camping;
            $sql = "insert into tiene values ($id5,$id_camping,$price)";
            $conn -> query($sql);
            echo $sql;
           
        }
        header("Location: ../incorporacion_servicios.php?id=$id_camping");

    }
    

?>