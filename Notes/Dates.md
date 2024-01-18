# Date

```php
<?php
// MySQL DATETIME format
echo date("Y-m-d H:i:s"); 
// Output: 2024-01-18 15:30:45
?>
```

```php
<?php
// British format with day leading
echo date("d/m/Y"); 
// Output: 18/01/2024
?>
```

```php 
<?php
// Time only
echo date("H:i:s"); 
// Output: 15:30:45
?>
```

```php
<?php
// Full textual day of the week
echo date("l"); 
// Output: Thursday
?>
```

```php
<?php
// Full textual month
echo date("F"); 
// Output: January
?>
```

---

### Additional Formats:

```php
<?php
// RFC 2822 formatted date
echo date("r");
// Output: Thu, 18 Jan 2024 15:30:45 +0000
?>
```

```php
<?php
// ISO 8601 date
echo date("c");
// Output: 2024-01-18T15:30:45+00:00
?>
```

```php
<?php
// Short month and day
echo date("M j");
// Output: Jan 18
?>
```

```php
<?php
// Weekday and time
echo date("D H:i");
// Output: Thu 15:30
?>
```

```php
<?php
// Year and week number
echo date("o \WW");
// Output: 2024 W03
?>
```
---