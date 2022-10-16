FROM mariadb:latest
ADD initialschema.sql /docker-entrypoint-initdb.d/
EXPOSE 3306
CMD ["mysqld"]