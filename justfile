alias r := run

run:
  podman run -it --rm -v ./:/var/www/html -p 8000:8000 docker.io/php:alpine php -t /var/www/html -S 0.0.0.0:8000
