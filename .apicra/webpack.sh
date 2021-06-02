#!/bin/bash
#rm -rf yarn.lock
rm -rf package-lock.json
rm -rf node_modules
yarn install --frozen-lockfile