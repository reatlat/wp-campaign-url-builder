#!/bin/bash

if ! which wp > /dev/null; then

    # Install WP-Cli
    cd /tmp
    curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
    php wp-cli.phar --info --allow-root
    chmod +x wp-cli.phar
    mv wp-cli.phar /usr/local/bin/wp
    wp --info --allow-root

    # Install DEMO WordPress
    cd /var/www/html
    wp core install --allow-root \
                    --url=localhost \
                    --title="DEMO WordPress"  \
                    --admin_user="admin" \
                    --admin_password="admin" \
                    --admin_email="admin@admin.admin" \
                    --skip-email

    # Import Sample Data
    wp plugin install --allow-root \
                      --activate \
                      wordpress-importer

    curl -O https://raw.githubusercontent.com/manovotny/wptest/master/wptest.xml
    wp import wptest.xml --allow-root \
                         --authors=create

fi
