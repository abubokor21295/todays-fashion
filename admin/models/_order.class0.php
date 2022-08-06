<?php
class Order implements JsonSerializable{
	private $id;
	private $customer_id;
	private $order_date;
	private $delivery_date;
	private $shipping_address;
	private $order_total;
	private $paid_amount;
	private $remark;
	private $status_id;
	private $discount;
	private $vat;
	private $created_at;
	private $updated_at;


	function __construct($_id,$_customer_id,$_order_date,$_delivery_date,$_shipping_address,$_order_total,$_paid_amount,$_remark,$_status_id,$_discount,$_vat,$_created_at,$_updated_at){
		$this->id=$_id;
		$this->customer_id=$_customer_id;
		$this->order_date=$_order_date;
		$this->delivery_date=$_delivery_date;
		$this->shipping_address=$_shipping_address;
		$this->order_total=$_order_total;
		$this->paid_amount=$_paid_amount;
		$this->remark=$_remark;
		$this->status_id=$_status_id;
		$this->discount=$_discount;
		$this->vat=$_vat;
		$this->created_at=$_created_at;
		$this->updated_at=$_updated_at;
	}

	public function set_id($id){
		$this->id=$id;
	}

	public function set_customer_id($customer_id){
		$this->customer_id=$customer_id;
	}

	public function set_order_date($order_date){
		$this->order_date=$order_date;
	}

	public function set_delivery_date($delivery_date){
		$this->delivery_date=$delivery_date;
	}

	public function set_shipping_address($shipping_address){
		$this->shipping_address=$shipping_address;
	}

	public function set_order_total($order_total){
		$this->order_total=$order_total;
	}

	public function set_paid_amount($paid_amount){
		$this->paid_amount=$paid_amount;
	}

	public function set_remark($remark){
		$this->remark=$remark;
	}

	public function set_status_id($status_id){
		$this->status_id=$status_id;
	}

	public function set_discount($discount){
		$this->discount=$discount;
	}

	public function set_vat($vat){
		$this->vat=$vat;
	}

	public function set_created_at($created_at){
		$this->created_at=$created_at;
	}

	public function set_updated_at($updated_at){
		$this->updated_at=$updated_at;
	}

	public function get_id(){
		return $this->id;
	}

	public function get_customer_id(){
		return $this->customer_id;
	}

	public function get_order_date(){
		return $this->order_date;
	}

	public function get_delivery_date(){
		return $this->delivery_date;
	}

	public function get_shipping_address(){
		return $this->shipping_address;
	}

	public function get_order_total(){
		return $this->order_total;
	}

	public function get_paid_amount(){
		return $this->paid_amount;
	}

	public function get_remark(){
		return $this->remark;
	}

	public function get_status_id(){
		return $this->status_id;
	}

	public function get_discount(){
		return $this->discount;
	}

	public function get_vat(){
		return $this->vat;
	}

	public function get_created_at(){
		return $this->created_at;
	}

	public function get_updated_at(){
		return $this->updated_at;
	}

	public function __toString(){
		return "Id:<i>$this->id</i>, Customer_id:<i>$this->customer_id</i>, Order_date:<i>$this->order_date</i>, Delivery_date:<i>$this->delivery_date</i>, Shipping_address:<i>$this->shipping_address</i>, Order_total:<i>$this->order_total</i>, Paid_amount:<i>$this->paid_amount</i>, Remark:<i>$this->remark</i>, Status_id:<i>$this->status_id</i>, Discount:<i>$this->discount</i>, Vat:<i>$this->vat</i>, Created_at:<i>$this->created_at</i>, Updated_at:<i>$this->updated_at</i>";
	}

	public function jsonSerialize(){
		return get_object_vars($this);
	}

	public function json(){
		return json_encode($this);
	}

	static function get_last_id(){
		global $db,$tx;
		$result=$db->query("select max(id) from {$tx}orders");
		list($last_id)=$result->fetch_row();
		return $last_id;
	}

