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

### DEFINITIONS
SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
PLATFORM_DIR="$(dirname $SCRIPT_DIR)"
PACKAGES=("core" "admin" "api" "cms" "social" "vanilla-integration")
OPERATIONS=("mount" "umount")


### FIRST VALIDATION
[ "$#" -ge 2 ] ||
  die "2 argument required, $# provided"


### DEDUCTING INPUT PARAMETERS
OPERATION=$1
MODE=composer
if [ "$2" == npm ] || [ "$2" == composer ]; then
  MODE=$2
  shift
fi
PACKAGE=$2


### VALIDATING INPUT PARAMETERS
[ $(contains "${OPERATIONS[@]}" $OPERATION) == y ] ||
  die "Operation must be one of (${OPERATIONS[@]}), $OPERATION provided"

if [ $MODE == composer ]; then
  [ $(contains "${PACKAGES[@]}" $PACKAGE) == y ] || [ $PACKAGE == ALL ] ||
    die "Package must be one of (${PACKAGES[@]}) or be ALL, $PACKAGE provided"
fi

if [ $MODE == npm ] && [ $PACKAGE == ALL ]; then
  die "Are you sure you work with NPM module named ALL???"
fi


function mount() {
  echo "PACKAGE_DIR: $PACKAGE_DIR"
  echo "MOUNT_DIR: $MOUNT_DIR"

  if [ ! -d "${MOUNT_DIR}" ]; then
    echo -e "The mount dir for \e[91m$PACKAGE\e[0m is not present"
    return
  fi

  # Checking if package was mounted before
  if grep -qs "$MOUNT_DIR" /proc/mounts; then
      echo -e "\e[1mUnmounting previously mounted $MODE package \e[91m$PACKAGE\e[0m"
      sudo umount "$MOUNT_DIR"
  fi

  if [ ! -d "${PACKAGE_DIR}" ]; then
    echo -e "The $MODE project \e[91m$PACKAGE\e[0m is not present"
    return
  fi

  echo -e "\e[1mMounting $MODE package \e[91m$PACKAGE\e[0m"
  sudo mount --bind "$PACKAGE_DIR" "$MOUNT_DIR" && sudo mount -o bind,remount,ro "$MOUNT_DIR"
}

function umount() {
  # Checking if package was mounted before
  if grep -qs "$MOUNT_DIR" /proc/mounts; then
    echo -e "\e[1mUnmounting $MODE package \e[91m$PACKAGE\e[0m"
    sudo umount "$MOUNT_DIR"
  else
    echo -e "The $MODE package \e[91m$PACKAGE\e[0m is not mounted"
  fi
}

function prepare_operation_parameters() {
  if [ $MODE == composer ]; then
    if [ $PACKAGE == "admin" ]; then
      PACKAGE_DIR="$PLATFORM_DIR/../$PACKAGE/public"
      MOUNT_DIR="$PLATFORM_DIR/public/gzero/$PACKAGE"
    else
      PACKAGE_DIR="$PLATFORM_DIR/../$PACKAGE"
      MOUNT_DIR="$PLATFORM_DIR/vendor/gzero/$PACKAGE"
    fi
  else
    PACKAGE_DIR="$PLATFORM_DIR/../node_projects/$PACKAGE"
    MOUNT_DIR="$PLATFORM_DIR/node_modules/$PACKAGE"
  fi
}

if [ $MODE == composer ] && [ $PACKAGE == ALL ]; then
  for PACKAGE in ${PACKAGES[@]}; do
    prepare_operation_parameters
      ${OPERATION}
  done
else
  prepare_operation_parameters
    ${OPERATION}
fi
