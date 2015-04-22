<?php
    /*
       * uncurses, The usable 'ncurses for php' interface
       *
       * Copyright (c) 2013-2015, Armond B. Carroll III, ben@hl9.net
       * This file is a part of the uncurses library.
       *
       * Redistribution and use in source and binary forms, with or without
       * modification, are permitted provided that the following conditions are met:
       *
       * 1. Redistributions of source code must retain the above copyright notice,
       *    this list of conditions and the following disclaimer.
       *
       * 2. Redistributions in binary form must reproduce the above copyright
       *    notice, this list of conditions and the following disclaimer in the
       *    documentation and/or other materials provided with the distribution.
       *
       * 3. No one other than the copyright holder, listed above, has the right to
       *    modify the terms applicable to covered code created under this License.
       *
       * THIS SOFTWARE IS PROVIDED BY THE AUTHOR AND CONTRIBUTORS ``AS IS'' AND ANY
       * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
       * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
       * DISCLAIMED. IN NO EVENT SHALL THE AUTHOR OR CONTRIBUTORS BE LIABLE FOR ANY
       * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
       * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
       * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
       * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
       * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY
       * OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH
       * DAMAGE.
       *
       * This file includes textual descriptions and prototype names, many verbatim
       * from the PHP Manual, which are (c) The PHP Documentation Group, and covered
       * under the Creative Commons Attribution 3.0 License.  The author claims no
       * ownership of such material, and also extends a huge thanks the PHP
       * Documentation Group for their work.
       */

    //namespace ucurses;

    /**
     * Class uncurses
     */
    class uncurses {
        /**
         * @param bool $init
         */
        public function __construct($init = true) {
            if($init) {
                $this->init();
            }
        }

        /**
         *
         */
        public function __destruct() {
            return $this->end();
        }

        // int ncurses_addch (int $ch) - Add character at current position and advance cursor
        // SS true,false (int $ascii)
        // DD Adds a character, specified as the integer //$ascii//, to the current cursor position, and advances the cursor.  If the cursor reaches the end of the row, it will wrap around to the next row.  Some non-printing control characters have special meaning, see [[addstr()]] for those meanings.
        // RR Returns TRUE on success or FALSE on failure.
        /**
         * @param $ascii
         * @param bool $y
         * @param bool $x
         * @return bool
         */
        public function addch($ascii, $y = false, $x = false) {
            if($y === false || $x === false) {
                $return_value = ncurses_addch($ascii);
            } else {
                $return_value = ncurses_mvaddch($ascii, $y, $x);
            }

            if($return_value === 0) {
                return true;
            } else {
                return false;
            }
        }

        // int ncurses_addchstr (string $s) - Add attributed string at current position
        // DD I couldn't get this function to do anything.  See the ncurses man pages.  If anyone has a working example of this function, I would like to see it.
        // RR Returns TRUE on success or FALSE on failure.
        /**
         * @param $s
         * @param bool $y
         * @param bool $x
         * @return bool
         */
        public function addchstr($s, $y = false, $x = false) {
            if($y === false || $x === false) {
                $return_value = ncurses_addchstr($s);
            } else {
                $return_value = ncurses_mvaddchstr($s, $y, $x);
            }

            if($return_value === 0) {
                return true;
            } else {
                return false;
            }
        }

        // int ncurses_addstr (string $text) - Output text at current position
        // SS true,fale (string $text)
        // DD Outputs a string specified by //$text// at the current cursor position, and advances the cursor.  If the cursor reaches the end of the row, it will wrap around to the next row.   Some non-printing control characters have special meaning:
        // DD * A backspace moves the cursor one column left, if it as the left edge of the screen already, it does nothing
        // DD * A newline clears the rest of the row to the right edge of the screen, and then moving the cursor to the first column of the next line
        // DD * Any other non-printing control characters will be printed in //^X// notation.
        // RR Returns TRUE on success or FALSE on failure.
        /**
         * @param $text
         * @param bool $y
         * @param bool $x
         * @return bool
         */
        public function addstr($text, $y = false, $x = false) {
            if($y === false || $x === false) {
                $return_value = ncurses_addstr($text);
            } else {
                $return_value = ncurses_mvaddstr($text, $y, $x);
            }

            if($return_value === 0) {
                return true;
            } else {
                return false;
            }
        }

        // int ncurses_assume_default_colors (int $fg , int $bg) - Define default colors for color
        // SS true,false (int $fg_pair, int $bg_pair)
        // DD Specify what background and foreground colors to use for color pair `0`.  You may also specify the special paramters `-1, -1` which signifies to reset to default terminal colors, and is also exactly equivilant to `uncurses::use_default_colors()``.  According to default_colors (3X), "This function will fail if either the terminal does not support the orig_pair or orig_colors capability. If the initialize_pair capability is found, this causes an error as well. "
        // RR Returns TRUE on success or FALSE on failure.
        /**
         * @param $fg
         * @param $bg
         * @return bool
         */
        public function assume_default_colors($fg, $bg) {
            if(ncurses_assume_default_colors($fg, $bg) === 0) {
                return true;
            } else {
                return false;
            }
        }

        // int ncurses_attroff (int $attributes) - Turn off the given attributes
        // RR Returns TRUE on success or FALSE on failure.
        /**
         * @param $attributes
         * @return bool
         */
        public function attroff($attributes) {
            if(ncurses_attroff($attributes) === 0) {
                return true;
            } else {
                return false;
            }
        }

        // int ncurses_attron (int $attributes) - Turn on the given attributes
        // RR Returns TRUE on success or FALSE on failure.
        /**
         * @param $attributes
         * @return bool
         */
        public function attron($attributes) {
            if(ncurses_attron($attributes) === 0) {
                return true;
            } else {
                return false;
            }
        }

        // int ncurses_attrset (int $attributes) - Set given attributes
        // RR Returns TRUE on success or FALSE on failure.
        /**
         * @param $attributes
         * @return bool
         */
        public function attrset($attributes) {
            if(ncurses_attrset($attributes) === 0) {
                return true;
            } else {
                return false;
            }
        }

        // int ncurses_baudrate (void) - Returns baudrate of terminal
        // SS int (void)
        // RR Returns the current baud rate of the terminal as an integer.  For example, __38400__.
        /**
         * @return int
         */
        public function baudrate() {
            return ncurses_baudrate();
        }

        // int ncurses_beep (void) - Let the terminal beep
        /**
         * @return int
         */
        public function beep() {
            return ncurses_beep();
        }

        // int ncurses_bkgd (int $attrchar) - Set background property for terminal screen
        // RR bkgd() will seemingly always return `true`, unless ncurses hasn't been initialized.
        /**
         * @param $attrchar
         * @return bool
         */
        public function bkgd($attrchar) {
            if(ncurses_bkgd($attrchar) === 0) {
                return true;
            } else {
                return false;
            }
        }

        // void ncurses_bkgdset (int $attrchar) - Control screen background
        // RR bkgd() will seemingly always return `true`, unless ncurses hasn't been initialized.
        /**
         * @param $attrchar
         * @return bool
         */
        public function bkgdset($attrchar) {
            if(ncurses_bkgdset($attrchar) === 0) {
                return true;
            } else {
                return false;
            }
        }

        // int ncurses_border (int $left , int $right , int $top , int $bottom , int $tl_corner , int $tr_corner , int $bl_corner , int $br_corner) - Draw a border around the screen using attributed characters
        /**
         * @param $left
         * @param $right
         * @param $top
         * @param $bottom
         * @param $tl_corner
         * @param $tr_corner
         * @param $bl_corner
         * @param $br_corner
         * @return int
         */
        public function border($left, $right, $top, $bottom, $tl_corner, $tr_corner, $bl_corner, $br_corner) {
            return ncurses_border($left, $right, $top, $bottom, $tl_corner, $tr_corner, $bl_corner, $br_corner);
        }

        // int ncurses_bottom_panel (resource $panel) - Moves a visible panel to the bottom of the stack
        /**
         * @param $panel
         * @return int
         */
        public function bottom_panel($panel) {
            return ncurses_bottom_panel($panel);
        }

        // bool ncurses_can_change_color (void) - Checks if terminal color definitions can be changed
        /**
         * @return bool
         */
        public function can_change_color() {
            return ncurses_can_change_color();
        }

        // bool ncurses_cbreak (void) - Switch of input buffering
        /**
         * @return bool
         */
        public function cbreak() {
            return ncurses_cbreak();
        }

        // bool ncurses_clear (void) - Clear screen
        /**
         * @return bool
         */
        public function clear() {
            return ncurses_clear();
        }

        // bool ncurses_clrtobot (void) - Clear screen from current position to bottom
        /**
         * @return bool
         */
        public function clrtobot() {
            return ncurses_clrtobot();
        }

        // bool ncurses_clrtoeol (void) - Clear screen from current position to end of line
        /**
         * @return bool
         */
        public function clrtoeol() {
            return ncurses_clrtoeol();
        }

        // int ncurses_color_content (int $color , int &$r , int &$g , int &$b) - Retrieves RGB components of a color
        /**
         * @param $color
         * @return array|bool
         */
        public function color_content($color) {
            $return_value = ncurses_color_content($color, $r, $g, $b);
            if($return_value == false) {
                return false;
            } else {
                return array(
                    'r' => $r,
                    'g' => $g,
                    'b' => $b,
                );
            }
        }

        // int ncurses_color_set (int $pair) - Set active foreground and background colors
        /**
         * @param $pair
         * @return bool
         */
        public function color_set($pair) {
            $return_value = ncurses_color_set($pair);
            if($return_value == -1) {
                return true;
            } else {
                return false;
            }
        }

        // int ncurses_curs_set (int $visibility) - Set cursor state
        /**
         * @param $visibility
         * @return int
         */
        public function curs_set($visibility) {
            return ncurses_curs_set($visibility);
        }

        // bool ncurses_def_prog_mode (void) - Saves terminals (program) mode
        /**
         * @return bool
         */
        public function def_prog_mode() {
            return ncurses_def_prog_mode();
        }

        // bool ncurses_def_shell_mode (void) - Saves terminals (shell) mode
        /**
         * @return bool
         */
        public function def_shell_mode() {
            return ncurses_def_shell_mode();
        }

        // int ncurses_define_key (string $definition , int $keycode) - Define a keycode
        /**
         * @param $definition
         * @param $keycode
         * @return int
         */
        public function define_key($definition, $keycode) {
            return ncurses_define_key($definition, $keycode);
        }

        // bool ncurses_del_panel (resource $panel) - Remove panel from the stack and delete it (but not the associated window)
        /**
         * @param $panel
         * @return bool
         */
        public function del_panel($panel) {
            return ncurses_del_panel($panel);
        }

        // int ncurses_delay_output (int $milliseconds) - Delay output on terminal using padding characters
        /**
         * @param $milliseconds
         * @return int
         */
        public function delay_output($milliseconds) {
            return ncurses_delay_output($milliseconds);
        }

        // bool ncurses_delch (void) - Delete character at current position, move rest of line left
        /**
         * @return bool
         */
        public function delch() {
            return ncurses_delch();
        }

        // bool ncurses_deleteln (void) - Delete line at current position, move rest of screen up
        /**
         * @return bool
         */
        public function deleteln() {
            return ncurses_deleteln();
        }

        // bool ncurses_delwin (resource $window) - Delete a ncurses window
        /**
         * @param $window
         * @return bool
         */
        public function delwin($window) {
            return ncurses_delwin($window);
        }

        // bool ncurses_doupdate (void) - Write all prepared refreshes to terminal
        /**
         * @return bool
         */
        public function doupdate() {
            return ncurses_doupdate();
        }

        // bool ncurses_echo (void) - Activate keyboard input echo
        /**
         * @return bool
         */
        public function echo_on() {
            return ncurses_echo();
        }

        // int ncurses_end (void) - Stop using ncurses, clean up the screen
        /**
         * @return int
         */
        public function end() {
            return ncurses_end();
        }

        // bool ncurses_erase (void) - Erase terminal screen
        /**
         * @return bool
         */
        public function erase() {
            return ncurses_erase();
        }

        // string ncurses_erasechar (void) - Returns current erase character
        /**
         * @return string
         */
        public function erasechar() {
            return ncurses_erasechar();
        }

        // void ncurses_filter (void) - Set LINES for iniscr() and newterm() to 1
        /**
         *
         */
        public function filter() {
            return ncurses_filter();
        }

        // bool ncurses_flash (void) - Flash terminal screen (visual bell)
        /**
         * @return bool
         */
        public function flash() {
            return ncurses_flash();
        }

        // bool ncurses_flushinp (void) - Flush keyboard input buffer
        /**
         * @return bool
         */
        public function flushinp() {
            return ncurses_flushinp();
        }

        // int ncurses_getch (void) - Read a character from keyboard
        /**
         * @return int
         */
        public function getch() {
            return ncurses_getch();
        }

        // void ncurses_getmaxyx (resource $window , int &$y , int &$x) - Returns the size of a window
        /**
         * @param $window
         * @return array
         */
        public function getmaxyx($window = STDSCR) {
            ncurses_getmaxyx($window, $y, $x);

            return array(
                0   => true,
                'y' => $y,
                'x' => $x
            );
        }

        // New function
        /**
         * @param $window
         * @return mixed
         */
        public function getmaxx($window = STDSCR) {
            $value = $this->getmaxyx($window);

            return $value['x'];
        }

        // New function
        /**
         * @param $window
         * @return mixed
         */
        public function getmaxy($window = STDSCR) {
            $value = $this->getmaxyx($window);

            return $value['y'];
        }

        // bool ncurses_getmouse (array &$mevent) - Reads mouse event
        /**
         * @return bool
         */
        public function getmouse() {
            if(ncurses_getmouse($mevent) === false) {
                array_unshift($mevent, true);

                return $mevent;
            } else {
                return false;
            }
        }

        // void ncurses_getyx (resource $window , int &$y , int &$x) - Returns the current cursor position for a window
        /**
         * @param $window
         * @return array
         */
        public function getyx($window = STDSCR) {
            ncurses_getyx($window, $y, $x);

            return array(
                0   => true,
                'y' => $y,
                'x' => $x,
            );
        }

        // int ncurses_halfdelay (int $tenth) - Put terminal into halfdelay mode
        /**
         * @param $tenth
         * @return int
         */
        public function halfdelay($tenth) {
            return ncurses_halfdelay($tenth);
        }

        // bool ncurses_has_colors (void) - Checks if terminal has color capabilities
        /**
         * @return bool
         */
        public function has_colors() {
            return ncurses_has_colors();
        }

        // bool ncurses_has_ic (void) - Check for insert- and delete-capabilities
        /**
         * @return bool
         */
        public function has_ic() {
            return ncurses_has_ic();
        }

        // bool ncurses_has_il (void) - Check for line insert- and delete-capabilities
        /**
         * @return bool
         */
        public function has_il() {
            return ncurses_has_il();
        }

        // int ncurses_has_key (int $keycode) - Check for presence of a function key on terminal keyboard
        /**
         * @param $keycode
         * @return int
         */
        public function has_key($keycode) {
            return ncurses_has_key($keycode);
        }

        // int ncurses_hide_panel (resource $panel) - Remove panel from the stack, making it invisible
        /**
         * @param $panel
         * @return int
         */
        public function hide_panel($panel) {
            return ncurses_hide_panel($panel);
        }

        // int ncurses_hline (int $charattr , int $n) - Draw a horizontal line at current position using an attributed character and max. n characters long
        /**
         * @param $charattr
         * @param $n
         * @return int
         */
        public function hline($charattr, $n) {
            return ncurses_hline($charattr, $n);
        }

        // string ncurses_inch (void) - Get character and attribute at current position
        /**
         * @return string
         */
        public function inch() {
            return ncurses_inch();
        }

        // int ncurses_init_color (int $color , int $r , int $g , int $b) - Define a terminal color
        /**
         * @param $color
         * @param $r
         * @param $g
         * @param $b
         * @return int
         */
        public function init_color($color, $r, $g, $b) {
            return ncurses_init_color($color, $r, $g, $b);
        }

        // int ncurses_init_pair (int $pair , int $fg , int $bg) - Define a color pair
        /**
         * @param $pair
         * @param $fg
         * @param $bg
         * @return int
         */
        public function init_pair($pair, $fg, $bg) {
            return ncurses_init_pair($pair, $fg, $bg);
        }

        // void ncurses_init (void) - Initialize ncurses
        /**
         *
         */
        public function init() {
            return ncurses_init();
        }

        // int ncurses_insch (int $character) - Insert character moving rest of line including character at current position
        /**
         * @param $character
         * @return int
         */
        public function insch($character) {
            return ncurses_insch($character);
        }

        // int ncurses_insdelln (int $count) - Insert lines before current line scrolling down (negative numbers delete and scroll up)
        /**
         * @param $count
         * @return int
         */
        public function insdelln($count) {
            return ncurses_insdelln($count);
        }

        // int ncurses_insertln (void) - Insert a line, move rest of screen down
        /**
         * @return int
         */
        public function insertln() {
            return ncurses_insertln();
        }

        // int ncurses_insstr (string $text) - Insert string at current position, moving rest of line right
        /**
         * @param $text
         * @return int
         */
        public function insstr($text) {
            return ncurses_insstr($text);
        }

        // int ncurses_instr (string &$buffer) - Reads string from terminal screen
        // Returns number of characters read as the first element, and buffer read as the second.
        /**
         * @param $buffer
         * @return array
         */
        public function instr($buffer) {
            $return_value = ncurses_instr($buffer);

            return array($return_value, $buffer);
        }

        // bool ncurses_isendwin (void) - Ncurses is in endwin mode, normal screen output may be performed
        /**
         * @return bool
         */
        public function isendwin() {
            return ncurses_isendwin();
        }

        // int ncurses_keyok (int $keycode , bool $enable) - Enable or disable a keycode
        /**
         * @param $keycode
         * @param $enable
         * @return int
         */
        public function keyok($keycode, $enable) {
            return ncurses_keyok($keycode, $enable);
        }

        // int ncurses_keypad (resource $window , bool $bf) - Turns keypad on or off
        /**
         * @param $window
         * @param $bf
         * @return int
         */
        public function keypad($window, $bf) {
            return ncurses_keypad($window, $bf);
        }

        // string ncurses_killchar (void) - Returns current line kill character
        /**
         * @return string
         */
        public function killchar() {
            return ncurses_killchar();
        }

        // string ncurses_longname (void) - Returns terminals description
        /**
         * @return string
         */
        public function longname() {
            return ncurses_longname();
        }

        // int ncurses_meta (resource $window , bool $8bit) - Enables/Disable 8-bit meta key information
        /**
         * @param $window
         * @param $eightbit
         * @return int
         */
        public function meta($window, $eightbit) {
            return ncurses_meta($window, $eightbit);
        }

        // bool ncurses_mouse_trafo (int &$y , int &$x , bool $toscreen) - Transforms coordinates
        // Via http://linux.die.net/man/3/mouse_trafo
        // If the parameter to_screen is TRUE, the pointers pY, pX must reference
        // the coordinates of a location inside the window win. They are converted
        // to window-relative coordinates and returned through the pointers. If the
        // conversion was successful, the function returns TRUE. If one of the
        // parameters was NULL or the location is not inside the window, FALSE is
        // returned. If to_screen is FALSE, the pointers pY, pX must reference window-relative
        // coordinates. They are converted to stdscr-relative coordinates if the window win encloses
        // this point. In this case the function returns TRUE.
        /**
         * @param $y
         * @param $x
         * @param bool $toscreen
         * @return array
         */
        public function mouse_trafo($y, $x, $toscreen = true) {
            $return_value = ncurses_mouse_trafo($y, $x, $toscreen);
            if($return_value === 0) {
                $return_value = true;
            } else {
                $return_value = false;
            }

            return array(
                0   => $return_value,
                'y' => $y,
                'x' => $x,
            );
        }

        // int ncurses_mouseinterval (int $milliseconds) - Set timeout for mouse button clicks
        /**
         * @param $milliseconds
         * @return int
         */
        public function mouseinterval($milliseconds) {
            return ncurses_mouseinterval($milliseconds);
        }

        // int ncurses_mousemask (int $newmask , int &$oldmask) - Sets mouse options
        /**
         * @param $newmask
         * @return array|bool
         */
        public function mousemask($newmask) {
            $return_value = ncurses_mousemask($newmask, $oldmask);
            if($return_value !== 0) {
                return array($return_value, $oldmask);
            } else {
                return false;
            }
        }

        // int ncurses_move_panel (resource $panel , int $startx , int $starty) - Moves a panel so that its upper-left corner is at [startx, starty]
        /**
         * @param $panel
         * @param $startx
         * @param $starty
         * @return int
         */
        public function move_panel($panel, $startx, $starty) {
            return ncurses_move_panel($panel, $startx, $starty);
        }

        // int ncurses_move (int $y , int $x) - Move output position
        /**
         * @param $y
         * @param $x
         * @return int
         */
        public function move($y, $x) {
            return ncurses_move($y, $x);
        }

        // int ncurses_mvcur (int $old_y , int $old_x , int $new_y , int $new_x) - Move cursor immediately
        /**
         * @param $old_y
         * @param $old_x
         * @param $new_y
         * @param $new_x
         * @return int
         */
        public function mvcur($old_y, $old_x, $new_y, $new_x) {
            return ncurses_mvcur($old_y, $old_x, $new_y, $new_x);
        }

        // int ncurses_mvdelch (int $y , int $x) - Move position and delete character, shift rest of line left
        /**
         * @param $y
         * @param $x
         * @return int
         */
        public function mvdelch($y, $x) {
            return ncurses_mvdelch($y, $x);
        }

        // int ncurses_mvgetch (int $y , int $x) - Move position and get character at new position
        /**
         * @param $y
         * @param $x
         * @return int
         */
        public function mvgetch($y, $x) {
            return ncurses_mvgetch($y, $x);
        }

        // int ncurses_mvhline (int $y , int $x , int $attrchar , int $n) - Set new position and draw a horizontal line using an attributed character and max. n characters long
        /**
         * @param $y
         * @param $x
         * @param $attrchar
         * @param $n
         * @return int
         */
        public function mvhline($y, $x, $attrchar, $n) {
            return ncurses_mvhline($y, $x, $attrchar, $n);
        }

        // int ncurses_mvinch (int $y , int $x) - Move position and get attributed character at new position
        /**
         * @param $y
         * @param $x
         * @return int
         */
        public function mvinch($y, $x) {
            return ncurses_mvinch($y, $x);
        }

        // int ncurses_mvvline (int $y , int $x , int $attrchar , int $n) - Set new position and draw a vertical line using an attributed character and max. n characters long
        /**
         * @param $y
         * @param $x
         * @param $attrchar
         * @param $n
         * @return mixed
         */
        public function mvvline($y, $x, $attrchar, $n) {
            return ncurses_mvvline($y, $x, $attrchar, $n);
        }

        // int ncurses_mvwaddstr (resource $window , int $y , int $x , string $text) - Add string at new position in window
        /**
         * @param $window
         * @param $y
         * @param $x
         * @param $text
         * @return int
         */
        public function mvwaddstr($window, $y, $x, $text) {
            return ncurses_mvwaddstr($window, $y, $x, $text);
        }

        // int ncurses_napms (int $milliseconds) - Sleep
        /**
         * @param $milliseconds
         * @return int
         */
        public function napms($milliseconds) {
            return ncurses_napms($milliseconds);
        }

        // resource ncurses_new_panel (resource $window) - Create a new panel and associate it with window
        /**
         * @param $window
         * @return resource
         */
        public function new_panel($window = STDSCR) {
            return ncurses_new_panel($window);
        }

        // resource ncurses_newpad (int $rows , int $cols) - Creates a new pad (window)
        /**
         * @param $rows
         * @param $cols
         * @return resource
         */
        public function newpad($rows, $cols) {
            return ncurses_newpad($rows, $cols);
        }

        // resource ncurses_newwin (int $rows , int $cols , int $y , int $x) - Create a new window
        /**
         * @param $rows
         * @param $cols
         * @param $y
         * @param $x
         * @return Window
         */
        public function newwin($rows, $cols, $y, $x) {
            return new Window($rows, $cols, $y, $x);
        }

        // bool ncurses_nl (void) - Translate newline and carriage return / line feed
        /**
         * @return bool
         */
        public function nl() {
            return ncurses_nl();
        }

        // bool ncurses_nocbreak (void) - Switch terminal to cooked mode
        /**
         * @return bool
         */
        public function nocbreak() {
            return ncurses_nocbreak();
        }

        // bool ncurses_noecho (void) - Switch off keyboard input echo
        /**
         * @return bool
         */
        public function echo_off() {
            return ncurses_noecho();
        }

        // bool ncurses_nonl (void) - Do not translate newline and carriage return / line feed
        /**
         * @return bool
         */
        public function nonl() {
            return ncurses_nonl();
        }

        // void ncurses_noqiflush (void) - Do not flush on signal characters
        /**
         *
         */
        public function noqiflush() {
            return ncurses_noqiflush();
        }

        // bool ncurses_noraw (void) - Switch terminal out of raw mode
        /**
         * @return bool
         */
        public function noraw() {
            return ncurses_noraw();
        }

        // int ncurses_pair_content (int $pair , int &$f , int &$b) - Retrieves foreground and background colors of a color pair
        /**
         * @param $pair
         * @return array|bool
         */
        public function pair_content($pair) {
            $return_value = ncurses_pair_content($pair, $f, $b);
            if($return_value == 0) {
                return false;
            } else {
                return array(
                    'f' => $f,
                    'b' => $b,
                );
            }
        }

        // resource ncurses_panel_above (resource $panel) - Returns the panel above panel
        /**
         * @param $panel
         * @return resource
         */
        public function panel_above($panel) {
            return ncurses_panel_above($panel);
        }

        // resource ncurses_panel_below (resource $panel) - Returns the panel below panel
        /**
         * @param $panel
         * @return resource
         */
        public function panel_below($panel) {
            return ncurses_panel_below($panel);
        }

        // resource ncurses_panel_window (resource $panel) - Returns the window associated with panel
        /**
         * @param $panel
         * @return resource
         */
        public function panel_window($panel) {
            return ncurses_panel_window($panel);
        }

        // int ncurses_pnoutrefresh (resource $pad , int $pminrow , int $pmincol , int $sminrow , int $smincol , int $smaxrow , int $smaxcol) - Copies a region from a pad into the virtual screen
        /**
         * @param $pad
         * @param $pminrow
         * @param $pmincol
         * @param $sminrow
         * @param $smincol
         * @param $smaxrow
         * @param $smaxcol
         * @return int
         */
        public function pnoutrefresh($pad, $pminrow, $pmincol, $sminrow, $smincol, $smaxrow, $smaxcol) {
            return ncurses_pnoutrefresh($pad, $pminrow, $pmincol, $sminrow, $smincol, $smaxrow, $smaxcol);
        }

        // int ncurses_prefresh (resource $pad , int $pminrow , int $pmincol , int $sminrow , int $smincol , int $smaxrow , int $smaxcol) - Copies a region from a pad into the virtual screen
        /**
         * @param $pad
         * @param $pminrow
         * @param $pmincol
         * @param $sminrow
         * @param $smincol
         * @param $smaxrow
         * @param $smaxcol
         * @return int
         */
        public function prefresh($pad, $pminrow, $pmincol, $sminrow, $smincol, $smaxrow, $smaxcol) {
            return ncurses_prefresh($pad, $pminrow, $pmincol, $sminrow, $smincol, $smaxrow, $smaxcol);
        }

        // int ncurses_putp (string $text) - Apply padding information to the string and output it
        /**
         * @param $text
         * @return int
         */
        public function putp($text) {
            return ncurses_putp($text);
        }

        // void ncurses_qiflush (void) - Flush on signal characters
        /**
         *
         */
        public function qiflush() {
            return ncurses_qiflush();
        }

        // bool ncurses_raw (void) - Switch terminal into raw mode
        /**
         * @return bool
         */
        public function raw() {
            return ncurses_raw();
        }

        // int ncurses_refresh (int $ch) - Refresh screen
        /**
         * @param $ch
         * @return int
         */
        public function refresh($ch = STDSCR) {
            return ncurses_refresh($ch);
        }

        // int ncurses_replace_panel (resource $panel , resource $window) - Replaces the window associated with panel
        /**
         * @param $panel
         * @param $window
         * @return int
         */
        public function replace_panel($panel, $window) {
            return ncurses_replace_panel($panel, $window);
        }

        // int ncurses_reset_prog_mode (void) - Resets the prog mode saved by def_prog_mode
        /**
         * @return int
         */
        public function reset_prog_mode() {
            return ncurses_reset_prog_mode();
        }

        // int ncurses_reset_shell_mode (void) - Resets the shell mode saved by def_shell_mode
        /**
         * @return int
         */
        public function reset_shell_mode() {
            return ncurses_reset_shell_mode();
        }

        // bool ncurses_resetty (void) - Restores saved terminal state
        /**
         * @return bool
         */
        public function resetty() {
            return ncurses_resetty();
        }

        // bool ncurses_savetty (void) - Saves terminal state
        /**
         * @return bool
         */
        public function savetty() {
            return ncurses_savetty();
        }

        // int ncurses_scr_dump (string $filename) - Dump screen content to file
        /**
         * @param $filename
         * @return int
         */
        public function scr_dump($filename) {
            return ncurses_scr_dump($filename);
        }

        // int ncurses_scr_init (string $filename) - Initialize screen from file dump
        /**
         * @param $filename
         * @return int
         */
        public function scr_init($filename) {
            return ncurses_scr_init($filename);
        }

        // int ncurses_scr_restore (string $filename) - Restore screen from file dump
        /**
         * @param $filename
         * @return int
         */
        public function scr_restore($filename) {
            return ncurses_scr_restore($filename);
        }

        // int ncurses_scr_set (string $filename) - Inherit screen from file dump
        /**
         * @param $filename
         * @return int
         */
        public function scr_set($filename) {
            return ncurses_scr_set($filename);
        }

        // int ncurses_scrl (int $count) - Scroll window content up or down without changing current position
        /**
         * @param $count
         * @return int
         */
        public function scrl($count) {
            return ncurses_scrl($count);
        }

        // int ncurses_show_panel (resource $panel) - Places an invisible panel on top of the stack, making it visible
        /**
         * @param $panel
         * @return int
         */
        public function show_panel($panel) {
            return ncurses_show_panel($panel);
        }

        // int ncurses_slk_attr (void) - Returns current soft label key attribute
        /**
         * @return int
         */
        public function slk_attr() {
            return ncurses_slk_attr();
        }

        // int ncurses_slk_attroff (int $intarg) - Turn off the given attributes for soft function-key labels
        /**
         * @param $intarg
         * @return int
         */
        public function slk_attroff($intarg) {
            return ncurses_slk_attroff($intarg);
        }

        // int ncurses_slk_attron (int $intarg) - Turn on the given attributes for soft function-key labels
        /**
         * @param $intarg
         * @return int
         */
        public function slk_attron($intarg) {
            return ncurses_slk_attron($intarg);
        }

        // int ncurses_slk_attrset (int $intarg) - Set given attributes for soft function-key labels
        /**
         * @param $intarg
         * @return int
         */
        public function slk_attrset($intarg) {
            return ncurses_slk_attrset($intarg);
        }

        // bool ncurses_slk_clear (void) - Clears soft labels from screen
        /**
         * @return bool
         */
        public function slk_clear() {
            return ncurses_slk_clear();
        }

        // int ncurses_slk_color (int $intarg) - Sets color for soft label keys
        /**
         * @param $intarg
         * @return int
         */
        public function slk_color($intarg) {
            return ncurses_slk_color($intarg);
        }

        // bool ncurses_slk_init (int $format) - Initializes soft label key functions
        /**
         * @param $format
         * @return bool
         */
        public function slk_init($format) {
            return ncurses_slk_init($format);
        }

        // bool ncurses_slk_noutrefresh (void) - Copies soft label keys to virtual screen
        /**
         * @return bool
         */
        public function slk_noutrefresh() {
            return ncurses_slk_noutrefresh();
        }

        // int ncurses_slk_refresh (void) - Copies soft label keys to screen
        /**
         * @return int
         */
        public function slk_refresh() {
            return ncurses_slk_refresh();
        }

        // int ncurses_slk_restore (void) - Restores soft label keys
        /**
         * @return int
         */
        public function slk_restore() {
            return ncurses_slk_restore();
        }

        // bool ncurses_slk_set (int $labelnr , string $label , int $format) - Sets function key labels
        /**
         * @param $labelnr
         * @param $label
         * @param $format
         * @return bool
         */
        public function slk_set($labelnr, $label, $format) {
            return ncurses_slk_set($labelnr, $label, $format);
        }

        // int ncurses_slk_touch (void) - Forces output when ncurses_slk_noutrefresh is performed
        /**
         * @return int
         */
        public function slk_touch() {
            return ncurses_slk_touch();
        }

        // int ncurses_standend (void) - Stop using "standout" attribute
        /**
         * @return int
         */
        public function standend() {
            return ncurses_standend();
        }

        // int ncurses_standout (void) - Start using "standout" attribute
        /**
         * @return int
         */
        public function standout() {
            return ncurses_standout();
        }

        // int ncurses_start_color (void) - Initializes color functionality
        /**
         * @return int
         */
        public function start_color() {
            return ncurses_start_color();
        }

        // bool ncurses_termattrs (void) - Returns a logical OR of all attribute flags supported by terminal
        /**
         * @return bool
         */
        public function termattrs() {
            return ncurses_termattrs();
        }

        // string ncurses_termname (void) - Returns terminals (short)-name
        /**
         * @return string
         */
        public function termname() {
            return ncurses_termname();
        }

        // void ncurses_timeout (int $millisec) - Set timeout for special key sequences
        /**
         * @param $millisec
         */
        public function timeout($millisec) {
            return ncurses_timeout($millisec);
        }

        // int ncurses_top_panel (resource $panel) - Moves a visible panel to the top of the stack
        /**
         * @param $panel
         * @return int
         */
        public function top_panel($panel) {
            return ncurses_top_panel($panel);
        }

        // int ncurses_typeahead (int $fd) - Specify different filedescriptor for typeahead checking
        /**
         * @param $fd
         * @return int
         */
        public function typeahead($fd) {
            return ncurses_typeahead($fd);
        }

        // int ncurses_ungetch (int $keycode) - Put a character back into the input stream
        /**
         * @param $keycode
         * @return int
         */
        public function ungetch($keycode) {
            return ncurses_ungetch($keycode);
        }

        // bool ncurses_ungetmouse (array $mevent) - Pushes mouse event to queue
        /**
         * @param $mevent
         * @return bool
         */
        public function ungetmouse($mevent) {
            return ncurses_ungetmouse($mevent);
        }

        // void ncurses_update_panels (void) - Refreshes the virtual screen to reflect the relations between panels in the stack
        /**
         *
         */
        public function update_panels() {
            return ncurses_update_panels();
        }

        // bool ncurses_use_default_colors (void) - Assign terminal default colors to color id -1
        /**
         * @return bool
         */
        public function use_default_colors() {
            return ncurses_use_default_colors();
        }

        // void ncurses_use_env (bool $flag) - Control use of environment information about terminal size
        /**
         * @param $flag
         */
        public function use_env($flag) {
            return ncurses_use_env($flag);
        }

        // int ncurses_use_extended_names (bool $flag) - Control use of extended names in terminfo descriptions
        /**
         * @param $flag
         * @return int
         */
        public function use_extended_names($flag) {
            return ncurses_use_extended_names($flag);
        }

        // int ncurses_vidattr (int $intarg) - Display the string on the terminal in the video attribute mode
        /**
         * @param $intarg
         * @return int
         */
        public function vidattr($intarg) {
            return ncurses_vidattr($intarg);
        }

        // int ncurses_vline (int $charattr , int $n) - Draw a vertical line at current position using an attributed character and max. n characters long
        /**
         * @param $charattr
         * @param $n
         * @return int
         */
        public function vline($charattr, $n) {
            return ncurses_vline($charattr, $n);
        }

        // int ncurses_waddch (resource $window , int $ch) - Adds character at current position in a window and advance cursor
        /**
         * @param $window
         * @param $ch
         * @return int
         */
        public function waddch($window, $ch) {
            return ncurses_waddch($window, $ch);
        }

        // int ncurses_waddstr (resource $window , string $str [, int $n ]) - Outputs text at current postion in window
        /**
         * @param $window
         * @param $str
         * @param $n
         * @return int
         */
        public function waddstr($window, $str, $n = -1) {
            return ncurses_waddstr($window, $str, $n);
        }

        // int ncurses_wattroff (resource $window , int $attrs) - Turns off attributes for a window
        /**
         * @param $window
         * @param $attrs
         * @return int
         */
        public function wattroff($window, $attrs) {
            return ncurses_wattroff($window, $attrs);
        }

        // int ncurses_wattron (resource $window , int $attrs) - Turns on attributes for a window
        /**
         * @param $window
         * @param $attrs
         * @return int
         */
        public function wattron($window, $attrs) {
            return ncurses_wattron($window, $attrs);
        }

        // int ncurses_wattrset (resource $window , int $attrs) - Set the attributes for a window
        /**
         * @param $window
         * @param $attrs
         * @return int
         */
        public function wattrset($window, $attrs) {
            return ncurses_wattrset($window, $attrs);
        }

        // int ncurses_wborder (resource $window , int $left , int $right , int $top , int $bottom , int $tl_corner , int $tr_corner , int $bl_corner , int $br_corner) - Draws a border around the window using attributed characters
        /**
         * @param $window
         * @param $left
         * @param $right
         * @param $top
         * @param $bottom
         * @param $tl_corner
         * @param $tr_corner
         * @param $bl_corner
         * @param $br_corner
         * @return int
         */
        public function wborder($window, $left, $right, $top, $bottom, $tl_corner, $tr_corner, $bl_corner, $br_corner) {
            return ncurses_wborder($window, $left, $right, $top, $bottom, $tl_corner, $tr_corner, $bl_corner, $br_corner);
        }

        // int ncurses_wclear (resource $window) - Clears window
        /**
         * @param $window
         * @return int
         */
        public function wclear($window) {
            return ncurses_wclear($window);
        }

        // int ncurses_wcolor_set (resource $window , int $color_pair) - Sets windows color pairings
        /**
         * @param $window
         * @param $color_pair
         * @return int
         */
        public function wcolor_set($window, $color_pair) {
            return ncurses_wcolor_set($window, $color_pair);
        }

        // int ncurses_werase (resource $window) - Erase window contents
        /**
         * @param $window
         * @return int
         */
        public function werase($window) {
            return ncurses_werase($window);
        }

        // int ncurses_wgetch (resource $window) - Reads a character from keyboard (window)
        /**
         * @param $window
         * @return int
         */
        public function wgetch($window) {
            return ncurses_wgetch($window);
        }

        // int ncurses_whline (resource $window , int $charattr , int $n) - Draws a horizontal line in a window at current position using an attributed character and max. n characters long
        /**
         * @param $window
         * @param $charattr
         * @param $n
         * @return int
         */
        public function whline($window, $charattr, $n) {
            return ncurses_whline($window, $charattr, $n);
        }

        // bool ncurses_wmouse_trafo (resource $window , int &$y , int &$x , bool $toscreen) - Transforms window/stdscr coordinates
        // DD See notes on uncurses::mouse_trafo()
        /**
         * @param $window
         * @param $y
         * @param $x
         * @param $toscreen
         * @return array
         */
        public function wmouse_trafo($window, $y, $x, $toscreen) {
            $return_value = ncurses_wmouse_trafo($window, $y, $x, $toscreen);

            return array(
                'return' => $return_value,
                'y'      => $y,
                'x'      => $x,
            );
        }

        // int ncurses_wmove (resource $window , int $y , int $x) - Moves windows output position
        /**
         * @param $window
         * @param $y
         * @param $x
         * @return int
         */
        public function wmove($window, $y, $x) {
            return ncurses_wmove($window, $y, $x);
        }

        // int ncurses_wnoutrefresh (resource $window) - Copies window to virtual screen
        /**
         * @param $window
         * @return int
         */
        public function wnoutrefresh($window) {
            return ncurses_wnoutrefresh($window);
        }

        // int ncurses_wrefresh (resource $window) - Refresh window on terminal screen
        /**
         * @param $window
         * @return int
         */
        public function wrefresh($window) {
            return ncurses_wrefresh($window);
        }

        // int ncurses_wstandend (resource $window) - End standout mode for a window
        /**
         * @param $window
         * @return int
         */
        public function wstandend($window) {
            return ncurses_wstandend($window);
        }

        // int ncurses_wstandout (resource $window) - Enter standout mode for a window
        /**
         * @param $window
         * @return int
         */
        public function wstandout($window) {
            return ncurses_wstandout($window);
        }

        // int ncurses_wvline (resource $window , int $charattr , int $n) - Draws a vertical line in a window at current position using an attributed character and max. n characters long
        /**
         * @param $window
         * @param $charattr
         * @param $n
         * @return int
         */
        public function wvline($window, $charattr, $n) {
            return ncurses_wvline($window, $charattr, $n);
        }
    }

    // EOF