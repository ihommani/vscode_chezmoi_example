FROM php:7.2.30-alpine

WORKDIR /root

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php --install-dir=/bin --filename=composer --version=1.10.5 && \
    php -r "unlink('composer-setup.php');" && \
    composer global require robmorgan/phinx:0.11.4 && \
    composer global require fzaninotto/faker:1.9.0 && \
    ln -s /root/.composer/vendor/bin/phinx /bin/phinx && \
    docker-php-ext-install pdo pdo_mysql

ENTRYPOINT [ "phinx" ]
CMD [ "-h" ]
