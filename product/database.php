CREATE TABLE admin(
a_id int AUTO_INCREMENT PRIMARY KEY,
    a_name varchar(55),
    a_email varchar(55),
    a_password varchar(55)
)

CREATE TABLE category(
c_id int AUTO_INCREMENT PRIMARY KEY,
 c_name varchar(55)
 
)

CREATE TABLE product(
p_id int AUTO_INCREMENT PRIMARY KEY,
pc_fk_id int, FOREIGN KEY(pc_fk_id) REFERENCES category(c_id),
p_name varchar(55),
p_price varchar(55)
    p_detail varchar(555),
    p_image varchar(555),
 )    



CREATE TABLE addtocart(
ad_id int AUTO_INCREMENT PRIMARY KEY,
adu_fk_id int,FOREIGN KEY(adu_fk_id) REFERENCES user(u_id),
p_fk_id int,FOREIGN KEY(p_fk_id) REFERENCES product(p_id),
    p_name varchar(55),
    p_detail varchar(55),
    p_price varchar(55),

    p_image varchar(55)
)

create TABLE checkout(
ch_id int AUTO_INCREMENT PRIMARY KEY,
chu_fk_id int,FOREIGN KEY(chu_fk_id) REFERENCES user(u_id),
    chp_fk_id int,FOREIGN KEY(chp_fk_id) REFERENCES product(p_id),
u_name varchar(50),
u_email varchar(50),
u_address varchar(50),
u_cell varchar(50),
u_totalproduct varchar(50),
u_totalprice varchar(50)
)