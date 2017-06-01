#!/bin/sh

echo starting up...

sudo apt-get update

sudo apt-get install git

echo What is your username?

read input

git config --global user.name $input

echo what is your email?

read input

git config --global user.emal $input

git clone https://github.com/douglashughjackson/SD25Quiz


