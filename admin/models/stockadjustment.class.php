<?php
class StockAdjustment implements JsonSerializable{
	public $id;
	public $adjustment_at;
	public $user_id;
	public $remark;
	public $adjustment_type_id;
	public $warehouse_id;

	public function __construct(){
	}
	public function set($id,$adjustment_at,$user_id,$remark,$adjustment_type_id,$warehouse_id){
		$this->id=$id;
		$this->adjustment_at=$adjustment_at;
		$this->user_id=$user_id;
		$this->remark=$remark;
		$this->adjustment_type_id=$adjustment_type_id;
		$this->warehouse_id=$warehouse_id;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}stock_adjustments(adjustment_at,user_id,remark,adjustment_type_id,warehouse_id)values('$this->adjustment_at','$this->user_id','$this->remark','$this->adjustment_type_id','$this->warehouse_id')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}stock_adjustments set adjustment_at='$this->adjustment_at',user_id='$this->user_id',remark='$this->remark',adjustment_type_id='$this->adjustment_type_id',warehouse_id='$this->warehouse_id' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}stock_adjustments where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,adjustment_at,user_id,remark,adjustment_type_id,warehouse_id from {$tx}stock_adjustments");
		$data=[];
		while($stockadjustment=$result->fetch_object()){
			$data[]=$stockadjustment;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,adjustment_at,user_id,remark,adjustment_type_id,warehouse_id from {$tx}stock_adjustments $criteria limit $top,$perpage");
		$data=[];
		while($stockadjustment=$result->fetch_object()){
			$data[]=$stockadjustment;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}stock_adjustments $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,adjustment_at,user_id,remark,adjustment_type_id,warehouse_id from {$tx}stock_adjustments where id='$id'");
		$stockadjustment=$result->fetch_object();
			return $stockadjustment;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}stock_adjustments");
		$stockadjustment =$result->fetch_object();
		return $stockadjustment->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Adjustment At:$this->adjustment_at<br> 
		User Id:$this->user_id<br> 
		Remark:$this->remark<br> 
		Adjustment Type Id:$this->adjustment_type_id<br> 
		Warehouse Id:$this->warehouse_id<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbStockAdjustment"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}stock_adjustments");
		while($stockadjustment=$result->fetch_object()){
			$html.="<option value ='$stockadjustment->id'>$stockadjustment->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}stock_adjustments $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,adjustment_at,user_id,remark,adjustment_type_id,warehouse_id from {$tx}stock_adjustments $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-stockadjustment\">New StockAdjustment</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Adjustment At</th><th>User Id</th><th>Remark</th><th>Adjustment Type Id</th><th>Warehouse Id</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Adjustment At</th><th>User Id</th><th>Remark</th><th>Adjustment Type Id</th><th>Warehouse Id</th></tr>";
		}
		while($stockadjustment=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$stockadjustment->id, "name"=>"Details", "value"=>"Detials", "class"=>"info", "url"=>"details-stockadjustment"]);
				$action_buttons.= action_button(["id"=>$stockadjustment->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-stockadjustment"]);
				$action_buttons.= action_button(["id"=>$stockadjustment->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"stock_adjustments"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$stockadjustment->id</td><td>$stockadjustment->adjustment_at</td><td>$stockadjustment->user_id</td><td>$stockadjustment->remark</td><td>$stockadjustment->adjustment_type_id</td><td>$stockadjustment->warehouse_id</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,adjustment_at,user_id,remark,adjustment_type_id,warehouse_id from {$tx}stock_adjustments where id={$id}");
		$stockadjustment=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">StockAdjustment Details</th></tr>";
		$html.="<tr><th>Id</th><td>$stockadjustment->id</td></tr>";
		$html.="<tr><th>Adjustment At</th><td>$stockadjustment->adjustment_at</td></tr>";
		$html.="<tr><th>User Id</th><td>$stockadjustment->user_id</td></tr>";
		$html.="<tr><th>Remark</th><td>$stockadjustment->remark</td></tr>";
		$html.="<tr><th>Adjustment Type Id</th><td>$stockadjustment->adjustment_type_id</td></tr>";
		$html.="<tr><th>Warehouse Id</th><td>$stockadjustment->warehouse_id</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
