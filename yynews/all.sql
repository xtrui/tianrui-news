drop database if not exists yynews;
create database yynews;
use yynews;
create table t_user(
    UserID int(4) AUTO_INCREMENT primary key not null,
    Username char(15) not null,
    Password char(10) not null,
    Regtime  int      not null,
    Role    char(1)   not null,
    QQ      char(12)
)charset=utf8;

create table t_category(
    CatID int(4) AUTO_INCREMENT not null,
    Catname char(30) not null,
    cattime int not null,
    primary key(CatID)
)charset=utf8;

create table t_news(
    NewsID  int(4) AUTO_INCREMENT not null,
    CatID   int(4) not null,
    Title   char(50) not null,
    Content Text    Not null,
    Newstime    int    not null,
    Operator    int(4) not null,
    primary key(NewsID),
    foreign key(CatID) references t_category(CatID),
    foreign key(Operator) references t_user(UserID)
)charset=utf8;


create table t_comment(
    CommID  int(4) AUTO_INCREMENT not null,
    primary key(CommID),
    UserID int(4) not null,
    NewsID int(4) not null,
    Commtime    int not null,
    Content    char(200)  not null,
    foreign key(UserID) references t_user(UserID),
    foreign key(NewsID) references t_news(NewsID)
)charset=utf8;

create table t_friend(
    FriendID int(4) AUTO_INCREMENT primary key not null,
    Webname char(30) not null,
    Websete char(30) Not null,
    Friendtime int not null
)charset=utf8;
