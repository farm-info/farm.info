#!/bin/bash

mysql -u root -p farm_info < farm_info.sql
.mysql/run-mysqld.sh &
.apache2/run-apache2.sh &

wait
