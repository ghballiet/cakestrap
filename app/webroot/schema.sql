create table if not exists users(
  id varchar(36) primary key,
  first_name tinytext,
  last_name tinytext,
  email tinytext,
  username tinytext,
  admin boolean,
  modified datetime
);
