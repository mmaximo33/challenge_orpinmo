#!/usr/bin/env bash

PATH_MODULES='app/code'
PATH_VENDOR='Omnipro'
PATH_MODULE='QuickProductPositioning'
PATH_FULL="${PATH_MODULES}/${PATH_VENDOR}/${PATH_MODULE}"
REPOSITORY="https://github.com/integraciones-omnipro/maximo-marucci.git"

if [ -d "${PATH_FULL}" ]; then
    echo "The module is already installed, check the path ${PATH_FULL}"
else
    mkdir -p "${PATH_FULL}"
    git clone "${REPOSITORY}" "${PATH_FULL}"

    echo "The module was successfully installed on the path ${PATH_FULL}"
    echo "Depending on your environment, the way to update your implementation may vary."
    echo "You must run 'magento s:up' and 'magento c:c'"
fi
