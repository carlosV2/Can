# String

This asserter validates if the given data is of type [string](http://php.net/manual/en/language.types.string.php).

You can use the string asserter as `To::beString()`.

In order to refine the validation, the following functions are available:

### withMinLength

This function checks if the given string has a minimum amount of characters. You can use this function to check
if a string is empty or not.

You can use this function as `To::beString()->withMinLength($min)`.

### withMaxLength

This function checks if the given string has a maximum amount of characters.

You can use this function as `To::beString()->withMaxLength($max)`.
