<?php
class Product implements JsonSerializable{
	private $id;
	private $name;
	private $offer_price;
	private $manufacturer_id;
	private $regular_price;
	private $description;
	private $photo;
	private $category_id;
	private $section_id;
	private $is_featured;
	private $star;
	private $is_brand;
	private $offer_discount;
	private $uom_id;
	private $weight;
	private $barcode;


	function __construct($_id,$_name,$_offer_price,$_manufacturer_id,$_regular_price,$_description,$_photo,$_category_id,$_section_id,$_is_featured,$_star,$_is_brand,$_offer_discount,$_uom_id,$_weight,$_barcode){
		$this->id=$_id;
		$this->name=$_name;
		$this->offer_price=$_offer_price;
		$this->manufacturer_id=$_manufacturer_id;
		$this->regular_price=$_regular_price;
		$this->description=$_description;
		$this->photo=$_photo;
		$this->category_id=$_category_id;
		$this->section_id=$_section_id;
		$this->is_featured=$_is_featured;
		$this->star=$_star;
		$this->is_brand=$_is_brand;
		$this->offer_discount=$_offer_discount;
		$this->uom_id=$_uom_id;
		$this->weight=$_weight;
		$this->barcode=$_barcode;
	}

	public function set_id($id){
		$this->id=$id;
	}

	public function set_name($name){
		$this->name=$name;
	}

	public function set_offer_price($offer_price){
		$this->offer_price=$offer_price;
	}

	public function set_manufacturer_id($manufacturer_id){
		$this->manufacturer_id=$manufacturer_id;
	}

	public function set_regular_price($regular_price){
		$this->regular_price=$regular_price;
	}

	public function set_description($description){
		$this->description=$description;
	}

	public function set_photo($photo){
		$this->photo=$photo;
	}

	public function set_category_id($category_id){
		$this->category_id=$category_id;
	}

	public function set_section_id($section_id){
		$this->section_id=$section_id;
	}

	public function set_is_featured($is_featured){
		$this->is_featured=$is_featured;
	}

	public function set_star($star){
		$this->star=$star;
	}

	public function set_is_brand($is_brand){
		$this->is_brand=$is_brand;
	}

	public function set_offer_discount($offer_discount){
		$this->offer_discount=$offer_discount;
	}

	public function set_uom_id($uom_id){
		$this->uom_id=$uom_id;
	}

	public function set_weight($weight){
		$this->weight=$weight;
	}

	public function set_barcode($barcode){
		$this->barcode=$barcode;
	}

	public function get_id(){
		return $this->id;
	}

	public function get_name(){
		return $this->name;
	}

	public function get_offer_price(){
		return $this->offer_price;
	}

	public function get_manufacturer_id(){
		return $this->manufacturer_id;
	}

	public function get_regular_price(){
		return $this->regular_price;
	}

	public function get_description(){
		return $this->description;
	}

	public function get_photo(){
		return $this->photo;
	}

	public function get_category_id(){
		return $this->category_id;
	}

	public function get_section_id(){
		return $this->section_id;
	}

	public function get_is_featured(){
		return $this->is_featured;
	}

	public function get_star(){
		return $this->star;
	}

	public function get_is_brand(){
		return $this->is_brand;
	}

	public function get_offer_discount(){
		return $this->offer_discount;
	}

	public function get_uom_id(){
		return $this->uom_id;
	}

	public function get_weight(){
		return $this->weight;
	}

	public function get_barcode(){
		return $this->barcode;
	}

	public function __toString(){
		return "Id:<i>$this->id</i>, Name:<i>$this->name</i>, Offer_price:<i>$this->offer_price</i>, Manufacturer_id:<i>$this->manufacturer_id</i>, Regular_price:<i>$this->regular_price</i>, Description:<i>$this->description</i>, Photo:<i>$this->photo</i>, Category_id:<i>$this->category_id</i>, Section_id:<i>$this->section_id</i>, Is_featured:<i>$this->is_featured</i>, Star:<i>$this->star</i>, Is_brand:<i>$this->is_brand</i>, Offer_discount:<i>$this->offer_discount</i>, Uom_id:<i>$this->uom_id</i>, Weight:<i>$this->weight</i>, Barcode:<i>$this->barcode</i>";
	}

	public function jsonSerialize(){
		return get_object_vars($this);
	}

	public function json(){
		return json_encode($this);
	}

	static function get_last_id(){
		global $db,$tx;
		$result=$db->query("select max(id) from {$tx}products");
		list($last_id)=$result->fetch_row();
		return $last_id;
	}

