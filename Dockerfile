# syntax=docker/dockerfile:1

FROM php:8.4-cli

RUN apt-get update \
    && apt-get install -y --no-install-recommends git unzip libzip-dev libicu-dev libonig-dev zlib1g-dev libpq-dev libsqlite3-dev curl ca-certificates gnupg \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install pdo pdo_pgsql pdo_sqlite intl zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2.9 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

COPY package.json package-lock.json ./
RUN npm install

RUN mkdir -p database storage/framework/{cache,sessions,views} \
    && touch database/database.sqlite \
    && echo "APP_NAME=OMF" > .env \
    && echo "APP_ENV=production" >> .env \
    && echo "APP_DEBUG=false" >> .env \
    && echo "APP_URL=http://localhost" >> .env \
    && echo "LOG_CHANNEL=stack" >> .env \
    && echo "DB_CONNECTION=sqlite" >> .env \
    && echo "DB_DATABASE=/var/www/html/database/database.sqlite" >> .env \
    && echo "SESSION_DRIVER=database" >> .env \
    && echo "QUEUE_CONNECTION=database" >> .env \
    && echo "CACHE_STORE=database" >> .env \
    && echo "MAIL_MAILER=log" >> .env \
    && npm run build \
    && php artisan key:generate \
    && php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 8000

CMD ["sh", "-lc", "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000"]
