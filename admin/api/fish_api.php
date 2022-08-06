<?php

function get_fish(){
    $fish=Fish::get_fishs_json();
    echo $fish;
}

// function get_fishs($id){
//   $fish=Fishe::get_fish_json($id);
//   echo $fish;
// }

function delete_fish($id){
    Fish::delete($id);
    echo json_encode(["success"=>$id]);
}

function create_fish($name,$price){
  $fishe=new Fish(null,$name,$price);
  $id=$fish->save();
  echo json_encode(["success"=>$id]);
}

function update_fish($id,$name,$price){
    $fish=new Fish($id,$name,$price);
    $fish->update();
    echo json_encode(["success"=>$id]);
}

?>