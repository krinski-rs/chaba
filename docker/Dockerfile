FROM centos:6

RUN yum install -y epel-release

RUN yum update -y
RUN yum install -y \
                wget mlocate epel-release \
                httpd php php-xml php-pgsql php-mysql php-mssql php-pear php-process php-mbstring php-gd \
                vim htop rsync ntpdate


#RUN mkdir -p /etc/httpd/conf.d
COPY httpd/httpd.conf /etc/httpd/conf/httpd.conf
COPY httpd/conf.d /etc/httpd/conf.d
RUN rm -f /etc/httpd/conf.d/welcome.conf

#hostname troubleticket

#Selinx
#vi /etc/selinux/config
#SELINUX=disabled

#RUN setenforce 0
#RUN ntpdate -u 189.45.34.7

# RUN rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-6.noarch.rpm

#RUN yum install -y php php-xml
#RUN yum install -y php-pgsql php-mysql php-mssql

RUN yum install -y httpd
#RUN yum install -y php-pear
#RUN yum install -y libXrender
#RUN yum install -y libXext
#RUN yum install -y urw-fonts
#RUN yum install -y fontconfig
#RUN yum install -y php-process
#RUN yum install -y vim
#RUN yum install -y php-ldap php-intl php-devel php-pear
#RUN yum install libaio -y
#RUN yum install wget -y
#RUN yum install tar -y
#RUN yum install gcc -y


#RUN yum install -y php-mbstring
#RUN yum install -y phpunit
#RUN yum install -y php-gd

#RUN yum install -y git
#RUN yum install -y epel-release

#RUN yum install -y npm

#RUN yum install -y phpunit

################################################################################

RUN yum install -y supervisor
COPY ./supervisord.conf /etc/supervisord.conf

COPY ./start-container.sh /opt/bin/start-container.sh

#RUN mkdir -p /opt/rpm/
#COPY ./rpm/unoconv-0.5-1.el6.rf.noarch.rpm /opt/rpm/unoconv-0.5-1.el6.rf.noarch.rpm
#RUN yum -y install openoffice.org-headless openoffice.org-writer openoffice.org-calc openoffice.org-impress openoffice.org-pyuno
#RUN cd /opt/rpm/ && yum -y install unoconv-0.5-1.el6.rf.noarch.rpm

################################################################################

#RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
#RUN php -r "if (hash_file('SHA384', 'composer-setup.php') === 'e115a8dc7871f15d853148a7fbac7da27d6c0030b848d9b3dc09e2a0388afed865e6a3d6b3c0fad45c48e2b5fc1196ae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
#RUN php composer-setup.php --install-dir=/usr/bin
#RUN php -r "unlink('composer-setup.php');"

#RUN mkdir /php-packages
#RUN chmod 777 /php-packages
#RUN COMPOSER_HOME=/php-packages composer.phar global require symfony/console:2.0.6
#RUN COMPOSER_HOME=/php-packages composer.phar global require symfony/yaml:2.0.6
#RUN COMPOSER_HOME=/php-packages composer.phar global require doctrine/common:2.2.2
#RUN COMPOSER_HOME=/php-packages composer.phar global require doctrine/dbal:2.2.2
#RUN COMPOSER_HOME=/php-packages composer.phar global require doctrine/orm:2.2.2

#RUN mkdir -p /php-packages/vendor/doctrine/common/lib/Doctrine/Symfony/Component
#RUN ln -s /php-packages/vendor/symfony/yaml/Symfony/Component/Yaml /php-packages/vendor/doctrine/common/lib/Doctrine/Symfony/Component/Yaml
#RUN ln -s /php-packages/vendor/symfony/console/Symfony/Component/Console /php-packages/vendor/doctrine/common/lib/Doctrine/Symfony/Component/Console

#RUN pear install OLE-1.0.0RC1
#RUN pear install Spreadsheet_Excel_Writer-0.9.3

#RUN echo 'short_open_tag = "on"' >> /etc/php.ini

#RUN echo 'include_path = ".:/php/includes:/php-packages/vendor/doctrine/common/lib/:/php-packages/vendor/doctrine/dbal/lib/:/php-packages/vendor/doctrine/orm/lib/:/php-packages/vendor/symfony/console:/php-packages/vendor/symfony/yaml:/usr/share/pear"' >> /etc/php.ini


#EXPOSE 80
#EXPOSE 2050



#RUN /etc/init.d/httpd stop

#RUN yum update -y

#COPY oracle-instantclient12.1-basic-12.1.0.2.0-1.x86_64.rpm .
#RUN rpm -Uvh oracle-instantclient12.1-basic-12.1.0.2.0-1.x86_64.rpm

#COPY oracle-instantclient12.1-devel-12.1.0.2.0-1.x86_64.rpm .
#RUN rpm -Uvh oracle-instantclient12.1-devel-12.1.0.2.0-1.x86_64.rpm

#RUN wget http://pecl.php.net/get/oci8-1.4.10.tgz
#RUN tar zxvf oci8-1.4.10.tgz
#RUN cd oci8-1.4.10 && phpize && ./configure -with-oci8=shared,instantclient,/usr/lib/oracle/12.1/client64/lib/ && make install
#RUN echo extension=oci8.so > /etc/php.d/oci8.ini



RUN echo 'date.timezone = America/Sao_Paulo' >> /etc/php.ini
RUN echo 'zend.multibyte = On' >> /etc/php.ini
#RUN echo 'extension=oci8.so' >> /etc/php.ini

RUN rm -f /etc/localtime;
RUN ln -s /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime;

#RUN mkdir -p /mnt/dados
#RUN chmod 777 /mnt/dados

#RUN mkdir -p /tmp/oc
#RUN chmod 777 /tmp/oc
#RUN pear channel-discover pear.symfony.com

WORKDIR /var/www/html/
#CMD ["httpd","-DFOREGROUND"]
ENTRYPOINT ["/usr/bin/supervisord"]
