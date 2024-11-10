#!/bin/bash
INFOFILE="pgrobottag.xml"
PKGNAME=plg_system_robottag

# get current version
VERSION=`grep "<version>" $INFOFILE | sed 's|.*<version>\([0-9\.]*\)</version>.*|\1|'`

TARBALL="${PKGNAME}-${VERSION}.tar.gz"

# remove previous package
if [ -f $TARBALL ]; then
    rm $TARBALL
fi

tar -c -z -f $TARBALL --exclude-vcs \
    language \
    services \
    src \
    pgrobottag.xml
