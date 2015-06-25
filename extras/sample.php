<?php

require '../src/Uncurses.php';
require '../src/Window.php';

$curses = new \Uncurses\Uncurses([
    'echo'          => false,
    'waitForReturn' => false,
    'raw'           => false,
]);

$rootWindow = $curses->newWindow(100, 100, 0, 0);
$rootWindow->addStr("Hello world!"); // this doesn't work for some stupi dreason
ncurses_mvwaddstr($rootWindow->getWindowResource(), 0, 1, "Hello World"); // neither does this

$rootWindow->refresh();
$curses->refresh();

while(1) {
    $next = $curses->getch();
    $rootWindow->addChar($next);
    $rootWindow->refresh();
    $curses->refresh();
}