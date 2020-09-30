echo '['
for f in ~/.local/share/xcolors/*; do
  echo '{'
  echo '"name":"'"$(basename "$f")"'",'
  sed \
    -ne '/^\#define/p' \
    "$f" \
  | sed \
      -e 's/^\S* \(\w\+\)/\1/' \
      -e 's/^c\([0-9]\)/\1/' \
  | awk \
    '{print "\""$1"\":\""$2"\","}'
  echo '},'
done
echo ']'
