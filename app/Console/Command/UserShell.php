<?php
/*
 * Shell util para cambiar el password a usuarios
 */
class UserShell extends AppShell {
		public $uses = array('User');
		public function main() {
				$this->User->order = 'User.id';
				$users = $this->User->find('list');
				foreach ($users as $user_id => $user_nickname) :
					$prev = str_repeat(' ', 3 - strlen($user_id)) . $user_id;
					$this->out( $prev . ".- <warning>" . $user_nickname . '</warning>');
				endforeach;
				$id = $this->in('Seleccione un numero');
				if (!isset($users[$id])) {
					return 0;
				}
				$this->out('Usuario seleccionado <warning>'.$users[$id].'</warning>');
				$this->User->recursive = -1;
				$this->User->id = $id;
				$user = $this->User->read();
				$user['User']['password'] = $this->_password();
				if( $this->User->save($user) ){
						$this->out('La contraseña fue cambiada con exito');
				}else{
						$this->out('Error al intentar cambiar al contraseña');
				}
		}
		
		/**
		 * Pide una nueva contraseña y regresa el hash de la misma
		 *
		 * @return El hash correspondiente al password
		 * @access privado
		 */
		function _password() {
			$pass_plain = $this->in('El nuevo password: ');
			App::import('Component', 'Auth');
			$auth =& new AuthComponent(null);
			var_dump($auth->password($pass_plain));
			return $auth->password($pass_plain);
		}
}
