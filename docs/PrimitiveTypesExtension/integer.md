# Integer

This asserter validates if the given data is of type [integer](http://php.net/manual/en/language.types.integer.php).

You can use the integer asserter as `To::beInteger()` or `To::beInt()`.

In order to refine the validation, the following functions are available:

### withMin

This function checks if the given integer is greater or equals than a minimum.

You can use this function as `To::beInteger()->withMin($min)`.

### withMax

This function checks if the given integer is lower or equals than a maximum.

You can use this function as `To::beString()->withMax($max)`.
