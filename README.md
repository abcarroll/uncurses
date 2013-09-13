# uncurses #
Uncurses (un - curses) is the __U__sable __n__curses library.  It is the ncurses extension for PHP, wrapped in a PHP class, with an attempt to make the interface easier to use and a little more sane.

The main code is wrapped in the `uncurses` class.  Changes include:

 * Object oriented interface
 * No pass-by-refrence.  
 * Subjectively better function (method) names.
 * Return values that make sense.  Many of the ncurses C functions return for example 1 on failure, which were passed on to PHP's wrapper extension.

## To Do ##
 * Windows and panels wrapped in their own respective objects/classes
 * Make sure all functions return consistent return values
 * More logic code to make common tasks easier

## Warning ##
Both the PHP extension and Uncurses are currently expiramental.  It's my goal that Uncurses will become a __consistent__ interface, meaning that even if the underlying PHP extension drastically changes, the Uncurses API will stay the same.  However, I am still working on producing the first "release", so until then, expect drastic changes, including arbitrary method name changes.

## License ##
uncurses is licensed under a BSD-like license.

uncurses includes textual descriptions and prototype names, many verbatim
from the PHP Manual, which are (c) The PHP Documentation Group, and covered
under the Creative Commons Attribution 3.0 License.  The author claims no
ownership of such material, and also extends a huge thanks the PHP
Documentation Group for their work.