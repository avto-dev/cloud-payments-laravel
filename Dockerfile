FROM composer:1.8.6 AS composer

FROM php:7.1.3-alpine

LABEL \
    org.label-schema.schema-version="1.0" \
    org.label-schema.name="cloud-payments-laravel" \
    org.label-schema.vendor="avto-dev"

ENV \
    COMPOSER_ALLOW_SUPERUSER="1" \
    COMPOSER_HOME="/tmp/composer"

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN set -xe \
    && apk add --no-cache binutils git curl \
    && apk add --no-cache --virtual .build-deps autoconf pkgconf make g++ gcc \
    # install xdebug (for testing with code coverage), but not enable it
    && pecl install xdebug-2.7.2 \
    && apk del .build-deps \
    && mkdir /src ${COMPOSER_HOME} \
    && composer global require 'hirak/prestissimo' --no-interaction --no-suggest --prefer-dist \
    && ln -s /usr/bin/composer /usr/bin/c \
    && chmod -R 777 ${COMPOSER_HOME} \
    && composer --version \
    && php -v \
    && php -m

WORKDIR /src

