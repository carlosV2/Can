# Array

This asserter validates if the given data is of type [array](http://php.net/manual/en/language.types.array.php).

You can use the array asserter as `To::beArray()`.

In order to refine the validation, the following functions are available:

### withMinCount

This function checks if the given array contains a number of items greater or equals than a minimum.

You can use this function as `To::beArray()->withMinCount($min)`.

### withMaxCount

This function checks if the given array contains a number of items lower or equals than a maximum.

You can use this function as `To::beArray()->withMaxCount($max)`.

### withValuesExpected

This function checks if all the items contained in the given array match the asserter.

You can use this function as `To::beArray()->withValuesExpected(To::be*())`.

### withKey

This function registers the given key for future inspection. This function does nothing by itself. It needs to be
combined with `expected` or `withNoOtherKeys` functions.

### expected

This function checks if the given key contains data that matches the given asserter. This function needs a
previous call to `withKey` in order to know which key it needs to apply the asserter to.

You can use this function as `To::beArray()->withKey($key)->expected(To::be*())`.

### withNoOtherKeys

This function checks if the given array contains other non-registered keys. This function needs a previous
call to `withKey` in order to know which keys it needs to check.

You can use this function as `To::beArray()->withKey($key)->withNoOtherKeys()`.
