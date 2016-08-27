<?php

/**
 * Class Ascii is a utility class containing constants for all control and printable characters, as well as helper methods.
 */
class Ascii {

    /**
     * Null Char
     */
    const C_NUL = 0x00; // Null char

    /**
     * Start of Heading
     */
    const C_SOH = 0x01; // Start of Heading

    /**
     * Start of Text
     */
    const C_STX = 0x02; // Start of Text

    /**
     * End of Text
     */
    const C_ETX = 0x03; // End of Text

    const C_EOT = 0x04; // End of Transmission

    const C_ENQ = 0x05; // Enquiry

    const C_ACK = 0x06; // Acknowledgment

    const C_BEL = 0x07; // Bell

    const C_BS = 0x08;  // Back Space

    const C_HT = 0x09;  // Horizontal Tab

    const C_LF = 0x0A;  // Line Feed

    const C_VT = 0x0B;  // Vertical Tab

    const C_FF = 0x0C;  // Form Feed

    const C_CR = 0x0D;  // Carriage Return

    const C_SO = 0x0E;  // Shift Out / X-On

    const C_SI = 0x0F;  // Shift In / X-Off

    const C_DLE = 0x10; // Data Line Escape

    const C_DC1 = 0x11; // Device Control 1 (oft. XON)

    const C_DC2 = 0x12; // Device Control 2

    const C_DC3 = 0x13; // Device Control 3 (oft. XOFF)

    const C_DC4 = 0x14; // Device Control 4

    const C_NAK = 0x15; // Negative Acknowledgement

    const C_SYN = 0x16; // Synchronous Idle

    const C_ETB = 0x17; // End of Transmit Block

    const C_CAN = 0x18; // Cancel

    const C_EM = 0x19;  // End of Medium

    const C_SUB = 0x1A; // Substitute

    const C_ESC = 0x1B; // Escape

    const C_FS = 0x1C;  // File Separator

    const C_GS = 0x1D;  // Group Separator

    const C_RS = 0x1E;  // Record Separator

    const C_US = 0x1F;  // Unit Separator

    const KEY_SPACE = 0x20; // Space

    const KEY_EXCLAMATION = 0x21; // Exclamation mark

    const KEY_QUOTE_DBL = 0x22; // &quot;	Double quotes (or speech marks)

    const KEY_HASH = 0x23; // Hash / Pound

    const KEY_DOLLAR = 0x24; // Dollar

    const KEY_PERCENT = 0x25; // Percent

    const KEY_AMPERSAND = 0x26; // &amp;	Ampersand

    const KEY_QUOTE_SINGLE = 0x27; // Single quote

    const KEY_PAREN_OPEN = 0x28; // Open parenthesis (or open bracket)

    const KEY_PAREN_CLOSE = 0x29; // Close parenthesis (or close bracket)

    const KEY_ASTERISK = 0x2A; // Asterisk

    const KEY_PLUS = 0x2B; // Plus

    const KEY_COMMA = 0x2C; // Comma

    const KEY_HYPHEN = 0x2D; // Hyphen

    const KEY_PERIOD = 0x2E; // Period, dot or full stop

    const KEY_SLASH_FWD = 0x2F; // Slash or divide

    const KEY_NUM_0 = 0x30; // Zero

    const KEY_NUM_1 = 0x31; // One

    const KEY_NUM_2 = 0x32; // Two

    const KEY_NUM_3 = 0x33; // Three

    const KEY_NUM_4 = 0x34; // Four

    const KEY_NUM_5 = 0x35; // Five

    const KEY_NUM_6 = 0x36; // Six

    const KEY_NUM_7 = 0x37; // Seven

    const KEY_NUM_8 = 0x38; // Eight

    const KEY_NUM_9 = 0x39; // Nine

    const KEY_COLON = 0x3A; // Colon

    const KEY_SEMICOLON = 0x3B; // Semicolon

    const KEY_LESS_THAN = 0x3C; // '<' Less than (or open angled bracket)

    const KEY_EQUAL = 0x3D; // Equals

    const KEY_GREATER_THAN = 0x3E; // '>' Greater than (or close angled bracket)

    const KEY_QUESTION = 0x3F; // Question mark

    const KEY_AT_SIGN = 0x40; // At sign

    const KEY_UPPER_A = 0x41; // Uppercase A

    const KEY_UPPER_B = 0x42; // Uppercase B

    const KEY_UPPER_C = 0x43; // Uppercase C

    const KEY_UPPER_D = 0x44; // Uppercase D

    const KEY_UPPER_E = 0x45; // Uppercase E

    const KEY_UPPER_F = 0x46; // Uppercase F

    const KEY_UPPER_G = 0x47; // Uppercase G

    const KEY_UPPER_H = 0x48; // Uppercase H

    const KEY_UPPER_I = 0x49; // Uppercase I

    const KEY_UPPER_J = 0x4A; // Uppercase J

    const KEY_UPPER_K = 0x4B; // Uppercase K

    const KEY_UPPER_L = 0x4C; // Uppercase L

    const KEY_UPPER_M = 0x4D; // Uppercase M

    const KEY_UPPER_N = 0x4E; // Uppercase N

    const KEY_UPPER_O = 0x4F; // Uppercase O

    const KEY_UPPER_P = 0x50; // Uppercase P

    const KEY_UPPER_Q = 0x51; // Uppercase Q

    const KEY_UPPER_R = 0x52; // Uppercase R

    const KEY_UPPER_S = 0x53; // Uppercase S

    const KEY_UPPER_T = 0x54; // Uppercase T

    const KEY_UPPER_U = 0x55; // Uppercase U

    const KEY_UPPER_V = 0x56; // Uppercase V

    const KEY_UPPER_W = 0x57; // Uppercase W

    const KEY_UPPER_X = 0x58; // Uppercase X

    const KEY_UPPER_Y = 0x59; // Uppercase Y

    const KEY_UPPER_Z = 0x5A; // Uppercase Z

    const KEY_BRACKET_OPEN = 0x5B; // Opening bracket

    const KEY_BACKSLASH = 0x5C; // Backslash

    const KEY_BRACKET_CLOSE = 0x5D; // Closing bracket

    const KEY_CARET = 0x5E; // Caret - circumflex

    const KEY_UNDERSCORE = 0x5F; // Underscore

    const KEY_BACKTICK = 0x60; // Grave accent

    const KEY_LOWER_A = 0x61; // Lowercase a

    const KEY_LOWER_B = 0x62; // Lowercase b

    const KEY_LOWER_C = 0x63; // Lowercase c

    const KEY_LOWER_D = 0x64; // Lowercase d

    const KEY_LOWER_E = 0x65; // Lowercase e

    const KEY_LOWER_F = 0x66; // Lowercase f

    const KEY_LOWER_G = 0x67; // Lowercase g

    const KEY_LOWER_H = 0x68; // Lowercase h

    const KEY_LOWER_I = 0x69; // Lowercase i

    const KEY_LOWER_J = 0x6A; // Lowercase j

    const KEY_LOWER_K = 0x6B; // Lowercase k

    const KEY_LOWER_L = 0x6C; // Lowercase l

    const KEY_LOWER_M = 0x6D; // Lowercase m

    const KEY_LOWER_N = 0x6E; // Lowercase n

    const KEY_LOWER_O = 0x6F; // Lowercase o

    const KEY_LOWER_P = 0x70; // Lowercase p

    const KEY_LOWER_Q = 0x71; // Lowercase q

    const KEY_LOWER_R = 0x72; // Lowercase r

    const KEY_LOWER_S = 0x73; // Lowercase s

    const KEY_LOWER_T = 0x74; // Lowercase t

    const KEY_LOWER_U = 0x75; // Lowercase u

    const KEY_LOWER_V = 0x76; // Lowercase v

    const KEY_LOWER_W = 0x77; // Lowercase w

    const KEY_LOWER_X = 0x78; // Lowercase x

    const KEY_LOWER_Y = 0x79; // Lowercase y

    const KEY_LOWER_Z = 0x7A; // Lowercase z

    const KEY_BRACE_OPEN = 0x7B; // Opening brace

    const KEY_PIPE = 0x7C; // Vertical bar

    const KEY_BRACE_CLOSE = 0x7D; // Closing brace

    const KEY_TILDE = 0x7E; // Equivalency sign - tilde

    const KEY_DEL = 0x7F; // Delete

    const EXTENDED_BEGIN = 0x80;

    const EXTENDED_END = 0xFF;

    static public function getType($c) {

        if(self::isControl($c)) {
            return 'control';
        } elseif(self::isPrintable($c)) {
            return 'printable';
        } elseif(self::isExtended($c)) {
            return 'extended';
        } else {
            // passed a non-string or multiple characters
            return 'none';
        }
    }

    static public function isControl($c) {

        if($c >= self::C_NUL && $c <= self::C_US) {
            return true;
        } else {
            return false;
        }
    }

    static public function isPrintable($c) {

        if($c >= self::KEY_SPACE && $c <= self::KEY_DEL) {
            return true;
        } else {
            return false;
        }
    }

    static public function isExtended($c) {

        if($c >= self::EXTENDED_BEGIN && $c <= self::EXTENDED_END) {
            return true;
        } else {
            return false;
        }
    }
}