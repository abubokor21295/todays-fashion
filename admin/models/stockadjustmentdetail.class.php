<?php
class StockAdjustmentDetail implements JsonSerializable{
	public $id;
	public $adjustment_id;
	public $product_id;
	public $qty;
	public $price;

	public function __construct(){
	}
	public function set($id,$adjustment_id,$product_id,$qty,$price){
		$this->id=$id;
		$this->adjustment_id=$adjustment_id;
		$this->product_id=$product_id;
		$this->qty=$qty;
		$this->price=$price;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}stock_adjustment_details(adjustment_id,product_id,qty,price)values('$this->adjustment_id','$this->product_id','$this->qty','$this->price')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}stock_adjustment_details set adjustment_id='$this->adjustment_id',product_id='$this->product_id',qty='$this->qty',price='$this->price' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}stock_adjustment_details where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,adjustment_id,product_id,qty,price from {$tx}stock_adjustment_details");
		$data=[];
		while($stockadjustmentdetail=$result->fetch_object()){
			$data[]=$stockadjustmentdetail;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,adjustment_id,product_id,qty,price from {$tx}stock_adjustment_details $criteria limit $top,$perpage");
		$data=[];
		while($stockadjustmentdetail=$result->fetch_object()){
			$data[]=$stockadjustmentdetail;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}stock_adjustment_details $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,adjustment_id,product_id,qty,price from {$tx}stock_adjustment_details where id='$id'");
		$stockadjustmentdetail=$result->fetch_object();
			return $stockadjustmentdetail;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}stock_adjustment_details");
		$stockadjustmentdetail =$result->fetch_object();
		return $stockadjustmentdetail->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Adjustment Id:$this->adjustment_id<br> 
		Product Id:$this->product_id<br> 
		Qty:$this->qty<br> 
		Price:$this->price<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbStockAdjustmentDetail"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}stock_adjustment_details");
		while($stockadjustmentdetail=$result->fetch_object()){
			$html.="<option value ='$stockadjustmentdetail->id'>$stockadjustmentdetail->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}stock_adjustment_details $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,adjustment_id,product_id,qty,price from {$tx}stock_adjustment_details $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-stockadjustmentdetail\">New StockAdjustmentDetail</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Adjustment Id</th><th>Product Id</th><th>Qty</th><th>Price</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Adjustment Id</th><th>Product Id</th><th>Qty</th><th>Price</th></tr>";
		}
		while($stockadjustmentdetail=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$stockadjustmentdetail->id, "name"=>"Details", "value"=>"Detials", "class"=>"info", "url"=>"details-stockadjustmentdetail"]);
				$action_buttons.= action_button(["id"=>$stockadjustmentdetail->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-stockadjustmentdetail"]);
				$action_buttons.= action_button(["id"=>$stockadjustmentdetail->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"stock_adjustment_details"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$stockadjustmentdetail->id</td><td>$stockadjustmentdetail->adjustment_id</td><td>$stockadjustmentdetail->product_id</td><td>$stockadjustmentdetail->qty</td><td>$stockadjustmentdetail->price</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,adjustment_id,product_id,qty,price from {$tx}stock_adjustment_details where id={$id}");
		$stockadjustmentdetail=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">StockAdjustmentDetail Details</th></tr>";
		$html.="<tr><th>Id</th><td>$stockadjustmentdetail->id</td></tr>";
		$html.="<tr><th>Adjustment Id</th><td>$stockadjustmentdetail->adjustment_id</td></tr>";
		$html.="<tr><th>Product Id</th><td>$stockadjustmentdetail->product_id</td></tr>";
		$html.="<tr><th>Qty</th><td>$stockadjustmentdetail->qty</td></tr>";
		$html.="<tr><th>Price</th><td>$stockadjustmentdetail->price</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
