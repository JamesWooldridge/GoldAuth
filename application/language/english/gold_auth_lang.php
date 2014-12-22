<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *	Gold Auth Language Config
 *	@version: 0.1
 *	@author: James Wooldridge [james.wooldridgesc@gmail.com]
 *	@since: 22/12/14
 *
 *	Description: Language file for errors and messages
 */

/* Account Creation & Manipulation */
$lang['acc_creation_successful'] 	  		= 'Account successfully created';
$lang['acc_creation_unsuccessful'] 	 	 	= 'Unable to create account';
$lang['acc_creation_duplicate_email'] 	 	= 'Given email already in use';
$lang['acc_creation_duplicate_username'] 	= 'Given username is already in use';
$lang['acc_creation_duplicate_emp_id'] 		= 'Given employee id is already in use';
$lang['user_update_successful']				= 'User information successfully updated';
$lang['user_update_unsuccessful']			= 'User information update was unsuccessful';
$lang['check_username']						= 'Given username is already in use';
$lang['pass_reset_successful'] 	  			= 'Password successfully reset';
$lang['pass_reset_unsuccessful'] 	 	 	= 'Unable to reset password';
$lang['pass_change_successful'] 	  		= 'Password successfully changed';
$lang['pass_change_unsuccessful'] 	 	 	= 'Unable to change password';
$lang['del_user_successful'] 	  			= 'User successfully deleted';
$lang['del_user_unsuccessful'] 	 	 		= 'Unable to delete user';
$lang['acc_creation_min_pass'] 	  			= 'Given password is too short';
$lang['acc_creation_max_pass'] 	 	 		= 'Given password is too long';

/* Activation & Deactivation */
$lang['acc_activate_successful'] 	  		= 'Account successfully activated';
$lang['acc_activate_unsuccessful'] 	 	 	= 'Unable to activate account';
$lang['acc_deactivate_successful'] 	  		= 'Account successfully de-activated';
$lang['acc_deactivate_unsuccessful'] 	 	= 'Unable to de-activate account';

/* Login & Logout */
$lang['login_successful'] 		  	         = 'Logged in successfully';
$lang['login_unsuccessful'] 		  	     = 'Incorrect username or password';
$lang['login_unsuccessful_not_active'] 		 = 'Account is not yet active. Contact admin';
$lang['logout_successful'] 		 	         = 'Logged out successfully';
$lang['remember_user_unsuccessful'] 		 = 'Could not remembe user';
$lang['remember_user_successful'] 		 	 = 'Remembered user successfully';

/* Roles */
$lang['role_creation_unsuccessful'] 		 = 'Unable to create role';
$lang['role_creation_successful'] 		     = 'Role successfully created';
$lang['role_creation_duplicate_name'] 		 = 'Given role name already in use';

/* Permissions */
$lang['action_allowed'] 					 = 'Action is allowed';
$lang['action_not_allowed'] 		     	 = 'You do not have permission to complete this action';
