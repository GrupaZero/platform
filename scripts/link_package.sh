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
PACKAGES=("admin" "api" "cms" "social")
OPERATIONS=("mount" "umount")
PACKAGE=$1
OPERATION=$2

[ "$#" -eq 2 ] || die "2 argument required, $# provided"
[ $(contains "${PACKAGES[@]}" $1) == "y" ] || die "Package must be one of (${PACKAGES[@]}), $PACKAGE provided"
[ $(contains "${OPERATIONS[@]}" $2) == "y" ] || die "Operation must be one of (${OPERATIONS[@]}), $OPERATION provided"

if [ $OPERATION == "mount" ]; then
  # Checking if package was mounted before
  if grep -qs "platform/vendor/gzero/$PACKAGE" /proc/mounts; then
      echo -e "\e[1mUnmounting previously mounted package\e[0m"
      sudo umount "$SCRIPT_DIR/../vendor/gzero/$PACKAGE"
      echo -e "\e[1mMounting package \e[91m$PACKAGE\e[0m"
      sudo mount --bind "$SCRIPT_DIR/../../$PACKAGE/" "$SCRIPT_DIR/../vendor/gzero/$PACKAGE/"
      sudo mount -o remount,ro "$SCRIPT_DIR/../vendor/gzero/$PACKAGE/"
      if [ $PACKAGE == "admin" ]; then
          sudo umount "$SCRIPT_DIR/../public/gzero/$PACKAGE"
          sudo mount --bind "$SCRIPT_DIR/../../$PACKAGE/public" "$SCRIPT_DIR/../public/gzero/$PACKAGE/"
          sudo mount -o remount,ro "$SCRIPT_DIR/../public/gzero/$PACKAGE/"
      fi
  else
      echo -e "\e[1mMounting package \e[91m$PACKAGE\e[0m"
      sudo mount --bind "$SCRIPT_DIR/../../$PACKAGE/" "$SCRIPT_DIR/../vendor/gzero/$PACKAGE/"
      sudo mount -o remount,ro "$SCRIPT_DIR/../vendor/gzero/$PACKAGE/"
      if [ $PACKAGE == "admin" ]; then
          sudo mount --bind "$SCRIPT_DIR/../../$PACKAGE/public" "$SCRIPT_DIR/../public/gzero/$PACKAGE/"
          sudo mount -o remount,ro "$SCRIPT_DIR/../public/gzero/$PACKAGE/"
      fi
  fi
fi

if [ $OPERATION == "umount" ]; then
  # Checking if package was mounted before
  if grep -qs "platform/vendor/gzero/$PACKAGE" /proc/mounts; then
    echo -e "\e[1mUnmounting package \e[91m$PACKAGE\e[0m"
    sudo umount "$SCRIPT_DIR/../vendor/gzero/$PACKAGE"
    if [ $PACKAGE == "admin" ]; then
        sudo umount "$SCRIPT_DIR/../public/gzero/$PACKAGE"
    fi
  else
      echo -e "\e[1mPackage was not mounted \e[91m$PACKAGE\e[0m"
  fi
fi
