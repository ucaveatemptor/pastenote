<?php
    class Note {
        public $id;
        public $label;
        public $text;
        public $date;
        public function __construct($label, $text, $date) {
            $this->label = $label;
            $this->text = $text;
            $this->date = $date;
        }
    }