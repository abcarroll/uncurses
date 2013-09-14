# uncurses #
Uncurses (un - curses) is the __U__sable __n__curses library.  It is the ncurses extension for PHP, wrapped in a PHP class, with an attempt to make the interface easier to use and a little more sane.

The main code is wrapped in the `uncurses` class.  Changes include:

 * Object oriented interface
 * No pass-by-refrence.  
 * Subjectively better function (method) names.
 * Return values that make sense.  Many of the ncurses C functions return for example 1 on failure, which were passed on to PHP's wrapper extension.
 * Combined many-methods-in-one.  For example, instead of two separate functions `ncurses_mvaddstr()` and `ncurses_addstr()`, with one moving to the Y, X given, and the other not, I reduced this into single methods, like `ncurses_addstr($text, [$y, [$x]])`.  If you specify the `$y, $x`, you get expected result of moving the cursor.  If you do not, you get the expected result of not moving the cursor.
 * Removal of redundant functions.  Some ncurses functions really didn't make sense in the context of PHP, such as the 'n' functions, which output text to the specified length.  If you wanted to do this, you probably would of used PHP's `substr()` instead to begin with. 

## To Do ##
 * Windows and panels wrapped in their own respective objects/classes
 * Make sure all functions return consistent return values
 * More logic code to make common tasks easier
 * Find out why x, y is typically reversed as y, x and if for none other than an arbitrary reason, reverse them back to the normal convention of x, y.

## Heavy Development ##
Both the PHP extension and Uncurses are currently expiramental.  It's my goal that Uncurses will become a __consistent__ interface, meaning that even if the underlying PHP extension drastically changes, the Uncurses API will stay the same.  However, I am still working on producing the first "release", so until then, expect drastic changes, including arbitrary method name changes.

## Short Documentation ##

### Return values ###
Return values have been made consistent.  In the ncurses extension, return values were pretty wild, with on the majority of functions, -1 indicating error, 0 indicating success, and false seems to indicate explicitly that `ncurses_init()` hadn't been called.

In uncurses, we're above all that mess.  Return values are simple:
 * Some functions __do__ return an array.  The success/failure return code is always in element `[0]`, which is always the first element of the array.  If there is other data returned, such as `y`, `x` values, they will be in elements named `y`, and `x`, respectively.
 * In element `[0]`, or the usual return value is either __the value it needs to return__ (in the case of, for example, `ncurses::getmaxy()`), or ``true``/``false``.  You can use the `===` operator to check for an error status in those functions that also return an integer, for example:
```
if($uncurses->getmaxy() === false) { 
  die("Can't continue");
 }
 ```
 
### Removed ncurses_* Interfaces ###
* `ncurses_addchnstr()` - Add attributed string with specified length at current position - Redundant.  Use `uncurses::addchstr()` instead, if you need to specify a max length, use substr()
* `ncurses_addnstr()` - Add string with specified length at current position - Redundant.  Use `ncurses::ncurses_addstr()` instead, if you need to specify a max length, use substr()
* `ncurses_echochar()` - Single character output including refresh - Redundant.  Use `ncurses::addch()` followed by a `ncurses::refresh()` instead.
* `ncurses_mvaddch()` - Move current position and add character - Redundant.  `ncurses::addch()` optionally accepts a 3rd/4th parameter `$y, $x`.  If specified, it moves it for you.
* `ncurses_mvaddchnstr()` - Redundant. Has combined redundancy of `ncurses_addchnstr()` and `ncurses_mvaddch()`.
* `ncurses_mvaddchstr()`, - Combined as in `ncurses_mvaddch`.
* `ncurses_mvaddnstr()` - Use the three-paramter version of addstr() with substr() if you want this functionality.
* `mvaddstr()` - Combined to three paramter method as others.

## License ##
uncurses is licensed under a BSD-like license.

uncurses includes textual descriptions and prototype names, many verbatim
from the PHP Manual, which are (c) The PHP Documentation Group, and covered
under the Creative Commons Attribution 3.0 License.  The author claims no
ownership of such material, and also extends a huge thanks the PHP
Documentation Group for their work.
