<?php
class PruebaShell extends AppShell {
		public $uses = array('Taller');
		public function main() {
				//$this->out('<warning>'..'</warning>');
				$this->Taller->id = 1;
				echo print_r($this->Taller->read(null, 1), true);
				$this->hr();
				$this->out('<warning>'.TMP.'</warning>');
		}
}
