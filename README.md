Gold Auth
=========
A lightweight authentication and RBAC library for the CodeIgniter framework.

About & Motivation
------------
Gold Auth is a simple, lightweight authentication library for the CodeIgniter framework, based on Redux Authentication. The reason for making it was two-fold: one, I needed a basic auth library for work that can be adapted to multiple different projects, and two, I wanted some practice in trying to understand libraries and whatnot in CI. The main motivation is the RBAC side of things - specifying roles that users can belong to, and the actions that roles may perform. Here, users may belong to multiple roles, and roles may have multiple permissions. It's worth noting that it is very lightweight, as a side effect of it being a work project. Certain functionality such as a 'forgotten password' feature is not included (yet).

Installation & Config
------------
Just take all of the files here and copy them into an existing CI project, and edit as needed. 

### Files:
*config/gold_auth.php

The main config file for the library. Use to set table names, authentication, and cryptography options.

*language/english/gold_auth_lang.php

	Specifies success and error messages.

*models/gold_auth_model.php

	The bulk of everything.

*models/password.php

	Anthony Ferrara's 5.5 compat. lib.

*sql/auth.sql

	Basic db setup

*sql/scripts/permissions

	Easy way to specify role/permission mapping. Format specified in file.

*sql/scripts/read_permissions.py

	Script to parse the permission mapping file and put everything in the database.

*view/auth/permission_denied.php

	Basic permission denied page for when users are naughty and try to do things they're not allowed. Edit this to suit the look and feel of your web app, or replace it altogether.

