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
// Create a new DateTime instance for the current date and time
$now = new DateTime();

// Output the date and time in the format "Year-Month-Day Hour:Minute:Second"
echo $now->format('Y-m-d H:i:s');

// Create a new DateTime instance for a specific date
$specificDate = new DateTime('2022-12-31');

// Output the date in the format "Year-Month-Day"
echo $specificDate->format('Y-m-d');
```

---