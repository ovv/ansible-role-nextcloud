ovv.nextcloud
=============

[![Build Status](https://travis-ci.org/ovv/ansible-role-nextcloud.svg?branch=master)](https://travis-ci.org/ovv/ansible-role-nextcloud)

Ansible role to install and configure [nextcloud](https://github.com/danielquinn/nextcloud).

Requirements
------------

A php7, Nginx and PostgreSQL installation are required. We recommend using [ovv.php7](https://github.com/ovv/ansible-role-php7),
[pyslackers.nginx](https://github.com/pyslackers/ansible-role-nginx) and [pyslackers.postgres](https://github.com/pyslackers/ansible-role-postgres).

Installation
------------

To install this roles clone it into your roles directory.

```bash
$ git clone https://github.com/ovv/ansible-role-nextcloud.git ovv.nextcloud
```

If your playbook already reside inside a git repository you can clone it by using git submodules.

```bash
$ git submodule add -b master https://github.com/ovv/ansible-role-nextcloud.git ovv.nextcloud
```

Role Variables
--------------

* `nextcloud_user`: Admin username.
* `nextcloud_password`: Admin password.
* `nextcloud_user_email`: Email address if admin user.

* `nextcloud_version`: Version of Nextcloud to install (default to `12.0.3`).
* `nextcloud_do_update`: Upgrade the nextcloud instance if necessary (default to `False`).
* `nextcloud_db_user`: Nextcloud database user
* `nextcloud_db_password`: Nextcloud daatabase password.
* `nextcloud_domain`: Dedicated domain name for nextcloud.
* `nextcloud_email_domain`: Domain name used by nextcloud emails (default to `nextcloud_domain`).
* `nextcloud_bruteforce_protection`. Enable brute force protection (default to `True`).

* `nextcloud_apps`: List of nextcloud apps to enabled (default to `[]`).
* `nextcloud_default_app`: Default landing app (default to 'files`).
* `nextcloud_files_external_configs`: Dict of configuration for external files services.
    * `mount`: Mount path in nextcloud.
    * `storage`: Type of storage.
    * `configuration`: external service option. Depend on the `storage` type.
    * `users`: List of users granted access.
    * `groups`: List of groups granted access.

Example Playbook
----------------

```yaml
- hosts: localhost
  roles:
    - pyslackers.postgres
    - ovv.php7
    - pyslackers.nginx
    - ovv.nextcloud
  vars:
    nextcloud_user: admin
    nextcloud_password: password
    nextcloud_user_email: admin@example.com

    nextcloud_db_user: nextcloud
    nextcloud_db_password: dbpassword
    nextcloud_domain: nextcloud.example.com
    nextcloud_email_domain: example.com

    nextcloud_apps:
      - files_external

    nextcloud_files_external_configs:
      example:
        mount: Example
        storage: SFTP
        configuration:
          host: 127.0.0.1
          password: password
          root: /tmp
          user: nextcloud

    # ovv.php7
    custom_php_packages:
      - php7.0-gd
      - php7.0-json
      - php7.0-intl
      - php7.0-imagick
      - php7.0-apcu
      - php7.0-xml
      - php7.0-zip
      - php7.0-pgsql

    php_pools:
      nextcloud:
        socket: /var/run/php7.0-fpm-nextcloud.sock
        user: nextcloud
        createhome: yes
        home: /home/nextcloud
        working_dir: /opt/nextcloud
        request_terminate_timeout: 3600

    # pyslackers.postgres
    postgres_users:
      nextcloud:
        password: dbpassword

    # pyslackers.nginx
    nginx_sites:
      nextcloud:
        template: roles/ovv.nextcloud/templates/etc/nginx/sites-available/nextcloud.j2
        php_socket: /var/run/php7.0-fpm-nextcloud.sock
```

License
-------

MIT
