FROM mariadb:latest
ENV TZ 'Europe/Moscow'
COPY library.cnf /etc/mysql/conf.d/library.cnf
RUN chmod go-w /etc/mysql/conf.d/library.cnf