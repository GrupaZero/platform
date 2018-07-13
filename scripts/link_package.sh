#!/usr/bin/env bash

function die () {
    echo >&2 "$@"
    exit 1
}

function contains() {
    local n=$#
    local value=${!n}
    for ((i=1;i < $#;i++)) {
        if [ "${!i}" == "${value}" ]; then
            echo "y"
            return 0
        fi
    }
    echo "n"
    return 1
}

SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
PLATFORM_DIR="$(dirname $SCRIPT_DIR)"
PACKAGES=("core" "admin" "api" "cms" "social" "vanilla-integration")
OPERATIONS=("mount" "umount")
OPERATION=$1
PACKAGE=$2

[ "$#" -ge 2 ] ||
  die "2 argument required, $# provided"
[ $(contains "${OPERATIONS[@]}" $OPERATION) == "y" ] ||
  die "Operation must be one of (${OPERATIONS[@]}), $OPERATION provided"
[ $(contains "${PACKAGES[@]}" $PACKAGE) == "y" ] || [ $PACKAGE == "ALL" ] ||
  die "Package must be one of (${PACKAGES[@]}) or be ALL, $PACKAGE provided"


function do_operation() {
  OPERATION=$1
  PACKAGE=$2

  if [ $PACKAGE == "admin" ]; then
    PACKAGE_DIR="$PLATFORM_DIR/../$PACKAGE/public"
    MOUNT_DIR="$PLATFORM_DIR/public/gzero/$PACKAGE"
  else
    PACKAGE_DIR="$PLATFORM_DIR/../$PACKAGE"
    MOUNT_DIR="$PLATFORM_DIR/vendor/gzero/$PACKAGE"
  fi

  ${OPERATION} $PACKAGE
}

function mount() {
  PACKAGE=$1

  if [ ! -d "${MOUNT_DIR}" ]; then
    echo -e "The mount dir for \e[91m$PACKAGE\e[0m is not present"
    return
  fi

  # Checking if package was mounted before
  if grep -qs "$MOUNT_DIR" /proc/mounts; then
      echo -e "\e[1mUnmounting previously mounted package \e[91m$PACKAGE\e[0m"
      sudo umount "$MOUNT_DIR"
  fi

  if [ ! -d "${PACKAGE_DIR}" ]; then
    echo -e "The project \e[91m$PACKAGE\e[0m is not present"
    return
  fi

  echo -e "\e[1mMounting package \e[91m$PACKAGE\e[0m"
  sudo mount --bind "$PACKAGE_DIR" "$MOUNT_DIR" && sudo mount -o bind,remount,ro "$MOUNT_DIR"
}

function umount() {
  PACKAGE=$1

  # Checking if package was mounted before
  if grep -qs "$MOUNT_DIR" /proc/mounts; then
    echo -e "\e[1mUnmounting package \e[91m$PACKAGE\e[0m"
    sudo umount "$MOUNT_DIR"
  else
    echo -e "The package \e[91m$PACKAGE\e[0m is not mounted"
  fi
}

if [ $PACKAGE == "ALL" ]; then
  for package in ${PACKAGES[@]}; do
    do_operation $OPERATION $package
  done
else
  do_operation $OPERATION $PACKAGE
fi
