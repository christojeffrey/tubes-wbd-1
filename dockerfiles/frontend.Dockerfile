FROM php:8.0-apache
WORKDIR /usr/src/

EXPOSE 80
CMD ["php","-S", "0.0.0.0:80"]