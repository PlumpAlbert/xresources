async function getSchemas(count, offset) {
  let uri = "/list.php?count=";
  uri += count > 0 ? count : 10;
  if (offset > 0) uri += "&offset=" + offset;
  return fetch(uri).then(r => r.text());
}
function resolver(html) {
  $("body").append(html);
  fetchOffset = $("body .schema").length;
  isFetching = false;
}

const delta = 500;
const fetchCount = 50;
let fetchOffset = 0;
let isFetching = false;
$(document).ready(() => {
  isFetching = true;
  getSchemas(fetchCount, fetchOffset).then(resolver);
});

$(document).scroll(e => {
  if (isFetching) return;
  const {innerHeight, scrollY} = window;
  const {scrollHeight: totalHeight} = document.body;
  const scrolledHeight = innerHeight + scrollY;
  if (delta > totalHeight - scrolledHeight) {
    isFetching = true;
    getSchemas(fetchCount, fetchOffset).then(resolver);
  }
});
