create table if not exists users(
  id varchar(36) primary key,
  first_name tinytext,
  last_name tinytext,
  email tinytext,
  username tinytext,
  password tinytext,
  role tinytext,
  modified datetime
);

create table if not exists recipes(
  id varchar(36) primary key,
  name tinytext,
  description text,
  user_id varchar(36),
  public boolean,
  modified datetime
);
