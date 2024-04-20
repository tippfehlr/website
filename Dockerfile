FROM php:alpine

WORKDIR /var/www/html

# Use the default production configuration
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY . .

EXPOSE 8000

CMD ["php", "-S", "0.0.0.0:8000"]
