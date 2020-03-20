#! /bin/sh

# Script to install Chezmoi and apply the configuration according Chezmoi's source directory
curl -sfL https://git.io/chezmoi | sudo sh -s -- -b /usr/local/bin
chezmoi apply
