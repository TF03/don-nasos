Initial
=========

Install required packages.

Requirements
------------

Ubuntu trusty with the package python-pycurl and python-software-properties installed.

Role Variables
--------------

Available variables are listed below, along with default values (see [defaults/main.yml](defaults/main.yml) ):

    hostname: project-name.local
    packages: [
      git-core,
      curl,
      wget,
      htop,
      python-psycopg2,
      libpq-dev,
      unzip,
      zip,
      expect-dev,
      mc
    ]
    
Replace "project-name.local" with your project name.

Dependencies
------------

None.

License
-------

MIT

Author Information
------------------

[MobiDev](http://mobidev.biz/).