# MySQL prep for Authentication / RABC system

#
#	User table setup
#
DROP TABLE IF EXISTS users;

CREATE TABLE users (
	id integer UNSIGNED NOT NULL AUTO_INCREMENT,
	username varchar(100) NOT NULL,
	password varchar(100) NOT NULL,
	email varchar(100) NOT NULL,
	created_on int(11) UNSIGNED NOT NULL,
	last_login int(11) UNSIGNED DEFAULT NULL,
	active tinyint(1) UNSIGNED DEFAULT NULL,
	remember_code varchar(40) DEFAULT NULL,
	emp_id integer UNSIGNED NOT NULL,
	date_modified int(11) UNSIGNED NOT NULL,
	PRIMARY KEY (id)
);

#
#	Roles table setup
#	Defines the possible roles/groups in the system
#
DROP TABLE IF EXISTS roles;

CREATE TABLE roles (
	role_id integer UNSIGNED NOT NULL AUTO_INCREMENT,
	role_name varchar(50) NOT NULL,
	role_description varchar(200) NOT NULL,
	PRIMARY KEY (role_id)
);

#
#	Permissions table setup
#	Defines the possible permissions in the system
#
DROP TABLE IF EXISTS permissions;

CREATE TABLE permissions (
	perm_id integer UNSIGNED NOT NULL AUTO_INCREMENT,
	perm_name varchar(50) NOT NULL,
	perm_description varchar(200) NOT NULL,
	PRIMARY KEY (perm_id)
);

#
#	Role permissions table setup
#	Associated permissions belonging to a role
#
DROP TABLE IF EXISTS role_permissions;

CREATE TABLE role_permissions (
	id integer UNSIGNED NOT NULL AUTO_INCREMENT,
	role_id integer UNSIGNED NOT NULL,
  	perm_id integer UNSIGNED NOT NULL,
  	PRIMARY KEY (id)
);

#
#	User roles table setup
#	Associated which users belong to which roles
#
DROP TABLE IF EXISTS user_roles;

CREATE TABLE user_roles (
	id integer UNSIGNED NOT NULL AUTO_INCREMENT,
	user_id integer UNSIGNED NOT NULL,
  	role_id integer UNSIGNED NOT NULL,
  	PRIMARY KEY (id)
);

#
#	Table to track actions of users throughout the system
#	A record for each action performed.
#	
#	The table_used field refers to a table in the database that is relevant to the action
#	The table_id field is the id of the record in that table
#
#	For example, modifying employee record (id: 12) will contain 'employees' and '12' in those two fields
#
DROP TABLE IF EXISTS actions;

CREATE TABLE actions (
	id integer UNSIGNED NOT NULL AUTO_INCREMENT,
	user_id integer UNSIGNED NOT NULL,
	table_used varchar(64) NOT NULL,
	table_id integer UNSIGNED NOT NULL,
	action varchar(128) NOT NULL,
	details varchar(128),
	action_timestamp integer UNSIGNED NOT NULL,
	PRIMARY KEY (id)
);

insert into roles (role_name, role_description) values ('admin', 'controller of all')