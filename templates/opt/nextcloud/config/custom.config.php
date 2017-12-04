<?php
$CONFIG = array (
    'trusted_domains' =>
        array (
            'localhost',
            '{{ nextcloud_domain }}',
        ),
    'overwrite.cli.url' => 'https://{{ nextcloud_domain }}',
    'overwritehost' => '{{ nextcloud_domain }}',
    'overwriteprotocol' => 'https',
    'memcache.local' => '\OC\Memcache\APCu',
    'logtimezone' => 'UTC',
    'mail_from_address' => 'noreply',
    'mail_smtpmode' => 'php',
    'mail_domain' => '{{ nextcloud_email_domain }}',
    'mail_smtphost' => '192.168.0.1',
    'mail_smtpport' => '25',
    'mail_smtpauthtype' => 'PLAIN',
    'default_language' => 'en',
    'defaultapp' => '{{ nextcloud_default_app }}',
    'trashbin_retention_obligation' => 'auto',
    'auth.bruteforce.protection.enabled' => {{ nextcloud_bruteforce_protection }},
);
