CMD="psql -d xresources -U plump -f";

for FILE in /docker-entrypoint-initdb.d/*.sql; do
  $CMD "$FILE";
done
