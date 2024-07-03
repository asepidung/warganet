CREATE TABLE user (
   iduser INT PRIMARY KEY AUTO_INCREMENT,
   nmuser VARCHAR (15),
   passuser VARCHAR(20)
);

CREATE TABLE pelanggan (
   idpel INT PRIMARY KEY AUTO_INCREMENT,
   nmpel VARCHAR (20),
   tglgabung DATE,
   ssid VARCHAR (20),
   passwifi VARCHAR (20),
   iprouter VARCHAR (15),
   userrouter VARCHAR (15),
   passrouter VARCHAR (15),
   userpppoe VARCHAR (20),
   passpppoe VARCHAR (20),
   remoteip VARCHAR (15)
);
