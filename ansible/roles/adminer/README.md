Adminer
=========

Adminer (formerly phpMinAdmin) is a full-featured database management tool written in PHP. Conversely to phpMyAdmin, it consist of a single file ready to deploy to the target server. Adminer is available for MySQL, PostgreSQL, SQLite, MS SQL, Oracle, Firebird, SimpleDB, Elasticsearch and MongoDB.

Official site: <https://www.adminer.org/>

Requirements
------------

Ubuntu trusty.

Role Variables
--------------

    adminer_ver: 4.2.5
    adminer_path: '/usr/share/adminer'
    adminer_clean_directory: false
    adminer_css_theme_url: '' # Alternative designs.
    # For example: https://raw.githubusercontent.com/arcs-/Adminer-Material-Theme/master/adminer.css
    # For more details: https://www.adminer.org/#extras

Dependencies
------------

- [PHP5](https://gitlab.mobidev.biz/ansible/php5-ubuntu)     
or
- [PHP7](https://gitlab.mobidev.biz/ansible/php7-ubuntu) 


- [Nginx](https://gitlab.mobidev.biz/ansible/nginx)     
or
- [Apache2](https://gitlab.mobidev.biz/ansible/apache2) 


- [PostgreSQL](https://gitlab.mobidev.biz/ansible/pgsql)        
or
- [MySQL](https://gitlab.mobidev.biz/ansible/mysql)         
or
- [MariaDB](https://gitlab.mobidev.biz/ansible/mariadb-10-1)    
or
- [MongoDB](https://gitlab.mobidev.biz/ansible/mongodb)     
or
- [Elasticsearch](https://gitlab.mobidev.biz/ansible/elastic-search)

License
-------

MIT

Author Information
------------------

[MobiDev](http://mobidev.biz/).
