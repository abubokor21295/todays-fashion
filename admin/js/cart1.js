class Cart {
  constructor(id,name,price,qty,discount,vat) {
    this.id = id;
    this.name = name;
    this.price = price;
    this.qty = qty;
    this.discount=discount;
    this.vat=vat;
  }
  // Getter
  get all() {
    return this.calcArea();
  }
  // Method

  save(){
    
  }
  calcArea() {
    return this.height * this.width;
  }
}