	function save(){
		global $db,$tx;
		$db->query("insert into {$tx}orders(customer_id,order_date,delivery_date,shipping_address,order_total,paid_amount,remark,status_id,discount,vat,created_at,updated_at)values('$this->customer_id','$this->order_date','$this->delivery_date','$this->shipping_address','$this->order_total','$this->paid_amount','$this->remark','$this->status_id','$this->discount','$this->vat','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}

	function update(){
		global $db,$tx;
		$db->query("update {$tx}orders set customer_id='$this->customer_id',order_date='$this->order_date',delivery_date='$this->delivery_date',shipping_address='$this->shipping_address',order_total='$this->order_total',paid_amount='$this->paid_amount',remark='$this->remark',status_id='$this->status_id',discount='$this->discount',vat='$this->vat',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}

	static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}orders where id='$id'");
	}

	static function get_order($id){
		global $db,$tx;
		$result=$db->query("select customer_id,order_date,delivery_date,shipping_address,order_total,paid_amount,remark,status_id,discount,vat,created_at,updated_at from {$tx}orders where id='$id'");
		list($customer_id,$order_date,$delivery_date,$shipping_address,$order_total,$paid_amount,$remark,$status_id,$discount,$vat,$created_at,$updated_at)=$result->fetch_row();
		$order=new Order($id,$customer_id,$order_date,$delivery_date,$shipping_address,$order_total,$paid_amount,$remark,$status_id,$discount,$vat,$created_at,$updated_at);
		return $order;
	}

	static function get_order_for_details($id){
		global $db,$tx;
		$result=$db->query("select c.name,c.mobile,c.email,o.order_date,o.delivery_date,o.shipping_address,o.order_total,o.paid_amount,o.remark,o.status_id,o.discount,o.vat,o.created_at,o.updated_at from {$tx}orders o, {$tx}customers c where o.customer_id=c.id and o.id='$id'");
		$data=[];
		while($row=$result->fetch_object()){
			array_push($data,$row);
		}
		return $data;
	}

	static function get_order_site($id){
		global $db,$tx;
		$result=$db->query("select customer_id,order_date,delivery_date,shipping_address,order_total,paid_amount,remark,status_id,discount,vat,created_at,updated_at from {$tx}orders where id='$id'");
		list($customer_id,$order_date,$delivery_date,$shipping_address,$order_total,$paid_amount,$remark,$status_id,$discount,$vat,$created_at,$updated_at)=$result->fetch_row();
		$order=new Order($id,$customer_id,$order_date,$delivery_date,$shipping_address,$order_total,$paid_amount,$remark,$status_id,$discount,$vat,$created_at,$updated_at);
		return $order;
	}

	static function get_obj_order($id){
		global $db,$tx;
		$result=$db->query("select customer_id,order_date,delivery_date,shipping_address,order_total,paid_amount,remark,status_id,discount,vat,created_at,updated_at from {$tx}orders where id='$id'");
		$row=$result->fetch_object();
		$order=new Order($id,$row->customer_id,$row->order_date,$row->delivery_date,$row->shipping_address,$row->order_total,$row->paid_amount,$row->remark,$row->status_id,$row->discount,$row->vat,$row->created_at,$row->updated_at);
		return $order;
	}

	static function get_order_json($id){
		global $db,$tx;
		$result=$db->query("select customer_id,order_date,delivery_date,shipping_address,order_total,paid_amount,remark,status_id,discount,vat,created_at,updated_at from {$tx}orders where id='$id'");
		$row=$result->fetch_object();
		$order=new Order($id,$row->customer_id,$row->order_date,$row->delivery_date,$row->shipping_address,$row->order_total,$row->paid_amount,$row->remark,$row->status_id,$row->discount,$row->vat,$row->created_at,$row->updated_at);
		return json_encode($order);
	}

	static function order_selectbox($name="cmbOrder"){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}orders");
		$html="<select id='$name' name='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function manage_orders(){
		global $db,$tx;
		$result=$db->query("select id,customer_id,order_date,delivery_date,shipping_address,order_total,paid_amount,remark,status_id,discount,vat,created_at,updated_at from {$tx}orders ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Customer Id</th><th>Order Date</th><th>Delivery Date</th><th>Shipping Address</th><th>Order Total</th><th>Paid Amount</th><th>Remark</th><th>Status Id</th><th>Discount</th><th>Vat</th><th>Created At</th><th>Updated At</th></tr>";
		while(list($id,$customer_id,$order_date,$delivery_date,$shipping_address,$order_total,$paid_amount,$remark,$status_id,$discount,$vat,$created_at,$updated_at)=$result->fetch_row()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-order"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-order"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-order"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$customer_id</td><td>$order_date</td><td>$delivery_date</td><td>$shipping_address</td><td>$order_total</td><td>$paid_amount</td><td>$remark</td><td>$status_id</td><td>$discount</td><td>$vat</td><td>$created_at</td><td>$updated_at</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function manage_obj_orders(){
		global $db,$tx;
		$result=$db->query("select o.id,c.name customer_name,o.order_date,o.delivery_date,o.shipping_address,o.order_total,o.paid_amount from {$tx}orders o,{$tx}customers c where c.id=o.customer_id");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Customer Name</th><th>Order Date</th><th>Delivery Date</th><th>Shipping Address</th><th>Order Total</th><th>Paid Amount</th></tr>";
		while($row=$result->fetch_object()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-order"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-order"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-order"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$row->id</td><td>$row->customer_name</td><td>$row->order_date</td><td>$row->delivery_date</td><td>$row->shipping_address</td><td>$row->order_total</td><td>$row->paid_amount</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_orders(){
		global $db,$tx;
		$result=$db->query("select id,customer_id,order_date,delivery_date,shipping_address,order_total,paid_amount,remark,status_id,discount,vat,created_at,updated_at from {$tx}orders ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Customer Id</th><th>Order Date</th><th>Delivery Date</th><th>Shipping Address</th><th>Order Total</th><th>Paid Amount</th><th>Remark</th><th>Status Id</th><th>Discount</th><th>Vat</th><th>Created At</th><th>Updated At</th></tr>";
		while(list($id,$customer_id,$order_date,$delivery_date,$shipping_address,$order_total,$paid_amount,$remark,$status_id,$discount,$vat,$created_at,$updated_at)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$customer_id</td><td>$order_date</td><td>$delivery_date</td><td>$shipping_address</td><td>$order_total</td><td>$paid_amount</td><td>$remark</td><td>$status_id</td><td>$discount</td><td>$vat</td><td>$created_at</td><td>$updated_at</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_obj_orders(){
		global $db,$tx;
		$result=$db->query("select id,customer_id,order_date,delivery_date,shipping_address,order_total,paid_amount,remark,status_id,discount,vat,created_at,updated_at from {$tx}orders ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Customer Id</th><th>Order Date</th><th>Delivery Date</th><th>Shipping Address</th><th>Order Total</th><th>Paid Amount</th><th>Remark</th><th>Status Id</th><th>Discount</th><th>Vat</th><th>Created At</th><th>Updated At</th></tr>";
		while($row=$result->fetch_object()){
			$html.="<tr><td>$row->id</td><td>$row->customer_id</td><td>$row->order_date</td><td>$row->delivery_date</td><td>$row->shipping_address</td><td>$row->order_total</td><td>$row->paid_amount</td><td>$row->remark</td><td>$row->status_id</td><td>$row->discount</td><td>$row->vat</td><td>$row->created_at</td><td>$row->updated_at</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_orders_json(){
		global $db,$tx;
		$result=$db->query("select id,customer_id,order_date,delivery_date,shipping_address,order_total,paid_amount,remark,status_id,discount,vat,created_at,updated_at from {$tx}orders ");
		$data=[];
		while($row=$result->fetch_object()){
			array_push($data,$row);
		}
		return json_encode($data);
	}

}
?>