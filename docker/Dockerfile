FROM composer:2.1.12 as build
WORKDIR /app

COPY ../composer.json .
COPY ../composer.lock .

RUN composer install --no-dev --ignore-platform-reqs --prefer-dist --no-scripts

COPY . .

RUN composer dumpautoload --no-scripts

FROM php:8.0.13-cli-alpine3.14
WORKDIR /app

COPY ./docker/entrypoint.sh /app/entrypoint.sh
COPY ./config/parameters.yml.docker /app/config/parameters.yml

COPY --from=build /app /app

ENTRYPOINT [ "/app/entrypoint.sh" ]
CMD [ "list" ]
