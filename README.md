# Can

Tool for easy and powerful data validations.

[![License](https://poser.pugx.org/carlosv2/can/license)](https://packagist.org/packages/carlosv2/can)
[![Build Status](https://travis-ci.org/carlosV2/Can.svg?branch=master)](https://travis-ci.org/carlosV2/Can)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/bc563f45-525d-4862-adaf-149bc06578b3/mini.png)](https://insight.sensiolabs.com/projects/bc563f45-525d-4862-adaf-149bc06578b3)

## Why

Imagine I give you this data:

```
$data = [
	'key1' => 123,
	'key2' => 'abc',
	'key3' => true
];
```

And then I ask you to validate it according to the following constraints:

- It must be an array.
- `key1` must contain an integer between `100` and `200`.
- `key2` must contain a non-empty string.
- `key3` must contain either a boolean or a callable.
- If `key4` is set, it must be an array with a maximum of `3` items.
- It cannot have any other key.

How long would your code to validate `$data` be?

Using this project, it can be validated with this code:

```
can($data)->claim(To::beArray()
    ->withKey('key1')->expected(To::beInteger()->withMin(100)->withMax(200))
    ->withKey('key2')->expected(To::beString()->withMinLength(1))
    ->withKey('key3')->expected(To::beOneOf(To::beBoolean(), To::beCallable()))
    ->withKey('key4')->expected(To::beOptionalAnd(To::beArray()->withMaxCount(3)))
    ->withNoOtherKeys()
);
```

## Install

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this project:

```bash
$ composer require carlosv2/can
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

## Documentation

Available documentation:

- [Extending the library with your own asserters](https://github.com/carlosV2/Can/blob/master/docs/extending.md)
- Bundled extensions
  - Primitive types extension
    - [String](https://github.com/carlosV2/Can/blob/master/docs/PrimitiveTypesExtension/string.md)
    - [Integer](https://github.com/carlosV2/Can/blob/master/docs/PrimitiveTypesExtension/integer.md)
    - [Float](https://github.com/carlosV2/Can/blob/master/docs/PrimitiveTypesExtension/float.md)
    - [Array](https://github.com/carlosV2/Can/blob/master/docs/PrimitiveTypesExtension/array.md)
    - [Null](https://github.com/carlosV2/Can/blob/master/docs/PrimitiveTypesExtension/null.md)
    - [Boolean](https://github.com/carlosV2/Can/blob/master/docs/PrimitiveTypesExtension/boolean.md)
    - [Callable](https://github.com/carlosV2/Can/blob/master/docs/PrimitiveTypesExtension/callable.md)
    - [Object](https://github.com/carlosV2/Can/blob/master/docs/PrimitiveTypesExtension/object.md)
  - Constrints extension
    - [One of](https://github.com/carlosV2/Can/blob/master/docs/ConstraintsExtension/one_of.md)
    - [All of](https://github.com/carlosV2/Can/blob/master/docs/ConstraintsExtension/all_of.md)
    - [Optional and](https://github.com/carlosV2/Can/blob/master/docs/ConstraintsExtension/optional_and.md)
    - [Equals to](https://github.com/carlosV2/Can/blob/master/docs/ConstraintsExtension/equals_to.md)
    - [Like](https://github.com/carlosV2/Can/blob/master/docs/ConstraintsExtension/like.md)
    - [Set](https://github.com/carlosV2/Can/blob/master/docs/ConstraintsExtension/set.md)
