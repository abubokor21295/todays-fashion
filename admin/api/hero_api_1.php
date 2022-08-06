<?php

function get_heros(){
    $heros=Hero::get_heros_json();
    echo $heros;
}

function get_hero($id){
  $hero=Hero::get_hero_json($id);
  echo $hero;
}

function delete_hero($id){
    Hero::delete($id);
    echo json_encode(["success"=>$id]);
}

function create_hero($name){
  $hero=new Hero(null,$name);
  $id=$hero->save();
  echo json_encode(["success"=>$id]);
}

function update_hero($id,$name){
    $hero=new Hero($id,$name);
    $hero->update();
    echo json_encode(["success"=>$id]);
}

?>