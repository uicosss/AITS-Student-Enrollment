FROM php:7.2.16-fpm

RUN apt-get update && apt-get install -y --no-install-recommends \
    libmcrypt-dev \
    mysql-client \
    libmagickwand-dev \
    less \
    zlib1g-dev \
    libzip-dev \
    libldap2-dev \
    && rm -rf /var/lib/apt/lists/* \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install pdo_mysql \
    && pecl install mcrypt-1.0.1 \
    && docker-php-ext-enable mcrypt \
    && docker-php-ext-install zip \
    && docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ \
    && docker-php-ext-install ldap

# Oracle Support
RUN apt-get update && apt-get -y install wget bsdtar libaio1 \
    && wget -qO- https://raw.githubusercontent.com/caffeinalab/php-fpm-oci8/master/oracle/instantclient-basic-linux.x64-12.2.0.1.0.zip | bsdtar -xvf- -C /usr/local \
    && wget -qO- https://raw.githubusercontent.com/caffeinalab/php-fpm-oci8/master/oracle/instantclient-sdk-linux.x64-12.2.0.1.0.zip | bsdtar -xvf-  -C /usr/local \
    && wget -qO- https://raw.githubusercontent.com/caffeinalab/php-fpm-oci8/master/oracle/instantclient-sqlplus-linux.x64-12.2.0.1.0.zip | bsdtar -xvf- -C /usr/local \
    && ln -s /usr/local/instantclient_12_2 /usr/local/instantclient \
    && ln -s /usr/local/instantclient/libclntsh.so.* /usr/local/instantclient/libclntsh.so \
    && ln -s /usr/local/instantclient/lib* /usr/lib \
    && ln -s /usr/local/instantclient/sqlplus /usr/bin/sqlplus \
    && docker-php-ext-configure oci8 --with-oci8=instantclient,/usr/local/instantclient \
    && docker-php-ext-install oci8 \
    && rm -rf /var/lib/apt/lists/* \
    && php -v

RUN wget http://php.net/distributions/php-7.2.16.tar.gz \
    && mkdir php_oci \
    && mv php-7.2.16.tar.gz ./php_oci

WORKDIR php_oci

RUN tar xfvz php-7.2.16.tar.gz

WORKDIR php-7.2.16/ext/pdo_oci

RUN phpize \
    && ./configure --with-pdo-oci=instantclient,/usr/local/instantclient,12.1 \
    && make \
    && make install \
    && echo extension=pdo_oci.so > /usr/local/etc/php/conf.d/pdo_oci.ini \
    && php -v

ENV TIMEZONE=America/Chicago
ENV TZ=America/Chicago

# Set timezone for PHP
RUN touch /usr/local/etc/php/conf.d/dates.ini \
    && echo "date.timezone = $TZ;" >> /usr/local/etc/php/conf.d/dates.ini

# Redirect PHP Errors
RUN echo "log_errors = On" >> /usr/local/etc/php/conf.d/php.ini \
    && echo "error_log = /proc/self/fd/2" >> /usr/local/etc/php/conf.d/php.ini

# Set timezone for the container
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone