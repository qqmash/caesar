<?php
class CaesarCipher {
    private $alphabet;
    private $shift;

    public function setAlphabet($alphabet)
    {
        $this->alphabet = $alphabet;
    }

    public function setShift($shift)
    {
        $this->shift = $shift;
    }

    public function encode($plainText)
    {
        $encoded_text = '';
        $code = $this->alphabet;
        
        for ($i = 0; $i < $this->shift; $i++) {
            $char = mb_substr($code, 0, 1, 'utf-8');
            $code = mb_substr($code, 1, mb_strlen($code, 'utf-8'), 'utf-8') . $char;
        }
        
        $textLength = mb_strlen($plainText, 'utf-8');

        for ($i = 0; $i < $textLength; $i++) {
            $char = mb_substr($plainText, $i, 1, 'utf-8');
            $pos = mb_strpos($this->alphabet, $char, 0, 'utf-8');

            if (false !== $pos) {
                $encodedText .= mb_substr($code, $pos, 1, 'utf-8');
            } else {
                $encodedText .= $char;
            }
        }

        return $encodedText;
    }
}
