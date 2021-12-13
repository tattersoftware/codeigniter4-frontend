# Upgrade Guide

## Version 1 to 2
***

The biggest change is the update to Bootstrap 5 that no longer requires jQuery, which has
been removed from this library as well. This has the following effects on other dependencies:

* AdminLTE now requires version 4 which is an entirely different philosophy and set of plugins
* DataTables is a jQuery plugin so was replaced by [List.js](https://listjs.com)
