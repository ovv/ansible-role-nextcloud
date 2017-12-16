#!/bin/bash
# Sets permissions of the Nextcloud instance for updating

ncpath='/opt/nextcloud'
htuser='nextcloud'
htgroup='nextcloud'

chown -R ${htuser}:${htgroup} ${ncpath}