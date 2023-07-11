# PHP İmajını belirle
FROM php:8.0-apache

# Gerekli paketleri yükle
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Composer'ı yükle
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Çalışma dizinini belirle
WORKDIR /var/www/html

# Proje dosyalarını kopyala
COPY . /var/www/html

# Composer bağımlılıklarını yükle
RUN composer install --no-interaction --no-scripts --prefer-dist

# Apache yapılandırmalarını etkinleştir
RUN a2enmod rewrite
