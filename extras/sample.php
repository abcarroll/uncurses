<?php
ini_set('log_errors', 'true');
ini_set('error_log', 'error.log');

// Please use composer instead!
require '../src/Uncurses.php';
require '../src/Window.php';

$curses = new \Uncurses\Uncurses([
    'echo'          => false,
    'waitForReturn' => false,
    'raw'           => false,
]);

$curses->addStr("This string will be written on STDSCR, the implied physical terminal\n");
$curses->refresh();

// Change the "50" in the 2nd parameter to 0 to get a full-width window
$rootWindow = $curses->newWindow(0, 50, 0, 1);
$rootWindow->addBorder(0, 0, 0, 0, 0, 0, 0, 0);
$rootWindow->move(0, 5);
$rootWindow->addStr(" The ncurses sample application ");
$rootWindow->move(1, 2);
$rootWindow->refresh();

while(1) {
    $next = $curses->getChar();

    // Refer to the ASCII table.. 0x20 through 0x7F are printable characters
    if($next >= 0x20 && $next <= 0x7E) {

        $pos = $rootWindow->getPos();
        if($pos['x'] == ($rootWindow->getmaxx() - 2)) { // the -2 is to take into account the border, and a 1 character margin
            $rootWindow->move($pos['y'] + 1, 2);
        }

        $rootWindow->addChar($next);
        $rootWindow->refresh();
    } elseif($next == NCURSES_KEY_BACKSPACE) {
        // This is a way to emulate a backspace; delch() should work but it does not in the context of windows
        $pos = $rootWindow->getPos();

        // reverse wrap
        if($pos['x'] == 2 && $pos['y'] > 2) {
            $rootWindow->move($pos['y'] - 1, $rootWindow->getmaxx() - 2);
        }

        $pos = $rootWindow->getPos();
        $rootWindow->move($pos['y'], $pos['x'] - 1);
        $rootWindow->addChar(ord(' ' ));
        $rootWindow->move($pos['y'], $pos['x'] - 1);
        $rootWindow->refresh();
    } elseif($next == 13) {
        $pos = $rootWindow->getPos();
        $rootWindow->move($pos['y'] + 1, 2);
        $rootWindow->refresh();
    } else {
        $rootWindow->addStr($next);
        $rootWindow->refresh();
    }
}