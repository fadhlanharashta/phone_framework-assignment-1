<?php

// Abstract device
abstract class Device {
    // Attributes
    protected $name;
    protected $brand;
    protected $price;
    protected $stock;

    // Constructor
    public function __construct($name, $brand, $price, $stock) {
        $this->name = $name;
        $this->brand = $brand;
        $this->price = $price;
        $this->stock = $stock;
    }

    abstract public function deviceInfo();
}

// Class inherits from Device
class MobilePhone extends Device {
    // Add os
    private $os;

    // Additional OS attribute 
    public function __construct($name, $brand, $price, $stock, $os) {
        parent::__construct($name, $brand, $price, $stock);
        $this->os = $os;
    }

    // Encapsulation getter for name
    public function getName() {
        return $this->name;
    }

    // Encapsulation getter for stock
    public function getStock() {
        return $this->stock;
    }

    // Encapsulation Getter for price
    public function getPrice() {
        return $this->price;
    }

    // Encapsulation Setter for price
    public function setPrice($newPrice) {
        $this->price = $newPrice;
    }

    // Encapsulation Setter for stock
    public function setStock($newStock) {
        $this->stock = $newStock;
    }

    // Abstraction Display device information
    public function deviceInfo() {
        return "Name: {$this->name}\nBrand  : {$this->brand}\nPrice: {$this->getPrice()}\nStock: {$this->stock}\nOS: {$this->os}\n";
    }
}



// Inventory class
class Inventory {
    private $phones = [];

    // Add new phone to inventory
    public function addPhone(MobilePhone $phone) {
        $this->phones[] = $phone;
    }

    // Delete phone from inventory
    public function deletePhone(MobilePhone $phone) {
        $key = array_search($phone, $this->phones);
        if ($key !== false) {
            unset($this->phones[$key]);
        }
    }

    // Update phone
    public function updatePhone(MobilePhone $phone, $newPrice, $newStock) {
        $key = array_search($phone, $this->phones);
        if ($key !== false) {
            $this->phones[$key]->price = $newPrice;
            $this->phones[$key]->stock = $newStock;
        }
    }

    // Display inventory
    public function displayInventory() {
        foreach ($this->phones as $phone) {
            echo $phone->deviceInfo() . "\n";
        }   
    }
}

// Create instances of MobilePhone
$newPhone1 = new MobilePhone("Samsung Galaxy Z Fold", "Samsung", 600, 20, "Android");
$newPhone2 = new MobilePhone("iPhone 13", "Apple", 800, 15, "iOS");
$newPhone3 = new MobilePhone("Xiaomi Poco F4", "Xiaomi", 400, 4, "Android");
$newPhone4 = new MobilePhone("Esia Hidayah Pro Max", "Esia", 20, 1, "Unknown");

// Create an Inventory
$inventory = new Inventory();

// Add phones to the inventory
$inventory->addPhone($newPhone1);
$inventory->addPhone($newPhone2);
$inventory->addPhone($newPhone3);
$inventory->addPhone($newPhone4);

// Deleting phone from inventory
$inventory->deletePhone($newPhone1);

// Updating phone from inventory
$phoneToUpdate = $newPhone2;
$phoneToUpdate->setPrice(900);
$phoneToUpdate->setStock(4);

// Display the updated inventory
$inventory->displayInventory();
