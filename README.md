# Quiz, Juan Diego Quintero Argüello

Nombre: Juan Diego Quintero Argüello

Curso: Sputnik,M1

### Creación Base de datos

Se requiere crear un modulo administrador para la empresa Campuslands, la cual debe tener las siguientes tablas: pais, departamento, region, campers

(Crear la base de datos todo por consola)

Ingreso: mysql -u root

CREATE DATABASE CAMPUSLANDS;

##### Creación de la tabla país

CREATE TABLE pais(
    -> idPais INT(20),
    -> nombrePais VARCHAR(50));

##### Creación de la tabla departamento

CREATE TABLE departamento(
    -> idDep INT(20),
    -> nombreDep VARCHAR(50),
    -> idPais INT(20));



##### Creación de la tabla region

CREATE TABLE region(
    -> idReg INT(20),
    -> nombreReg VARCHAR(60),
    -> idDep INT(20));



##### Creación de la tabla campers

 CREATE TABLE campers(
    -> idCamper INT(20),
    -> nombreCamper VARCHAR(50),
    -> apellidoCamper VARCHAR(50),
    -> fechaNac DATE,
    -> idReg INT(20));



**Se le crea la Primary key a todas las tablas**
 ALTER TABLE campers
    -> ADD PRIMARY KEY (idCamper);

ALTER TABLE region
    -> ADD PRIMARY KEY (idReg);

ALTER TABLE departamento
    -> ADD PRIMARY KEY (idDep);

ALTER TABLE pais
    -> ADD PRIMARY KEY (idPais);



**Relacion, foreignkey**

ALTER TABLE region
    -> ADD CONSTRAINT idReg FOREIGN KEY (idDep) REFERENCES departamento(idDep);

ALTER TABLE campers
    -> ADD CONSTRAINT idCamper FOREIGN KEY (idReg) REFERENCES region(idReg);

ALTER TABLE departamento
    -> ADD CONSTRAINT idDep FOREIGN KEY (idPais) REFERENCES pais(idPais);



##### CRUDS de las tablas

Se le creo un CRUD para cada tabla, en estos CRUDS se les permite:

- Insertar
- Seleccionar
- Actualizar
- Borrar

##### *Revizar*

Tengo un error con las credenciales, por el motivo de que al crear la tabla utilicé lo siguiente:"
Ingreso: mysql -u root" por el motivo de que era la única manera que me dejaba ingresar

Se le insertó la parte front-end pero no esta en funcionamiento



#### Localhost: phpmyadmin

Evidencia tabla, diseño
![image-20230628094326359](C:\Users\Juan\AppData\Roaming\Typora\typora-user-images\image-20230628094326359.png)