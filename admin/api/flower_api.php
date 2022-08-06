<?php

function get_flower(){
    $flower=Flower::get_flowers_json();
    echo $flower;
}

// function get_flowers($id){
//   $flower=Flower::get_flower_json($id);
//   echo $flower;
// }

function delete_flower($id){
    Flower::delete($id);
    echo json_encode(["success"=>$id]);
}

function create_flower($name,$price){
  $flower=new Flower(null,$name,$price);
  $id=$flower->save();
  echo json_encode(["success"=>$id]);
}

function update_flower($id,$name,$price){
    $flower=new Flower($id,$name,$price);
    $flower->update();
    echo json_encode(["success"=>$id]);
}

?>