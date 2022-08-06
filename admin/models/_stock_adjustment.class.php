<?php
class Stock_adjustment implements JsonSerializable{
	private $id;
	private $adjustment_at;
	private $user_id;
	private $remark;
	private $adjustment_type_id;
	private $werehouse_id;


	function __construct($_id,$_adjustment_at,$_user_id,$_remark,$_adjustment_type_id,$_werehouse_id){
		$this->id=$_id;
		$this->adjustment_at=$_adjustment_at;
		$this->user_id=$_user_id;
		$this->remark=$_remark;
		$this->adjustment_type_id=$_adjustment_type_id;
		$this->werehouse_id=$_werehouse_id;
	}

	public function set_id($id){
		$this->id=$id;
	}

	public function set_adjustment_at($adjustment_at){
		$this->adjustment_at=$adjustment_at;
	}

	public function set_user_id($user_id){
		$this->user_id=$user_id;
	}

	public function set_remark($remark){
		$this->remark=$remark;
	}

	public function set_adjustment_type_id($adjustment_type_id){
		$this->adjustment_type_id=$adjustment_type_id;
	}

	public function set_werehouse_id($werehouse_id){
		$this->werehouse_id=$werehouse_id;
	}

	public function get_id(){
		return $this->id;
	}

	public function get_adjustment_at(){
		return $this->adjustment_at;
	}

	public function get_user_id(){
		return $this->user_id;
	}

	public function get_remark(){
		return $this->remark;
	}

	public function get_adjustment_type_id(){
		return $this->adjustment_type_id;
	}

	public function get_werehouse_id(){
		return $this->werehouse_id;
	}

	public function __toString(){
		return "Id:<i>$this->id</i>, Adjustment_at:<i>$this->adjustment_at</i>, User_id:<i>$this->user_id</i>, Remark:<i>$this->remark</i>, Adjustment_type_id:<i>$this->adjustment_type_id</i>, Werehouse_id:<i>$this->werehouse_id</i>";
	}

	public function jsonSerialize(){
		return get_object_vars($this);
	}

	public function json(){
		return json_encode($this);
	}

	static function get_last_id(){
		global $db,$tx;
		$result=$db->query("select max(id) from {$tx}stock_adjustments");
		list($last_id)=$result->fetch_row();
		return $last_id;
	}

	function save(){
		global $db,$tx;
		$db->query("insert into {$tx}stock_adjustments(adjustment_at,user_id,remark,adjustment_type_id,werehouse_id)values('$this->adjustment_at','$this->user_id','$this->remark','$this->adjustment_type_id','$this->werehouse_id')");
		return $db->insert_id;
	}

	function update(){
		global $db,$tx;
		$db->query("update {$tx}stock_adjustments set adjustment_at='$this->adjustment_at',user_id='$this->user_id',remark='$this->remark',adjustment_type_id='$this->adjustment_type_id',werehouse_id='$this->werehouse_id' where id='$this->id'");
	}

	static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}stock_adjustments where id='$id'");
	}

	static function get_stock_adjustment($id){
		global $db,$tx;
		$result=$db->query("select adjustment_at,user_id,remark,adjustment_type_id,werehouse_id from {$tx}stock_adjustments where id='$id'");
		list($adjustment_at,$user_id,$remark,$adjustment_type_id,$werehouse_id)=$result->fetch_row();
		$stock_adjustment=new Stock_adjustment($id,$adjustment_at,$user_id,$remark,$adjustment_type_id,$werehouse_id);
		return $stock_adjustment;
	}

	static function get_obj_stock_adjustment($id){
		global $db,$tx;
		$result=$db->query("select adjustment_at,user_id,remark,adjustment_type_id,werehouse_id from {$tx}stock_adjustments where id='$id'");
		$row=$result->fetch_object();
		$stock_adjustment=new Stock_adjustment($id,$row->adjustment_at,$row->user_id,$row->remark,$row->adjustment_type_id,$row->werehouse_id);
		return $stock_adjustment;
	}

	static function get_stock_adjustment_json($id){
		global $db,$tx;
		$result=$db->query("select adjustment_at,user_id,remark,adjustment_type_id,werehouse_id from {$tx}stock_adjustments where id='$id'");
		$row=$result->fetch_object();
		$stock_adjustment=new Stock_adjustment($id,$row->adjustment_at,$row->user_id,$row->remark,$row->adjustment_type_id,$row->werehouse_id);
		return json_encode($stock_adjustment);
	}

	static function stock_adjustment_selectbox($name="cmbStock_adjustment"){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}stock_adjustments");
		$html="<select id='$name' name='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function manage_stock_adjustments(){
		global $db,$tx;
		$result=$db->query("select id,adjustment_at,user_id,remark,adjustment_type_id,werehouse_id from {$tx}stock_adjustments ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Adjustment At</th><th>User Id</th><th>Remark</th><th>Adjustment Type Id</th><th>Werehouse Id</th></tr>";
		while(list($id,$adjustment_at,$user_id,$remark,$adjustment_type_id,$werehouse_id)=$result->fetch_row()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-stock-adjustment"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-stock-adjustment"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-stock-adjustment"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$adjustment_at</td><td>$user_id</td><td>$remark</td><td>$adjustment_type_id</td><td>$werehouse_id</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function manage_obj_stock_adjustments(){
		global $db,$tx;
		$result=$db->query("select id,adjustment_at,user_id,remark,adjustment_type_id,werehouse_id from {$tx}stock_adjustments ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Adjustment At</th><th>User Id</th><th>Remark</th><th>Adjustment Type Id</th><th>Werehouse Id</th></tr>";
		while($row=$result->fetch_object()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-stock-adjustment"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-stock-adjustment"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-stock-adjustment"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$row->id</td><td>$row->adjustment_at</td><td>$row->user_id</td><td>$row->remark</td><td>$row->adjustment_type_id</td><td>$row->werehouse_id</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_stock_adjustments(){
		global $db,$tx;
		$result=$db->query("select id,adjustment_at,user_id,remark,adjustment_type_id,werehouse_id from {$tx}stock_adjustments ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Adjustment At</th><th>User Id</th><th>Remark</th><th>Adjustment Type Id</th><th>Werehouse Id</th></tr>";
		while(list($id,$adjustment_at,$user_id,$remark,$adjustment_type_id,$werehouse_id)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$adjustment_at</td><td>$user_id</td><td>$remark</td><td>$adjustment_type_id</td><td>$werehouse_id</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_obj_stock_adjustments(){
		global $db,$tx;
		$result=$db->query("select id,adjustment_at,user_id,remark,adjustment_type_id,werehouse_id from {$tx}stock_adjustments ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Adjustment At</th><th>User Id</th><th>Remark</th><th>Adjustment Type Id</th><th>Werehouse Id</th></tr>";
		while($row=$result->fetch_object()){
			$html.="<tr><td>$row->id</td><td>$row->adjustment_at</td><td>$row->user_id</td><td>$row->remark</td><td>$row->adjustment_type_id</td><td>$row->werehouse_id</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_stock_adjustments_json(){
		global $db,$tx;
		$result=$db->query("select id,adjustment_at,user_id,remark,adjustment_type_id,werehouse_id from {$tx}stock_adjustments ");
		$data=[];
		while($row=$result->fetch_object()){
			array_push($data,$row);
		}
		return json_encode($data);
	}

}
?>