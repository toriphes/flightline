#!/bin/bash

set -e

mysql_ready="nc -z $DB_HOST 3306"

if ! $mysql_ready; then
  printf 'Waiting for MySQL.'
  while ! $mysql_ready; do
    printf '.'
    sleep 1
  done
  echo
fi