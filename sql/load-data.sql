-- file path must be a full path to your CSV file
load data local infile '/var/www/html/data/movies-2014.csv'
into table movies
fields terminated by ','
optionally enclosed by '"'
ignore 1 lines;
