FROM php:7.4.25-fpm-buster

# General - imagick, mysql, mcrypt, ldap, curl, gnupg, etc.
RUN apt-get update && apt-get install --no-install-recommends -y \
    less \
    curl \
    gnupg \
    gnupg2 \
    gnupg1 \
    zlib1g-dev \
    libmcrypt-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libzip-dev \
    libonig-dev \
    zip \
    unzip \
    mariadb-client \
    libmagickwand-dev \
    ghostscript --no-install-recommends \
    imagemagick \
    libldap2-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install ldap \
    && docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql \
    && pecl install mcrypt-1.0.4 \
    && docker-php-ext-enable mcrypt \
    && docker-php-ext-install zip \
    && docker-php-ext-install intl \
    && docker-php-ext-install soap

ARG WITH_XDEBUG=false
ARG XDEBUG_TRIGGER_PROFILER=false
ARG XDEBUG_PROFILER_DIR=/var/xdebug

RUN if [ ${WITH_XDEBUG} = "true" ] ; then \
        pecl install xdebug-3.0.3; \
        docker-php-ext-enable xdebug; \
        echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        if [ ${XDEBUG_TRIGGER_PROFILER} = "true" ] ; then \
            echo xdebug.mode=profile >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
            echo xdebug.start_with_request=trigger >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
            echo xdebug.output_dir=${XDEBUG_PROFILER_DIR} >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        fi ; \
    fi ;

# Node.js
RUN apt-get update \
    && curl -sL https://deb.nodesource.com/setup_17.x | bash - \
    && apt-get update && apt-get install -y \
    nodejs

ENV ACCEPT_EULA=Y

# Microsoft SQL Server Prerequisites
RUN apt-get update \
    && curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
    && curl https://packages.microsoft.com/config/debian/9/prod.list \
        > /etc/apt/sources.list.d/mssql-release.list \
    && apt-get install -y --no-install-recommends \
        locales \
        apt-transport-https \
    && echo "en_US.UTF-8 UTF-8" > /etc/locale.gen \
    && locale-gen \
    && apt-get update \
    && apt-get -y --no-install-recommends install \
        unixodbc-dev \
        msodbcsql17

 # MS SQL Server
 RUN docker-php-ext-install mbstring pdo  \
     && pecl install sqlsrv-5.8.1 pdo_sqlsrv-5.8.1 \
     && docker-php-ext-enable sqlsrv pdo_sqlsrv

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

RUN wget http://php.net/distributions/php-7.4.25.tar.gz \
    && mkdir php_oci \
    && mv php-7.4.25.tar.gz ./php_oci

WORKDIR php_oci
RUN tar xfvz php-7.4.25.tar.gz
WORKDIR php-7.4.25/ext/pdo_oci
RUN phpize \
    && ./configure --with-pdo-oci=instantclient,/usr/local/instantclient,12.1 \
    && make \
    && make install \
    && echo extension=pdo_oci.so > /usr/local/etc/php/conf.d/pdo_oci.ini \
    && php -v

ENV TIMEZONE=America/Chicago
ENV TZ=America/Chicago

# PHP Timezone
RUN touch /usr/local/etc/php/conf.d/dates.ini \
    && echo "date.timezone = $TZ;" >> /usr/local/etc/php/conf.d/dates.ini

# PHP memory limit
RUN touch /usr/local/etc/php/conf.d/docker-php-memlimit.ini \
    && echo "memory_limit = 2G" >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini

# Redirect PHP Errors
RUN echo "log_errors = On" >> /usr/local/etc/php/conf.d/php.ini \
    && echo "error_log = /proc/self/fd/2" >> /usr/local/etc/php/conf.d/php.ini

# App container Timezone
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Comtainerized composer
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
RUN apt-get update && apt-get install -y

# Container file/dir permissions
RUN chown -R www-data:www-data /var/www
RUN chmod 777 -R /tmp && chmod o+t -R /tmp