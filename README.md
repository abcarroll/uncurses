## The **U**sable **n**urses library.

If you've ever used the ncurses PHP extension, you know how frustrating it is.  Uncurses makes ncurses a viable option for php-cli.  It is the ncurses extension for PHP, wrapped in a PHP class, with an attempt to make the interface easier to use and a little more sane.

 * New users, as well as prior uses of ncurses (php or C) will feel at home.
 * Easy to create and manipulate command-line GUI's in signifiantly less code.
 * Object oriented interface.  Windows and panels represented by objects.
 * No pass-by-reference to functions (methods).
 * Subjectively better function (method) names over php-ncurses.
 * Consistent return values and method parameters that make sense.
 * Entire code base documented via phpdoc.
 * Removed functions that aren't necessary in the context of PHP.
 * Combined many C-wrapped functions into single PHP methods.  

## Heavy Development ##
Uncurses is under  heavy development.  Many parts of the API is usable and stable.  However, a large portion of the code was auto-generated from ncurses documentation, and only exist as pass-through `ncurses_*` functions.  These functions are marked as deprecated via phpdoc.  

It's my goal that Uncurses will become a __consistent__ interface.  If the underlying PHP extension changes, the Uncurses API will stay the same. However, I am still working on producing the first usable copy of Uncurses.  Until "that" point, expect drastic, code-breaking changes.

## Improvements
Aside from the obvious object orientation, if you are a previous user either php-ncurses or the ncurses C library, you will find a a few differences:

 * As mentioned before, return values are more PHP-like.  Most functions return ``true`` or ``false``, while php-ncurses confusingly returns an integer zero for success, and non-zero for failure.  (This makes more sense in the C library, but not in PHP).

 * Uncurses folds many php-ncurses functions into single methods to reduce footprint, documentation, and frustration.  For example, instead of two separate functions `ncurses_mvaddstr()` and `ncurses_addstr()`, with one moving to the Y, X given, and the other not, I reduced this into single methods, like `$object->addstr($text, [$y, [$x]])`.  If you specify the `$y, $x`, you get expected result of moving the cursor.  If you do not, you get the expected result of not moving the cursor.

 * In php-ncurses, for a large part there are two identical-acting functions for every operation: one for a specific window, one for the root window (and then, sometimes a third for panels).  For example, previously if you wanted to refresh the whole screen, you called ``ncurses_refresh()``, and if you wanted to refresh a specific window, you would call ``ncurses_wrefresh($window)``.  Objects simplify this drastically: To refresh the screen, you would call ``Uncurses::refresh()``, and to refresh a specific window, you would call ``$window->refresh()``.

 * Removal of redundant functions.  Some ncurses functions really didn't make sense in the context of PHP, such as the 'n' functions, which output text to the specified length.  If you wanted to do this, you probably would have used PHP's `substr()` instead to begin with.

 * Return values are more in-line with what you expect in PHP.  If you use the ncurses C library, it makes more sense in that context as there are supporting constants.  However, when translated to PHP, we end up with oddities such as -1 for errors, and 0 for success.   Uncurses typically returns boolean `true` and `false` where obvious, and arrays for "getters".  See the phpdoc for individual functions.

## Getting started ##

This section needs to be expanded.  See ``extras/sample.php`` for a working example.

## License ##
Uncurses is licensed under a BSD-like license.

Uncurses includes textual descriptions and prototype names, many verbatim
from the PHP Manual, which are (c) The PHP Documentation Group, and covered
under the Creative Commons Attribution 3.0 License.  The author claims no
ownership of such material, and also extends a huge thanks the PHP
Documentation Group for their work.o extends a huge thanks the PHP
Documentation Group for their work.