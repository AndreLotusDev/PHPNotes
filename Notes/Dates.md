# Date

# mktime

```php
// Get the Unix timestamp for 2:30 PM on December 31, 2022
$timestamp = mktime(14, 30, 0, 12, 31, 2022);
echo $timestamp; // Outputs: 1672480200

echo date("Y-m-d H:i:s", $timestamp); // Outputs: "2022-12-31 14:30:00"
```

---

# DateTime object

```php

$now = new DateTime();

echo $now->format('Y-m-d H:i:s');

$specificDate = new DateTime('2022-12-31');

echo $specificDate->format('Y-m-d');
```

---

# Format

```php
$date = new DateTime('2022-12-31');

echo $date->format('Y-m-d'); // Outputs: "2022-12-31"
```

---

# Modify

```php
$date = new DateTime('2022-12-31');

$date->modify('+1 week');

echo $date->format('Y-m-d'); // Outputs: "2023-01-07"
```

---

# setDate & setTime

```php
$date = new DateTime();

$date->setDate(2022, 12, 31);

$date->setTime(14, 30);

echo $date->format('Y-m-d H:i:s'); // Outputs: "2022-12-31 14:30:00"
```

---

# diff

```php
$date1 = new DateTime('2022-12-31');
$date2 = new DateTime('2023-01-07');

$interval = $date1->diff($date2);

echo $interval->format('%R%a days'); // Outputs: "+7 days"
```

---

# Equality operators

```php
$date1 = new DateTime('2022-12-31');
$date2 = new DateTime('2023-01-01');
$date3 = new DateTime('2022-12-31');

if ($date1 == $date2) {
    echo "date1 is equal to date2";
} else {
    echo "date1 is not equal to date2";
}

if ($date1 == $date3) {
    echo "date1 is equal to date3";
} else {
    echo "date1 is not equal to date3";
}
```

---

# Timezone

```php
$date = new DateTime();
$date->setTimezone(new DateTimeZone('America/New_York'));
echo $date->format('Y-m-d H:i:s'); 
```