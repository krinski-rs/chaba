#!/bin/bash
#--- Ordem de Subida de arquivos: --------------------------------------------------------
# 1 - Entity
# 2 - Proxy Legado
# 3 - YML
# 4 - Repository
# 5 - Controladores e demais arquivos
#
#--- Regerar proxies ---------------------------------------------------------------------
# Arquivo vogel/app/config/config.yml
# 1. Passar auto generate proxy para true;
# 2. Acessar a aplicação(http://sistech.vogeltelecom.com/vogel/web/ba/fila ) uma vez;
# 3. Passar auto generate proxy para false.
#
#--- ROTINAS -----------------------------------------------------------------------------
DATE=`date +'%Y-%m-%d %H:%M:%S'`

################################################################################

#yum update
#yum install wget
#yum install mlocate
#yum install epel-release
#yum install htop

#yum install -y httpd php php-xml php-pgsql php-mysql php-mssql php-pear php-process php-mbstring php-gd  vim

#hostname troubleticket
#yum install -y rsync

#Selinx
#vi /etc/selinux/config
#SELINUX=disabled

#setenforce 0
#yum install ntpdate
#ntpdate -u 189.45.34.7

cd /var/www/html
app/console assets:install
chmod 777 -R /var/www/html/app/cache /var/www/html/app/logs

################################################################################

FILE=/var/www/html/.dados
SRT="LAST_START:     ${DATE}"
if grep -wiq 'LAST_START:' ${FILE}; then
	sed -i "s/^LAST_START:.*/${SRT}/g" ${FILE}
else
	echo "${SRT}" >> ${FILE}
fi

