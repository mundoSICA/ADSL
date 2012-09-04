<?php
App::import('vendor', 'markdown/markdown');

class MarkdownHelper extends Helper {
    public function parse($text) {
        return Markdown($text);
    }
}
