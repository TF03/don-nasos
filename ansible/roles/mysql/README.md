MySql
=========

Install MySql database.

Requirements
------------

Ubuntu trusty with the package python-pycurl and python-software-properties installed.

Role Variables
--------------

Available variables are listed below, along with default values (see [defaults/main.yml](defaults/main.yml)):

    mysql_config_src_file: my.cnf.j2 # Path of a Jinja2 formatted template on the local server. This can be a relative or absolute path.
    mysql_root_pass_config_src_file: root_pass_my.cnf.j2 # Path of a Jinja2 formatted template on the local server. This can be a relative or absolute path.
    mysql_bind_address: 127.0.0.1
    mysql_root_pass: mysecretpass
    mysql_client_port: 3306
    mysql_mysqld_port: 3306
    mysql_database_encoding: utf8
    mysql_database_collation: utf8_general_ci
    
    mysql_app_user: myapp
    mysql_app_pass: mysecretpass
    
    mysql_databases: [
      myapp,
    ]

Dependencies
------------

None.

License
-------

MIT

Author Information
------------------

[MobiDev](http://mobidev.biz/).
