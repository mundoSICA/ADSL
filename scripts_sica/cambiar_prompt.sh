#!/bin/bash
#Descripcion: Cambia el prompt del sistema.
#                           _           _
# _ __ ___  _   _ _ __   __| | ___  ___(_) ___ __ _   ___ ___  _ __ ___
#| '_ ` _ \| | | | '_ \ / _` |/ _ \/ __| |/ __/ _` | / __/ _ \| '_ ` _ \
#| | | | | | |_| | | | | (_| | (_) \__ \ | (_| (_| || (_| (_) | | | | | |
#|_| |_| |_|\__,_|_| |_|\__,_|\___/|___/_|\___\__,_(_)___\___/|_| |_| |_|
#
#
#
##########################################################################################
cyan='\e[0;36m'
light='\e[1;36m'
red="\e[0;31m"
yellow="\e[0;33m"
white="\e[0;37m"
NC='\e[0m'

function iniciar_promt() 
{
	#PS1='${debian_chroot:+($debian_chroot)}\[\033[01;32m\]\u@\h\[\033[00m\]:\[\033[01;34m\]\w\[\033[00m\]\$ '
	#export PS1="${yellow}cafeticultores${NC}@master\$ "
	export PS1="${yellow}$USER${NC}@${red}cafeticultores${NC}${light}:${NC}master${light}:${NC}5781a692b${light}\$${NC} "
	echo -e $PS1;
}

iniciar_promt;