	function save(){
		global $db,$tx;
		$db->query("insert into {$tx}products(name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,is_featured,star,is_brand,offer_discount,uom_id,weight,barcode)values('$this->name','$this->offer_price','$this->manufacturer_id','$this->regular_price','$this->description','$this->photo','$this->category_id','$this->section_id','$this->is_featured','$this->star','$this->is_brand','$this->offer_discount','$this->uom_id','$this->weight','$this->barcode')");
		return $db->insert_id;
	}

	function update(){
		global $db,$tx;
		$db->query("update {$tx}products set name='$this->name',offer_price='$this->offer_price',manufacturer_id='$this->manufacturer_id',regular_price='$this->regular_price',description='$this->description',photo='$this->photo',category_id='$this->category_id',section_id='$this->section_id',is_featured='$this->is_featured',star='$this->star',is_brand='$this->is_brand',offer_discount='$this->offer_discount',uom_id='$this->uom_id',weight='$this->weight',barcode='$this->barcode' where id='$this->id'");
	}

	static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}products where id='$id'");
	}

	static function get_product($id){
		global $db,$tx;
		$result=$db->query("select name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,is_featured,star,is_brand,offer_discount,uom_id,weight,barcode from {$tx}products where id='$id'");
		list($name,$offer_price,$manufacturer_id,$regular_price,$description,$photo,$category_id,$section_id,$is_featured,$star,$is_brand,$offer_discount,$uom_id,$weight,$barcode)=$result->fetch_row();
		$product=new Product($id,$name,$offer_price,$manufacturer_id,$regular_price,$description,$photo,$category_id,$section_id,$is_featured,$star,$is_brand,$offer_discount,$uom_id,$weight,$barcode);
		return $product;
	}

	static function get_obj_product($id){
		global $db,$tx;
		$result=$db->query("select name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,is_featured,star,is_brand,offer_discount,uom_id,weight,barcode from {$tx}products where id='$id'");
		$row=$result->fetch_object();
		$product=new Product($id,$row->name,$row->offer_price,$row->manufacturer_id,$row->regular_price,$row->description,$row->photo,$row->category_id,$row->section_id,$row->is_featured,$row->star,$row->is_brand,$row->offer_discount,$row->uom_id,$row->weight,$row->barcode);
		return $product;
	}

	static function get_product_json($id){
		global $db,$tx;
		$result=$db->query("select name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,is_featured,star,is_brand,offer_discount,uom_id,weight,barcode from {$tx}products where id='$id'");
		$row=$result->fetch_object();
		$product=new Product($id,$row->name,$row->offer_price,$row->manufacturer_id,$row->regular_price,$row->description,$row->photo,$row->category_id,$row->section_id,$row->is_featured,$row->star,$row->is_brand,$row->offer_discount,$row->uom_id,$row->weight,$row->barcode);
		return json_encode($product);
	}
	static function get_products_site_all(){
		global $db,$tx;
		$result=$db->query("select name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,is_featured,star,is_brand,offer_discount,uom_id,weight,barcode from {$tx}products order by id limit 4");
		
		return $result;
	}
	static function get_products_all(){
		global $db,$tx;
		$result=$db->query("select name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,is_featured,star,is_brand,offer_discount,uom_id,weight,barcode from {$tx}products order by id");
		
		return $result;
	}
	static function get_products_site_women(){
		global $db,$tx;
		$result=$db->query("select name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,is_featured,star,is_brand,offer_discount,uom_id,weight,barcode from {$tx}products where category_id=3 order by id desc limit 5");
		
		return $result;
	}
	static function get_products_women(){
		global $db,$tx;
		$result=$db->query("select name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,is_featured,star,is_brand,offer_discount,uom_id,weight,barcode from {$tx}products where category_id=3 order by id desc");
		
		return $result;
	}
	static function get_products_site_men(){
		global $db,$tx;
		$result=$db->query("select name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,is_featured,star,is_brand,offer_discount,uom_id,weight,barcode from {$tx}products where category_id=2 order by id desc limit 5");
		
		return $result;
	}
	static function get_products_men(){
		global $db,$tx;
		$result=$db->query("select name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,is_featured,star,is_brand,offer_discount,uom_id,weight,barcode from {$tx}products where category_id=2 order by id desc");
		
		return $result;
	}
	static function get_products_site_child(){
		global $db,$tx;
		$result=$db->query("select name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,is_featured,star,is_brand,offer_discount,uom_id,weight,barcode from {$tx}products where category_id=4 order by id desc limit 5");
		
		return $result;
	}
	static function get_products_child(){
		global $db,$tx;
		$result=$db->query("select name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,is_featured,star,is_brand,offer_discount,uom_id,weight,barcode from {$tx}products where category_id=4 order by id desc");
		
		return $result;
	}
	static function get_products_site_new(){
		global $db,$tx;
		$result=$db->query("select name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,is_featured,star,is_brand,offer_discount,uom_id,weight,barcode from {$tx}products order by id desc limit 12");
		
		return $result;
	}
	static function get_products_new(){
		global $db,$tx;
		$result=$db->query("select name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,is_featured,star,is_brand,offer_discount,uom_id,weight,barcode from {$tx}products order by id desc");
		
		return $result;
	}
	

	static function product_selectbox($name="cmbProduct"){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}products");
		$html="<select id='$name' name='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function manage_products(){
		global $db,$tx;
		$result=$db->query("select id,name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,is_featured,star,is_brand,offer_discount,uom_id,weight,barcode from {$tx}products ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Offer Price</th><th>Manufacturer Id</th><th>Regular Price</th><th>Description</th><th>Photo</th><th>Category Id</th><th>Section Id</th><th>Is Featured</th><th>Star</th><th>Is Brand</th><th>Offer Discount</th><th>Uom Id</th><th>Weight</th><th>Barcode</th></tr>";
		while(list($id,$name,$offer_price,$manufacturer_id,$regular_price,$description,$photo,$category_id,$section_id,$is_featured,$star,$is_brand,$offer_discount,$uom_id,$weight,$barcode)=$result->fetch_row()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-product"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-product"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-product"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$name</td><td>$offer_price</td><td>$manufacturer_id</td><td>$regular_price</td><td>$description</td><td><img src='img/$photo' width='150' /> </td><td>$category_id</td><td>$section_id</td><td>$is_featured</td><td>$star</td><td>$is_brand</td><td>$offer_discount</td><td>$uom_id</td><td>$weight</td><td>$barcode</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function manage_obj_products(){
		global $db,$tx;
		$result=$db->query("select p.id,p.name,p.offer_price,p.regular_price,m.name manufacturer_name,p.photo from {$tx}products p, {$tx}manufacturers m where m.id=p.manufacturer_id");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Offer Price</th><th>Regular Price</th><th>Manufacturer Name</th><th>Photo</th></tr>";
		while($row=$result->fetch_object()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-product"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-product"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-product"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$row->id</td><td>$row->name</td><td>$row->offer_price</td><td>$row->regular_price</td><td>$row->manufacturer_name</td><td><img src='img/$row->photo' width='150' /> </td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_products(){
		global $db,$tx;
		$result=$db->query("select id,name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,is_featured,star,is_brand,offer_discount,uom_id,weight,barcode from {$tx}products ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Offer Price</th><th>Manufacturer Id</th><th>Regular Price</th><th>Description</th><th>Photo</th><th>Category Id</th><th>Section Id</th><th>Is Featured</th><th>Star</th><th>Is Brand</th><th>Offer Discount</th><th>Uom Id</th><th>Weight</th><th>Barcode</th></tr>";
		while(list($id,$name,$offer_price,$manufacturer_id,$regular_price,$description,$photo,$category_id,$section_id,$is_featured,$star,$is_brand,$offer_discount,$uom_id,$weight,$barcode)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$name</td><td>$offer_price</td><td>$manufacturer_id</td><td>$regular_price</td><td>$description</td><td><img src='img/$photo' width='150' /> </td><td>$category_id</td><td>$section_id</td><td>$is_featured</td><td>$star</td><td>$is_brand</td><td>$offer_discount</td><td>$uom_id</td><td>$weight</td><td>$barcode</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_obj_products(){
		global $db,$tx;
		$result=$db->query("select id,name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,is_featured,star,is_brand,offer_discount,uom_id,weight,barcode from {$tx}products ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Offer Price</th><th>Manufacturer Id</th><th>Regular Price</th><th>Description</th><th>Photo</th><th>Category Id</th><th>Section Id</th><th>Is Featured</th><th>Star</th><th>Is Brand</th><th>Offer Discount</th><th>Uom Id</th><th>Weight</th><th>Barcode</th></tr>";
		while($row=$result->fetch_object()){
			$html.="<tr><td>$row->id</td><td>$row->name</td><td>$row->offer_price</td><td>$row->manufacturer_id</td><td>$row->regular_price</td><td>$row->description</td><td><img src='img/$row->photo' width='150' /> </td><td>$row->category_id</td><td>$row->section_id</td><td>$row->is_featured</td><td>$row->star</td><td>$row->is_brand</td><td>$row->offer_discount</td><td>$row->uom_id</td><td>$row->weight</td><td>$row->barcode</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_products_json(){
		global $db,$tx;
		$result=$db->query("select id,name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,is_featured,star,is_brand,offer_discount,uom_id,weight,barcode from {$tx}products ");
		$data=[];
		while($row=$result->fetch_object()){
			array_push($data,$row);
		}
		return json_encode($data);
	}

}
?>