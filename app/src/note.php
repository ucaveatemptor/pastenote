<?php
    class Note {
        public $label;
        public $text;
        public $date;
    }

    class UserNote extends Note {
        public function __construct($label, $text, $date) {
            if (strlen($label) > 200) {
                echo "label too long";
                exit();
            } else if (strlen($text) > 1000) {
                echo "text too long";
                exit();
            }
            $this->label = $label;
            $this->text = $text;
            $this->date = $date;
        }
    }