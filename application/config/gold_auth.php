<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
|| Info:
| ----------------------------
| Various configuration options for gold auth.
|
| Author: James Wooldridge
|		  [james.wooldridgesc@gmail.com]
*/

	
/*
|| Relevant Tables:
| ----------------------------
| Names of relevant tables in the database
*/
$config['tables']['users']				= 'users';				// Table storing user data
$config['tables']['roles']				= 'roles';				// Table storing roles
$config['tables']['permissions']		= 'permissions';		// Table storing permissions
$config['tables']['role_permissions']	= 'role_permissions';	// Table mapping permissions to roles
$config['tables']['user_roles']			= 'user_roles';			// Table mapping users to roles
$config['tables']['actions']			= 'actions';			// Action logging

/*
|| Authentication Options:
| ----------------------------
| Various options regarding authentication:
| default roles, password lengths, max login attempts, etc.
*/
$config['default_role']       			= 'admin';             // Name of the default role to give new users
$config['admin_role']       			= 'admin';             // Name of the admin role
$config['user_ident']	        		= 'username';          // The database column used to log in with (e.g. email or username)
$config['min_password_length']        	= 8;                   // Minimum required length of password
$config['max_password_length']        	= 20;                  // Maximum allows length of password
$config['remember_users']             	= TRUE;                // Allow users to be remembered (auto_login)
$config['user_expire']                	= 86500;               // How long to remember the user (seconds). Set to zero for no expiration
$config['extend_remember']				= TRUE;				   // Whether to extend the expire time of the remember cookies when a user is logged in
$config['maximum_login_attempts']     	= 0;                   // The maximum number of failed login attempts. Set to zero for no limit

/*
|| Cryptography Options:
| ----------------------------
| Various options regarding hashing, salting, etc.
| 
| Using bcrypt, which is available in PHP 5.3+
*/
$config['hash_cost']					= 12;					// Cost of the hashing
$config['salt_length'] 					= 22;					// Length of generated salts. Must be > 22
$config['store_salt']					= TRUE;					// Whether to store the salt in the database

/*
|| Salt Options:
| ----------------------------
| Various options regarding password salts
| NOTE: salt options are currently not in use due to password_hash (> 5.5) computing salts automatically
*/


/*
 || Message Delimiters
 | ----------------------------
 */
$config['message_start_delimiter'] = '<div class="alert alert-success">'; 	// Message start delimiter
$config['message_end_delimiter']   = '</div>'; 								// Message end delimiter
$config['error_start_delimiter']   = '<div class="alert alert-danger">';	// Error mesage start delimiter
$config['error_end_delimiter']     = '</div>';								// Error mesage end delimiter
?>