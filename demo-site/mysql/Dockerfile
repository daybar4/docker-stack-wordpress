FROM mysql:5.7-debian
ENV TZ="Europe/Brussels"

COPY conf/conf.d /etc/mysql/conf.d

RUN apt-get update --allow-unauthenticated && apt-get install -y --allow-unauthenticated  libmysqlclient20