DROP TABLE "schemas";

CREATE TABLE "schemas" (
  "id" SERIAL,
  "name" varchar(255) NOT NULL,
  "foreground" char(7) NOT NULL,
  "background" char(7) NOT NULL,
  "cursor_color" char(7),
  "colors" varchar(255) NOT NULL
);
