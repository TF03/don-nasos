#!/usr/bin/env bash

CURR_VERSION=`psql -V | egrep -o '[0-9]{1,}\.[0-9]{1,}' | head -1`
if (( $(echo "$CURR_VERSION > 10" |bc -l) )) ; then
    CURR_VERSION=`echo ${CURR_VERSION} | awk '{print int($1)}'`
fi
echo ${CURR_VERSION};