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
    'mail_smtpmode' => 'smtp',
    'mail_smtphost' => '{{ nextcloud_mail.address }}',
    'mail_smtpport' => '{{ nextcloud_mail.port }}',
    'mail_smtpsecure' => '{{ nextcloud_mail.secure }}',
    "mail_smtpauth"     => true,
    "mail_smtpauthtype" => "LOGIN",
    "mail_smtpname"     => "{{ nextcloud_mail.name }}",
    "mail_smtppassword" => "{{ nextcloud_mail.pass }}",
    'mail_domain' => '{{ nextcloud_mail.domain }}',
    'default_language' => 'en',
    'defaultapp' => '{{ nextcloud_default_app }}',
    'trashbin_retention_obligation' => 'auto',
    'auth.bruteforce.protection.enabled' => {{ nextcloud_bruteforce_protection }},
);
