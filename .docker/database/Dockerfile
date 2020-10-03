FROM  "postgres:12-alpine"
ENV   POSTGRES_PASSWORD='matthew'
ENV   POSTGRES_USER='plump'
ENV   POSTGRES_DB='xresources'
ENV   PGDATA='/var/lib/postgres/data'
COPY  *.sql /docker-entrypoint-initdb.d/
