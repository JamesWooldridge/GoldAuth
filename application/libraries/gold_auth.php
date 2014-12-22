<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	/**
	 *	Gold Auth
	 *	@version: 0.1
	 *	@author: James Wooldridge [james.wooldridgesc@gmail.com]
	 *	@since: 22/12/14
	 *
	 *	Description: An authentication and role-based access control library for the CodeIgniter framework
	 */
	class Gold_auth {

		public function __construct() {
			$this->load->config('gold_auth', TRUE);
			$this->load->library('session');
			$this->load->model('gold_auth_model');					// Load the model
			$this->load->helper('cookie');							// Load the cookie helper

			/* Perform auto-login if needed */
			if(!$this->logged_in() && get_cookie('identity') && get_cookie('remember_code')) {
				$this->gold_auth_model->login_remembered_user();
			}
		}

		/* ============= Magic helpers ============== */

		/** 
		 *	To help with getting the CI instance to access models, helpers, etc..
		 */
		public function __get($var) {
			return get_instance()->$var;
		}

		/**
		 *	To call methods in the model via this library from controllers
		 */
		public function __call($method, $arguments) {
			if (!method_exists($this->gold_auth_model, $method) ) {
				throw new Exception('Undefined method Gold_auth::' . $method . '() called');
			}
			return call_user_func_array(array($this->gold_auth_model, $method), $arguments);
		}

		/* ============= Account Management Functions ============= */

		/**
		 *	Registers a new user
		 */
		public function register($username, $email, $password, $emp_id, $roles = null) {
			$id = $this->gold_auth_model->register($username, $email, $password, $emp_id, $roles);		// Call the method in the model

			if(!$id) {
				$this->set_error('acc_creation_unsuccessful');											// Check if registration was unsuccessful
				return FALSE;
			} else {
				$this->set_message('acc_creation_successful');
				return $id;
			}
		}

		/**
		 *	Logs the user out and destroys session data
		 */
		public function logout() {
			$identity = $this->config->item('identity', 'gold_auth');		// Get the identity being used

			if(get_cookie('identity')) {									// Check if we need to delete remember me cookies, and delete them if so
				delete_cookie('identity');
			}
			if(get_cookie('remember_code')) {
				delete_cookie('remember_code');
			}
			$this->gold_auth_model->set_log_flag(0, $this->gold_auth_model->get_user()->id);				// Set the logged in flag

			$this->session->sess_destroy();									// Destroy the session
			$this->set_message('logout_successful');						// Set the logout message
			return TRUE;
		}

		/**
		 *	Returns true if the user is logged in
		 */
		public function logged_in() {
			return $this->session->userdata('identity');
		}

		/* ============= Role / Permission Functions ============= */

		/**
		 *	Checks whether the logged in user can perform the given action
		 */
		public function can($action, $modal = false) {
			$id = $this->session->userdata('user_id');						// Get the id of the current user
			
			if($this->gold_auth_model->can($action, $id)) {
				$this->set_message('action_allowed');						// Set the success message
				return TRUE;
			} else {
				$this->set_error('action_not_allowed');						// Set the error message
				if($modal) {
					return FALSE;
				} else {
					redirect('auth/permission_denied');
				}
			}
		}

	}
?>