<?php
    class Note {
        public $label;
        public $text;
        public $date;
    }

    class UserNote extends Note {
        public function __construct($label, $text, $date) {
            if (strlen($label) > 200) {
                echo "max label length - 200, you have - " . strlen($label);
                exit();
            } else if (strlen($text) > 20000) {
                echo "max text length - 20000, you have - " . strlen($text);
                exit();
            }
            $this->label = $label;
            $this->text = $text;
            $this->date = $date;
        }
    }