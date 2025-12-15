CREATE USER 'almacen'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON `almacen_db`.* TO 'almacen'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;

CREATE USER 'usuario'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON `usuarios_db`.* TO 'usuario'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
