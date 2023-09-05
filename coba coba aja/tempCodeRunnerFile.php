<?php

// Abstract class Device
abstract class Device {
    // Attributes: name, brand, price, and stock quantity
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

    // Abstract method for Polymorphism
    abstract public function deviceInfo();
}

// MobilePhone class inherits from Device
class MobilePhone extends Device {
    private $os;

    // Constructor with additional attribute 'os'
    public function __construct($name, $brand, $price, $stock, $os) {
        parent::__construct($name, $brand, $price, $stock);
        $this->os = $os;
    }

    // Encapsulation: Getter for 'name'
    public function getName() {
        return $this->name;
    }

    // Encapsulation: Getter for 'stock'
    public function getStock() {
        return $this->stock;
    }

    // Abstraction: Display device information
    public function deviceInfo() {
        return "Name: {$this->name}, Brand: {$this->brand}, Price: {$this->price}, Stock: {$this->stock}, OS: {$this->os}";
    }
}

// Inventory class for main operations
class Inventory {
    private $phones = [];

    // Adding a new phone to the inventory
    public function addPhone(MobilePhone $phone) {
        $this->phones[] = $phone;
    }

    // Deleting a phone from the inventory
    public function deletePhone(MobilePhone $phone) {
        $key = array_search($phone, $this->phones);
        if ($key !== false) {
            unset($this->phones[$key]);
        }
    }

    // Updating phone data (e.g., price and stock)
    public function updatePhone(MobilePhone $phone, $newPrice, $newStock) {
        $key = array_search($phone, $this->phones);
        if ($key !== false) {
            $this->phones[$key]->price = $newPrice;
            $this->phones[$key]->stock = $newStock;
        }
    }

    // Display the inventory
    public function displayInventory() {
        foreach ($this->phones as $phone) {
            echo $phone->deviceInfo() . "\n";
        }
    }
}

// Create instances of MobilePhone
$newPhone1 = new MobilePhone("Samsung Galaxy Z Fold", "Samsung", 600, 20, "Android");
$newPhone2 = new MobilePhone("iPhone 13", "Apple", 800, 15, "iOS");

// Create an Inventory
$inventory = new Inventory();

// Add phones to the inventory
$inventory->addPhone($newPhone1);
$inventory->addPhone($newPhone2);

// Display the inventory
$inventory->displayInventory();