# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/).

## [Unreleased]

## [1.1.0](../../compare/1.1.0...1.1.1) - 19.09.2023

### Fixed
* Value - Adding a bigger float value resulted into a random value

## [1.1.0](../../compare/1.0.0...1.1.0) - 13.08.2023

### Added
* Contracts (Comparable Property) - An Interface allowing a user to compare two properties
* Contracts (Infinity Exception) - An exception thrown on any infinity related error
* Contracts (Numerical Comparable Property) - An Interface allowing a user to compare two numbers or make other common mathematical operations on a numerical value
* Contracts (Printer Aware Interface) - An Interface allowing a user to set a printer for a property - [\#4](../../issues/4)
* Contracts (Printer Interface) - An Interface used to print a property - [\#4](../../issues/4)
* Contracts (Property Error) - A common Error Interface for this library (PHP native errors are not wrapped)
* Contracts (Property Exception) - A common Exception Interface for this library
* Exceptions (Base Mismatch Error) - An error thrown when two properties have a different base
* Exceptions (Calculation With Infinity Exception) - Thrown when a calculation with infinity is attempted
* Exceptions (Division By Zero Exception) - Thrown when a division by zero is attempted (be aware that native PHP error might be thrown instead)
* Exceptions (Incompatible Property Error) - An error thrown when two properties are incompatible
* Numerical Property - Implementation of Printer Aware Interface - [\#4](../../issues/4)
* Numerical Property - Implementation of Numerical Comparable Property
* Property Calculator (Incomplete Product Resolver) - A resolver used when only a part of an equation is known - [\#1](../../issues/1)
* Quantities (Amount) - Quantity for simple amount, such as a piece
* Quantities (Per Unit) - Quantity for a ratio of two units. Used when no other quantity is applicable - [\#1](../../issues/1)
* Quantities - Method Get Quantity name for translations, used as a key - [\#4](../../issues/4)
* Printers (PHP Local Printer) - Printer using localeconv function to format a property - [\#4](../../issues/4)
* Printers (PHP Monetary Printer) - Printer using localeconv function to format a currency - [\#4](../../issues/4)
* Traits (Compares Numerical Value Trait) - An implementation of Numerical Comparable Property Interface
* Traits (Printer Aware Trait) - An implementation of Printer Aware Interface - [\#4](../../issues/4)
* Traits (Printer Trait) - An implementation of Printer Interface - [\#4](../../issues/4)
* Units (Amount) - Added new units for amount

### Fixed
* GitHub (Actions) - Minimum stability - [\#3](../../issues/3)
* GitHub (Repository) - License - [\#3](../../issues/3)
* Numerical Property - Debug info returns more details
* Numerical Property - Throws more specific exceptions and error instead of native PHP ones
* Property - Throws more specific exceptions and error instead of native PHP ones
* Value - Optimized calculation of the value. Storing the result locally and returning it on subsequent calls
