# Uncurses (un - curses)
## The **U**sable **n**curses library.

If you've ever used the ncurses PHP extension, you know how frustrating it is.  Uncurses makes ncurses a viable option for php-cli.  It is the ncurses
extension for PHP, wrapped in a PHP class, with an attempt to make the interface easier to use and a little more sane.

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
Uncurses is under very heavy development.  Some parts of the API can be considered finalized and usable.  However, a large portion of the code was
auto-generated from ncurses documentation and only exist as pass-through calls to the `ncurses_*` functions.  These functions should be marked in phpdoc
as deprecated and will be removed.

It's my goal that Uncurses will become a __consistent__ interface, meaning that even if the underlying PHP extension drastically changes, the Uncurses API will
stay the same.  However, I am still working on producing the first "release", so until then, expect drastic changes, including arbitrary method name and
prototype changes, complete removal, and additions.

## To Do ##
 * Finish converting all pass-through functions to stable Uncurses methods.
 * Write a highly functional example.
 * Windows and panels wrapped in their own respective objects/classes **In Progress**
 * Make sure all functions return consistent return values **In progress**
 * More logic code to make common tasks easier: Creating panels, capturing input, possibly a more DOM-like interface: i.e, create a textbox, checkbox, etc.
 * Find out why x, y is typically reversed as y, x and if for none other than an arbitrary reason, reverse them back to the normal convention of x, y. -
 *[According to one IRC user, it's because ansi sequences use row, column which would correlate to y,x.  Therefore, it should be perfectly fine to change them
 all to x, y.]*

## Improvements
Aside from the obvious object orientation, if you are a previous user of php-ncurses or the ncurses C library, you will find a a few differences:

 * As mentioned previously, return values are more PHP-like.  Most functions return ``true`` or ``false``, while php-ncurses confusingly returns an integer
 zero for success, and non-zero for failure.  (This makes more sense in the C library, but not in PHP).

 * Many php-ncurses functions are folded into single methods to reduce footprint, documentation, and frustration.  For example, instead of two separate
 unctions `ncurses_mvaddstr()` and `ncurses_addstr()`, with one moving to the Y, X given, and the other not, I reduced this into single methods, like
 `$object->addstr($text, [$y, [$x]])`.  If you specify the `$y, $x`, you get expected result of moving the cursor.  If you do not, you get the expected result
 of not moving the cursor.

 * In php-ncurses, for a large part there are two identical-acting functions for every operation: one for a specific window, one for the root window (and then,
 sometimes a third for panels).  For example, previously if you wanted to refresh the whole screen, you called ``ncurses_refresh()``, and if you wanted to
 refresh a specific window, you would call ``ncurses_wrefresh($window)``.  Objects simplify this drastically: To refresh the screen, you would call
 ``Uncurses::refresh()``, and to refresh a specific window, you would call ``$window->refresh()``.

 * Removal of redundant functions.  Some ncurses functions really didn't make sense in the context of PHP, such as the 'n' functions, which output text to the
 specified length.  If you wanted to do this, you probably would have used PHP's `substr()` instead to begin with.

 * Return values are more in-line with what you expect in PHP.  If you use the ncurses C library, it makes more sense in that context as there are supporting
 constants.  However, when translated to PHP, we end up with oddities such as -1 for errors, and 0 for success.   Uncurses typically returns boolean `true` and
 `false` where obvious, and arrays for "getters".  See the phpdoc for individual functions.

## Getting started ##

This section needs to be expanded.  See ``extras/sample.php`` for a working example.

## License ##
uncurses is licensed under a BSD-like license.

uncurses includes textual descriptions and prototype names, many verbatim
from the PHP Manual, which are (c) The PHP Documentation Group, and covered
under the Creative Commons Attribution 3.0 License.  The author claims no
ownership of such material, and als# Uncurses (un - curses)
