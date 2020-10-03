from json import loads

data = loads(open('../schemas.json', 'r').read())
script = open('./insert.sql', 'w')

script.write('INSERT INTO "schemas" ' +
    '(id,name,foreground,background,cursor_color,colors) ' +
    'VALUES\n')
column_order = [
    'name',
    'fg',
    'bg',
    'cursorColor'
]
for schema in data:
    values = ','.join([ f"'{schema[k]}'" if k in schema else "''" for k in column_order ])
    colors = ','.join([ schema[str(i)] for i in range(16) if str(i) in schema ])
    script.write(f"(default, {values}, '{colors}'),\n")

script.close()
