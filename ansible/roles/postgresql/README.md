PostgreSQL
=========

Install PostgreSQL database.

Requirements
------------

Ubuntu trusty with the package python-pycurl and python-software-properties installed.

Role Variables
--------------

Available variables are listed below, along with default values (see [defaults/main.yml](defaults/main.yml) ):


        pgdb_version: 9.5
        pgdb_sudo_user: postgres
        postgres_pass: ''
        pgdb_users: [
          {
            user: username,
            password: userPassword,
            database: dbName
          }
        ]
        pgdb_databases: [
          dbName
        ]
        pgdb_postgresql_locale: en_US.UTF-8
        pgdb_conf_src_file: postgresql.conf.j2
        ######################################
        # PgTune - Configuration calculator for PostgreSQL http://pgtune.leopard.in.ua/
        pgdb_max_connections: 100
        pgdb_shared_buffers: 128MB
        pgdb_effective_cache_size: 4GB
        pgdb_work_mem: 4MB
        pgdb_maintenance_work_mem: 64MB
        pgdb_min_wal_size: 80MB
        pgdb_max_wal_size: 1GB
        pgdb_checkpoint_completion_target: 0.5
        pgdb_wal_buffers: -1
        pgdb_default_statistics_target: 100
        pgdb_log_min_duration_statement: -1        
        ######################################
        # pg_dump
        pgdb_project_name: projectName
        pgdb_host: 127.0.0.1
        pgdb_port: 5432

Dependencies
------------

None.

License
-------

MIT

Author Information
------------------

[MobiDev](http://mobidev.biz/).
