Create table users (
id int auto_increment primary key,
username VARCHAR(75) not null,
email VARCHAR(75) not null,
pwd_hash VARCHAR(75) not null,
create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
 );

Create table posts (
id int auto_increment primary key,
user_id int not null,
post text,
create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
foreign key (user_id) references users(id)
 );
 
 Create table comments (
id int auto_increment primary key,
user_id int not null,
post_id int not null,
comment text,
create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
foreign key (user_id) references users(id),
foreign key (post_id) references posts(id)
 )
 
 
 
--  i will not use gpt to ask if this databse is correct or not i will elarn it the hard way later all me
-- currently its good a post belogn to a user and a comment belong to a post and a user if i put a comment_id on post it will mean the post belong to a commnet and a user
-- which is not suppose to be the case