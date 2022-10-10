FROM debian:10-slim

# Noninteractive while build
ARG DEBIAN_FRONTEND=noninteractive

# Update timezone
ENV TIMEZONE Europe/Brussels

# Configure service timezone
RUN ln -snf /usr/share/zoneinfo/$TIMEZONE /etc/localtime && \
    echo $TIMEZONE > /etc/timezone

# Add APT repository to install PHP version 7.4
RUN apt update && apt -y install wget lsb-release apt-transport-https ca-certificates 
RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php.list

RUN apt update && apt install -y \
      apache2 apache2-utils apache2-bin \
      php7.4 libapache2-mod-php7.4 php7.4-common \
	  php7.4-mysql php7.4-curl php7.4-gd php7.4-mbstring \
	  php7.4-xml php7.4-xmlrpc php7.4-soap php7.4-intl php7.4-zip

# Enable Apache2 modules
RUN a2enmod rewrite expires headers

# Update the default apache site with the config we created.
ADD etc/apache2/conf-available/security.conf /etc/apache2/conf-available/security.conf 
ADD etc/apache2/mods-available/mpm_prefork.conf /etc/apache2/mods-available/mpm_prefork.conf 
ADD etc/apache2/mods-available/status.conf /etc/apache2/mods-available/status.conf 
ADD etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/000-default.conf

# Add PHP custom config
#ADD etc/php7/conf.d/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
#ADD etc/php7/apache2/php.ini /etc/php/7.4/apache2/php.ini

# Verify that the PHP OPcache mod is enabled
RUN phpenmod opcache

# Copy this repo into place.
ADD src /var/www/html

# WordPress direct FS_METHOD requires wp-content permissions set to www-data
RUN chown www-data:www-data /var/www/html/wp-content

# Permissions already set by user in persistent volume folders
#RUN chown -R www-data:www-data /var/www/html/wp-content/cache
#RUN chown -R www-data:www-data /var/www/html/wp-content/plugins
#RUN chown -R www-data:www-data /var/www/html/wp-content/uploads

# Create status file for check
RUN touch /var/www/html/status.html

# By default start up apache in the foreground, override with /bin/bash for interative.
ADD bin/startup.sh /startup.sh
RUN chmod +x /startup.sh
ENTRYPOINT /startup.sh
