### 1. `if`, `else if`, `else` Example
Scenario: Assigning a grade based on a student's score.

```php
<?php
$score = 85;

if ($score >= 90) {
    $grade = 'A';
} else if ($score >= 80) {
    $grade = 'B';
} else if ($score >= 70) {
    $grade = 'C';
} else if ($score >= 60) {
    $grade = 'D';
} else {
    $grade = 'F';
}

echo "Your grade is: $grade";
?>
```

In this example, the student's score is checked against several conditions to determine their grade.

### 2. `switch` Statement Example
Scenario: Displaying a message based on the selected day of the week.

```php
<?php
$dayOfWeek = 3; // Let's assume 1 = Monday, 2 = Tuesday, ..., 7 = Sunday

switch ($dayOfWeek) {
    case 1:
        echo "It's Monday, start of a new week!";
        break;
    case 2:
        echo "It's Tuesday, keep going!";
        break;
    case 3:
        echo "It's Wednesday, half way through!";
        break;
    case 4:
        echo "It's Thursday, almost there!";
        break;
    case 5:
        echo "It's Friday, weekend is near!";
        break;
    case 6:
        echo "It's Saturday, enjoy your weekend!";
        break;
    case 7:
        echo "It's Sunday, time to relax!";
        break;
    default:
        echo "Invalid day!";
}
?>
```