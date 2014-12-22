#!/usr/bin/python
import re
import pymysql
import time
import sys
import os

# Connection vars
host = '127.0.0.1'
port = 3306
user = 'root'
perm_table = 'dbname.permissions'
role_table = 'dbname.roles'

# Get the list of permissions
f = open('permissions')
lines = f.readlines(); 
f.close(); 

if not (sys.argv[1]):
	print('use: readPermissions <mysql root password>')

pwd = sys.argv[1]


conn = pymysql.connect(host=host, port=port, user=user, passwd=pwd)
cur = conn.cursor()

error = False;
# Go through, use re to parse and insert into the database; 
for line in lines:
	m = re.findall("[a-zA-Z][a-zA-Z ]*[a-zA-Z]", line)

	try:
		#Do a lookup to find the perm_id
		sql = 'select perm_id from ' + perm_table + ' where perm_name="' + m[1] + '";'
		cur.execute(sql)
		result = cur.fetchall()
		permid = result[0][0]

		#Do a lookup to find the role_id 
		sql = 'select role_id from ' + role_table + ' where role_name="' + m[0] + '";'
		cur.execute(sql)
		result = cur.fetchall()
		roleid = result[0][0]
	except IndexError:
		try: 
			with open("permissionslog.txt", "a") as myfile:
				myfile.write('\nError in writing permissions for ' + m[0] + ' ' + m[1] + ' ' + m[2])
				error = True;
		except IndexError:
			continue #If it's just a comment, skip the line. if its a genuine match, write it to the file
			
		continue #comment or error

	#if the user role is given the ability to perform that action, insert it into the db
	sql = 'insert into ' + perm_table + ' (perm_id, role_id) values (' + str(permid) + ', ' + str(roleid) + ');'
	print(sql)
	
	cur.execute(sql)

cur.close()
conn.close()

if not error:
	os.remove("permissionslog.txt");
