FROM tangramor/nginx-php8-fpm
WORKDIR /var/www/html
COPY . .
RUN chmod -R 777 .
COPY nginx.conf /etc/nginx/conf.d/default.conf
