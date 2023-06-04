# Properties  

[![codecov](https://codecov.io/gh/4513/properties/branch/master/graph/badge.svg?token=W9CCYIORFN)](https://codecov.io/gh/4513/properties)

*Yep. This is a calculator.*

The main purpose, however, is not to calculate, but to help developers to get more accurate results when
calculating with floating point numbers. Furthermore, the library comes with several functions:
1. Calculating properties
   * Adding, subtracting, multiplying and dividing numbers
   * More accurate result
     * by trying to use integer instead of floats
     * by trying not to divide numbers when not really necessary *[1]*
2. Quantities
   * Quantities such as a length, a time, etc. are provided (more to come)
   * Multiplying and dividing quantities generates a new quantity (length * length = area)
3. SI and Units
   * SI Prefixes (Centi, Deci, Kilo,...)
   * One can use different Unit of a Quantity and to not worry about the conversion. The units can be automatically
     converted to the base unit of the quantity *[2]*
4. Converting
   * Converting between different units of a quantity
   * One does not have to worry about converting. The properties implement `convertToUnit` method which converts
     the quantity to the given unit. Developer does not have to convert the property before calculating with it,
     because the converting is done automatically.

[1] *The library tries to avoid dividing numbers when not really necessary. For example, when calculating the
multiple numbers, and a dividing action is called, the library stores the value of the division and uses it
as a multiplier for the next number. Only in the end, when the true result is called, the numbers are divided.*
[2] *When adding a meter on 100 Centi meters, the result is 200 Centi meters. The original unit is preserved.*

All units are calculated and have its value based on the default SI units. SI Units are multiplied by 1 by default.

The library does not take a coverage on non-SI units. (They (non-SI) are there just for the sake of completeness.)

---
### Installation
```bash
composer require mibo/properties
```

### Usage
```php
$length = new Length(10, Meter::get());
$length->add(...);
$length->getValue();
```

---
### Logic of the library
Because the library contains a few different functionalities, it is important to understand the logic behind it.

Each functionality is separated from each other and so each class has its own responsibility.

#### Calculators
Calculator does any kind of calculation. It can be a simple addition, or a more complex calculation with
multiplying, dividing, etc. The calculator is responsible for calculating the result. It does not care about
the units, or the quantity of the numbers. It just calculates the result.

**Math**  
The Math is only a class-representation of PHP native Math functions. The only point of the class is not to
call the public functions and rather to use a static class.

**PropertyCalc**  
The Property Calculator is responsible for calculating with properties. Its most complex function is the
division and multiplication of two or more properties, because it must generate a new property of a different
quantity. For example, when multiplying a length with a length, the result is an area. The Property Calculator
is responsible for generating the area property.  
One can override the Property Calculator by setting different Quantities into its public property of quantities.

**UnitConvertor**  
Some units, or rather quantities, are not so easy to convert. Converting a length sounds easy, because all units
share the same 0 value. Like... zero is a zero right? Well, lets see the temperature. 0 Celsius is not the same
as 0 Fahrenheit. So, the Unit Convertor is responsible for converting the units. *Some units are not only about
a coefficient that is applied to the value.*

UnitConvertor can be extended by custom convertor closure, for specified quantities.

#### Quantities
Quantities are the representation of a quantity. Each quantity should have its own class. The quantity class
then contains information about its default unit to be used (by PropertyCalc), and property to be created.  

Some Quantities are derived (such as speed), and so they come with `DerivedQuantity` interface, which makes
them implement a method to retrieve the equation that is used to calculate the property from another properties.
The equations are used by PropertyCalc.

#### Units
Units are the representation of a unit, and are grouped by their quantity. Some units might be used across
multiple quantities, however, one must use the correct unit that belongs to the required quantity.

Units usually stores its name, symbol. 

Units are created only once - they are singletons.

#### Properties
Properties store its true value (integer, or float) - in case of NumericalProperty.  
They do store its quantity and a unit.  
One can say, their main purpose is to store the value which would normally be stored within a variable.  

**The properties are the main objects that should be used by developers.** They do come with common methods
to use mathematical operations on them. 

#### Value
Perhaps the most complex and important part of the library, that is not supposed to be commonly used outside
the library, is class Value. The Value is, in fact, the wrapper of the value within a property, meaning, the
property does not store the 'value' of the integer or float, but rather the Value object, and only that stores
the true value.  
The Value (capital V to be distinguished from the value) is responsible for storing the value. It can be set up
to be an integer (only integers are allowed), or doubles (truly double floating point number), or float (which
is a normal float, no restriction), or, actually, any decimal number. One can specify the precision of the number.  
Furthermore, the Value can be set to be a different base. By default, of course, decimal is used. But any other
base can be used.  
The Value is responsible to optimize the calculations and at the same time, tries to avoid using floats. One
must understand, that because of trying to avoiding floats, the Value might be slower than using floats directly.  

One must understand, that some tests DO fail because the Value is more accurate. For example, when doing 1/3*3
in that order, on an integer property, the result is 0 (1/3 is 0, and 0*3 is 0). However, when using the Value,
the Value stores the first divider (3) into a "store", and one realizing that a multiplication of the same value
is required, the Value removes the divider and does not multiply, which results in integer 1. *(That is a very
simple example, but it shows the point)*

---
### What to expect to be added in the future?
The library will provide more quantities and units. The goal is to add all main quantities that are specified
by SI.

The library will have multiple extensions (or rather library dependents) that will provide more quantities (such
as prices). 

---
### Changes, updates, etc.
The library does not cover that all calculations that do result in an integer now, will result in integer in the
future. We do must meet the requirements of the speed and precision somehow.  

The library does not cover non-SI units and their conversions.

The library does not cover speed of the calculations.

The library does not cover using non-decimal bases. It is a nice feature, but it is not a priority. If bugs are
found, they will be fixed, but other parts of the library are prioritized.
