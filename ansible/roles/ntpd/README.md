Ntpd (Network Time Protocol daemon)
=========

Install ntpd. The Network Time Protocol daemon (ntpd) is an operating system program that maintains the system time in synchronization with time servers using the Network Time Protocol (NTP).

Requirements
------------

Ubuntu trusty with the package python-pycurl and python-software-properties installed.

Role Variables
--------------

Available variables are listed below, along with default values (see [defaults/main.yml](defaults/main.yml) ):

    ntpd_template_src_file: ntp.conf.j2 # Path of a Jinja2 formatted template on the local server. This can be a relative or absolute path.
    ntp_server0: 0.pool.ntp.org
    ntp_server1: 1.pool.ntp.org
    ntp_server2: 2.pool.ntp.org
    ntp_server3: 3.pool.ntp.org

Dependencies
------------

None.

License
-------

MIT

Author Information
------------------

[MobiDev](http://mobidev.biz/).