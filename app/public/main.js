async function getSchemas(count, offset) {
  let uri = "/src/list.php?count=";
  uri += count > 0 ? count : 10;
  if (offset > 0) uri += "&offset=" + offset;
  return fetch(uri).then(res => res.json());
}

$(document).ready(() => {
  getSchemas(10).then(schemas => {
    const elements = schemas.map(schema => {
      const schemaElem = document.createElement("div");
      schemaElem.className = "schema";
      schemaElem.style = "background:" + schema.background;
      for (let i = 0; i < schema.colors.length; i++) {
        const colorElem = document.createElement("p");
        colorElem.className = "schema__color";
        colorElem.style = "background:" + schema.colors[i];

        $(schemaElem).append(colorElem);
      }
      return schemaElem;
    });
    $("body").append(...elements);
  });
});
