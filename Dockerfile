FROM ubuntu:18.04

RUN apt-get update && DEBIAN_FRONTEND="noninteractive" apt-get install -y nginx mysql-server php7.2-fpm php-mysql 

COPY ./index.html /var/www/html/index.html
COPY ./index.php /var/www/html/index.php
COPY ./example /etc/nginx/sites-available/example
COPY ./php.ini /etc/php/7.2/fpm/php.ini
COPY ./bash.bashrc /etc/bash.bashrc

RUN ln -s /etc/nginx/sites-available/example /etc/nginx/sites-enabled/example
RUN rm /etc/nginx/sites-enabled/default

CMD service nginx reload
CMD ["/usr/sbin/nginx", "-g", "daemon off;"]
WORKDIR /etc/nginx/sites-available/

EXPOSE 80


