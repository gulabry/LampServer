drop table if exists movies;

create table movies (
    title varchar(72),
    released varchar(64),    
    distributor varchar(64),
    genre varchar(32),
    rating varchar(10),
    gross varchar(15),
    tickets varchar(15),
    imdb_id varchar(15),
    id int auto_increment not null primary key,

    index (title)
);