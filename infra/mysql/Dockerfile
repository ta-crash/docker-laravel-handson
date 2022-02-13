FROM mysql/mysql-server:8.0

ENV MYSQL_DATABASE=matching_site \
  MYSQL_USER=root \
  MYSQL_PASSWORD=pass \
  MYSQL_ROOT_PASSWORD=pass \
  TZ=Asia/Tokyo

COPY ./my.cnf /etc/my.cnf
RUN chmod 644 /etc/my.cnf