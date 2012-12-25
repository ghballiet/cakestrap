-- create table if not exists users (
--   id varchar(36) primary key,
--   first_name tinytext,
--   last_name tinytext,
--   username tinytext,
--   email tinytext,
--   password tinytext,
--   admin boolean default false,
--   verified boolean default false,
--   modified datetime
-- );

-- create table if not exists recipes (
--   id varchar(36) primary key,
--   name tinytext,
--   description longtext,
--   user_id varchar(36),
--   public boolean default false,
--   modified datetime
-- );

-- create table if not exists ingredients (
--   id varchar(36) primary key,
--   name tinytext,
--   description longtext,
--   modified datetime
-- );

-- create table if not exists ingredients_recipes (
--   id varchar(36) primary key,
--   ingredient_id varchar(36),
--   recipe_id varchar(36),
--   modified datetime
-- );

-- new database schema for letter stuff
