<?php
class Stock_adjustment_detail implements JsonSerializable{
	private $id;
	private $adjustment_id;
	private $product_id;
	private $qty;
	private $price;


	function __construct($_id,$_adjustment_id,$_product_id,$_qty,$_price){
		$this->id=$_id;
		$this->adjustment_id=$_adjustment_id;
		$this->product_id=$_product_id;
		$this->qty=$_qty;
		$this->price=$_price;
	}

	public function set_id($id){
		$this->id=$id;
	}

	public function set_adjustment_id($adjustment_id){
		$this->adjustment_id=$adjustment_id;
	}

	public function set_product_id($product_id){
		$this->product_id=$product_id;
	}

	public function set_qty($qty){
		$this->qty=$qty;
	}

	public function set_price($price){
		$this->price=$price;
	}

	public function get_id(){
		return $this->id;
	}

	public function get_adjustment_id(){
		return $this->adjustment_id;
	}

	public function get_product_id(){
		return $this->product_id;
	}

	public function get_qty(){
		return $this->qty;
	}

	public function get_price(){
		return $this->price;
	}

	public function __toString(){
		return "Id:<i>$this->id</i>, Adjustment_id:<i>$this->adjustment_id</i>, Product_id:<i>$this->product_id</i>, Qty:<i>$this->qty</i>, Price:<i>$this->price</i>";
	}

	public function jsonSerialize(){
		return get_object_vars($this);
	}

	public function json(){
		return json_encode($this);
	}

	static function get_last_id(){
		global $db,$tx;
		$result=$db->query("select max(id) from {$tx}stock_adjustment_details");
		list($last_id)=$result->fetch_row();
		return $last_id;
	}

	function save(){
		global $db,$tx;
		$db->query("insert into {$tx}stock_adjustment_details(adjustment_id,product_id,qty,price)values('$this->adjustment_id','$this->product_id','$this->qty','$this->price')");
		return $db->insert_id;
	}

	function update(){
		global $db,$tx;
		$db->query("update {$tx}stock_adjustment_details set adjustment_id='$this->adjustment_id',product_id='$this->product_id',qty='$this->qty',price='$this->price' where id='$this->id'");
	}

	static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}stock_adjustment_details where id='$id'");
	}

	static function get_stock_adjustment_detail($id){
		global $db,$tx;
		$result=$db->query("select adjustment_id,product_id,qty,price from {$tx}stock_adjustment_details where id='$id'");
		list($adjustment_id,$product_id,$qty,$price)=$result->fetch_row();
		$stock_adjustment_detail=new Stock_adjustment_detail($id,$adjustment_id,$product_id,$qty,$price);
		return $stock_adjustment_detail;
	}

	static function get_obj_stock_adjustment_detail($id){
		global $db,$tx;
		$result=$db->query("select adjustment_id,product_id,qty,price from {$tx}stock_adjustment_details where id='$id'");
		$row=$result->fetch_object();
		$stock_adjustment_detail=new Stock_adjustment_detail($id,$row->adjustment_id,$row->product_id,$row->qty,$row->price);
		return $stock_adjustment_detail;
	}

	static function get_stock_adjustment_detail_json($id){
		global $db,$tx;
		$result=$db->query("select adjustment_id,product_id,qty,price from {$tx}stock_adjustment_details where id='$id'");
		$row=$result->fetch_object();
		$stock_adjustment_detail=new Stock_adjustment_detail($id,$row->adjustment_id,$row->product_id,$row->qty,$row->price);
		return json_encode($stock_adjustment_detail);
	}

	static function stock_adjustment_detail_selectbox($name="cmbStock_adjustment_detail"){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}stock_adjustment_details");
		$html="<select id='$name' name='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function manage_stock_adjustment_details(){
		global $db,$tx;
		$result=$db->query("select id,adjustment_id,product_id,qty,price from {$tx}stock_adjustment_details ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Adjustment Id</th><th>Product Id</th><th>Qty</th><th>Price</th></tr>";
		while(list($id,$adjustment_id,$product_id,$qty,$price)=$result->fetch_row()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-stock-adjustment-detail"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-stock-adjustment-detail"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-stock-adjustment-detail"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$adjustment_id</td><td>$product_id</td><td>$qty</td><td>$price</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function manage_obj_stock_adjustment_details(){
		global $db,$tx;
		$result=$db->query("select id,adjustment_id,product_id,qty,price from {$tx}stock_adjustment_details ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Adjustment Id</th><th>Product Id</th><th>Qty</th><th>Price</th></tr>";
		while($row=$result->fetch_object()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-stock-adjustment-detail"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-stock-adjustment-detail"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-stock-adjustment-detail"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$row->id</td><td>$row->adjustment_id</td><td>$row->product_id</td><td>$row->qty</td><td>$row->price</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_stock_adjustment_details(){
		global $db,$tx;
		$result=$db->query("select id,adjustment_id,product_id,qty,price from {$tx}stock_adjustment_details ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Adjustment Id</th><th>Product Id</th><th>Qty</th><th>Price</th></tr>";
		while(list($id,$adjustment_id,$product_id,$qty,$price)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$adjustment_id</td><td>$product_id</td><td>$qty</td><td>$price</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_obj_stock_adjustment_details(){
		global $db,$tx;
		$result=$db->query("select id,adjustment_id,product_id,qty,price from {$tx}stock_adjustment_details ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Adjustment Id</th><th>Product Id</th><th>Qty</th><th>Price</th></tr>";
		while($row=$result->fetch_object()){
			$html.="<tr><td>$row->id</td><td>$row->adjustment_id</td><td>$row->product_id</td><td>$row->qty</td><td>$row->price</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_stock_adjustment_details_json(){
		global $db,$tx;
		$result=$db->query("select id,adjustment_id,product_id,qty,price from {$tx}stock_adjustment_details ");
		$data=[];
		while($row=$result->fetch_object()){
			array_push($data,$row);
		}
		return json_encode($data);
	}

}
?>