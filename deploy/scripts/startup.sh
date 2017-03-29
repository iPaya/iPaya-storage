#!/usr/bin/env bash

# Start script

#== Bash helpers ==
function info {
  echo " "
  echo "--> $1"
  echo " "
}

info "Run migrations"
console migrate/up --interactive=0
info "Done!"

info "Run Apache"
apache2-foreground
