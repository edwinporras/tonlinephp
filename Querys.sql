CREATE TABLE usuarios (
	id_usuarios INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50),
   	pass VARCHAR(255),
    nombre VARCHAR (100)
);
CREATE TABLE clientes (
	id_cliente INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50),
   	pass VARCHAR(255),
    nombre VARCHAR (100)
);

CREATE TABLE ventas (
	id_venta INT PRIMARY KEY AUTO_INCREMENT,
    fecha DATETIME,
    id_cliente INT,
    FOREIGN KEY (id_cliente) REFERENCES clientes (id_cliente)
);
CREATE TABLE productos (
	id_producto INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR (200),
    precio DOUBLE,
    existencia INT
);
CREATE TABLE detalleventas (
	id_detventa INT PRIMARY KEY AUTO_INCREMENT,
    cantidad INT,
    precio DOUBLE,
    subtotal DOUBLE,
    id_producto INT,
    id_venta INT,
    FOREIGN KEY (id_producto) REFERENCES productos (id_producto),
    FOREIGN KEY (id_venta) REFERENCES ventas (id_venta)
);
INSERT INTO usuarios( email, pass, nombre) VALUES ('edw@mail.com','827ccb0eea8a706c4c34a16891f84e7b', 'edwin');


-- CREATE TABLE files (
-- 	id_files INT PRIMARY KEY AUTO_INCREMENT,
--     file_name VARCHAR(255),
--    	filesize INT,
--     web_path VARCHAR (255),
--     system_path VARCHAR (255)
-- );

-- CREATE TABLE productos_files (
-- 	producto_id INT,
--     file_id INT,
--     FOREIGN KEY (producto_id) REFERENCES productos (id_producto),
--     FOREIGN KEY (file_id) REFERENCES files (id_files)
-- );
CREATE TABLE files(
    id_files INT PRIMARY KEY AUTO_INCREMENT,
    file_name VARCHAR(255),
    id_producto INT,
    FOREIGN KEY (id_producto) REFERENCES productos (id_producto)
);

CREATE TABLE categorias (
	id_categoria INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50)
);

ALTER TABLE productos
    ADD COLUMN id_categoria INT,
    ADD CONSTRAINT `fk_id_categoria` FOREIGN KEY (id_categoria)
        REFERENCES categorias (id_categoria);

alter table productos
  add descripcion VARCHAR(500);

alter table clientes
  add direccion VARCHAR(150);

  CREATE TABLE recibe(
    id_recibe INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    email VARCHAR(255),
    direccion VARCHAR(255),
    id_cliente INT,
    FOREIGN KEY (id_cliente) REFERENCES clientes (id_cliente)
);

alter table ventas
  add id_pago VARCHAR(255);