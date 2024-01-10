# Code Include PHP

#### Example of code inclusion in PHP

```php
<?php
function sayHello() {
    echo "Hello, World!";
}
?>

<?php
include 'file1.php';

sayHello();
?>
```

---

# Code Require PHP

#### Example of code requiring in PHP

```php
<?php
function calculateDiscount($productValue, $category) {
    $discounts = [
        "electronics" => 0.10,
        "clothing" => 0.20,
        "food" => 0.05
    ];

    if (array_key_exists($category, $discounts)) {
        $discount = $discounts[$category];
        $discountedValue = $productValue * (1 - $discount);
    } else {
        $discountedValue = $productValue;
    }

    return $discountedValue;
}
?>

<?php
require 'file1.php';

$discountedPrice = calculateDiscount(100, 'electronics');  
echo $discountedPrice;  
?>
```
---

# Short tags

This code is highly unrecommended because some server can not work

To configure this, change the php.ini short_open_tag=Off then turn on

```php
<?= echo "teste"; ?>
```

---

# Code show

Example 

```php
<?= "teste" ?>
```

---

# HTML + PHP

```php
<?php
$name = "John Doe";
echo "<p>Hello, $name</p>";
?>
```