CREATE TABLE application (
    Id int(10) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Name varchar2(25) NOT NULL,
    Email varchar2(25) NOT NULL, 
    Date_birth Date NOT NULL,
    Sex_M int(1) NOT NULL Default 0,
    Sex_W int(1) NOT NULL Default 0,
    Count_limbs_l2 int(1) NOT NULL Default 0,
    Count_limbs_m2 int(1) NOT NULL Default 0,
    Biography varchar2(100),
    Ability_god int(1) NOT NULL DEFAULT 0,
    Ability_fly int(1) NOT NULL DEFAULT 0,
    Ability_gtwalls int(1) NOT NULL DEFAULT 0,
);