CREATE TABLE usuario (
  id_usuario    int(11)       NOT NULL AUTO_INCREMENT
  ,s_nombre     varchar(50)   NOT NULL
  ,s_apellidos  varchar(120)  NOT NULL
  ,s_correo     varchar(120)  NOT NULL  UNIQUE
  ,s_username   varchar(20)   NOT NULL  UNIQUE
  ,s_password   varchar(32)   NOT NULL
  ,s_vigencia   char(1)       NOT NULL  DEFAULT 'S'
  ,PRIMARY KEY(id_usuario)
);

CREATE TABLE rol (
  id_rol          int(11)       NOT NULL AUTO_INCREMENT
  ,s_nombre       varchar(50)   NOT NULL
  ,s_descripcion  varchar(255)
  ,s_vigencia     char(1)       NOT NULL  DEFAULT 'S'
  ,PRIMARY KEY(id_rol)
);

CREATE TABLE modulo (
  id_modulo       int(11)       NOT NULL AUTO_INCREMENT
  ,s_nombre       varchar(50)   NOT NULL
  ,s_descripcion  varchar(255)
  ,s_hash         varchar(32)   UNIQUE
  ,s_nombre_url   varchar(50)   UNIQUE
  ,s_vigencia     char(1)       NOT NULL DEFAULT 'S'
  ,PRIMARY KEY(id_modulo)
);

CREATE TABLE vista (
  id_vista        int(11)       NOT NULL AUTO_INCREMENT
  ,s_nombre       varchar(50)   NOT NULL
  ,s_archivo      varchar(50)   NOT NULL UNIQUE
  ,descripcion    varchar(255)
  ,s_hash         varchar(32)   UNIQUE
  ,s_nombre_url   varchar(50)   UNIQUE
  ,id_modulo      int(11)
  ,s_vigencia     char(1)       NOT NULL DEFAULT 'S'
  ,PRIMARY KEY(id_vista)
  ,CONSTRAINT `fk_vista_modulo`   FOREIGN KEY (id_modulo)  REFERENCES modulo(id_modulo)
);

CREATE TABLE sub_vista (
  id_sub_vista    int(11)       NOT NULL AUTO_INCREMENT
  ,s_nombre       varchar(50)   NOT NULL
  ,s_descripcion  varchar(255)
  ,s_archivo      varchar(50)   NOT NULL UNIQUE
  ,s_vigencia     char(1)       NOT NULL DEFAULT 'S'
  ,PRIMARY KEY(id_sub_vista)
);

CREATE TABLE permiso (
  id_permiso      int(11)       NOT NULL AUTO_INCREMENT
  ,s_nombre       varchar(50)   NOT NULL
  ,s_descripcion  varchar(255)
  ,s_vigencia     char(1)       NOT NULL DEFAULT 'S'
  ,PRIMARY KEY(id_permiso)
);

CREATE TABLE rol_usuario (
  id_rol_usuario  int(11)   NOT NULL AUTO_INCREMENT
  ,id_rol         int(11)   NOT NULL
  ,id_usuario     int(11)   NOT NULL
  ,s_vigencia     char(1)   NOT NULL DEFAULT 'S'
  ,PRIMARY KEY(id_rol_usuario)
  ,CONSTRAINT `fk_ru_rol`     FOREIGN KEY (id_rol)      REFERENCES rol(id_rol)
  ,CONSTRAINT `fk_ru_usuario` FOREIGN KEY (id_usuario)  REFERENCES usuario(id_usuario)
);

CREATE TABLE rol_vista (
  id_rol_vista  int(11)   NOT NULL AUTO_INCREMENT
  ,id_rol       int(11)   NOT NULL
  ,id_vista     int(11)   NOT NULL
  ,s_vigencia   char(1)   NOT NULL DEFAULT 'S'
  ,PRIMARY KEY(id_rol_vista)
  ,CONSTRAINT `fk_rv_rol`     FOREIGN KEY (id_rol)    REFERENCES rol(id_rol)
  ,CONSTRAINT `fk_rv_vista`   FOREIGN KEY (id_vista)  REFERENCES vista(id_vista)
);

CREATE TABLE rol_sub_vista (
  id_rol_sub_vista  int(11)   NOT NULL AUTO_INCREMENT
  ,id_rol           int(11)   NOT NULL
  ,id_sub_vista     int(11)   NOT NULL
  ,s_vigencia       char(1)   NOT NULL DEFAULT 'S'
  ,PRIMARY KEY(id_rol_sub_vista)
  ,CONSTRAINT `fk_rsv_rol`        FOREIGN KEY (id_rol)        REFERENCES rol(id_rol)
  ,CONSTRAINT `fk_rsv_sub_vista`  FOREIGN KEY (id_sub_vista)  REFERENCES sub_vista(id_sub_vista)
);

CREATE TABLE rol_permiso (
  id_rol_permiso  int(11)   NOT NULL AUTO_INCREMENT
  ,id_rol         int(11)   NOT NULL
  ,id_permiso     int(11)   NOT NULL
  ,s_vigencia     char(1)   NOT NULL DEFAULT 'S'
  ,PRIMARY KEY(id_rol_permiso)
  ,CONSTRAINT `fk_rp_rol`       FOREIGN KEY (id_rol)      REFERENCES rol(id_rol)
  ,CONSTRAINT `fk_rp_permiso`   FOREIGN KEY (id_permiso)  REFERENCES permiso(id_permiso)
);

CREATE TABLE vista_sub_vista (
  id_vista_sub_vista  int(11)   NOT NULL AUTO_INCREMENT
  ,id_vista           int(11)   NOT NULL
  ,id_sub_vista       int(11)   NOT NULL
  ,s_vigencia     char(1)   NOT NULL DEFAULT 'S'
  ,PRIMARY KEY(id_vista_sub_vista)
  ,CONSTRAINT `fk_vsv_vista`      FOREIGN KEY (id_vista)      REFERENCES vista(id_vista)
  ,CONSTRAINT `fk_vsv_sub_vista`  FOREIGN KEY (id_sub_vista)  REFERENCES sub_vista(id_sub_vista)
);

CREATE TABLE bitacora_modelo_basico(
  id_bitacora_modelo_basico   int(11)   NOT NULL AUTO_INCREMENT
  ,id_usuario                 int(11)
  ,id_rol                     int(11)
  ,id_modulo                  int(11)
  ,id_vista                   int(11)
  ,id_sub_vista               int(11)
  ,id_permiso                 int(11)
  ,s_descripcion              text
  ,s_json_accion              text
  ,id_usuario_crea            int(11)   NOT NULL
  ,fecha_crea                 datetime  NOT NULL
  ,PRIMARY KEY(id_bitacora_modelo_basico)
  ,CONSTRAINT `fk_usuario_modificado` FOREIGN KEY (id_usuario)      REFERENCES usuario(id_usuario)
  ,CONSTRAINT `fk_rol_modificado`     FOREIGN KEY (id_rol)          REFERENCES rol(id_rol)
  ,CONSTRAINT `fk_modulo_modifica`    FOREIGN KEY (id_modulo)       REFERENCES modulo(id_modulo)
  ,CONSTRAINT `fk_vista_modifica`     FOREIGN KEY (id_vista)        REFERENCES vista(id_vista)
  ,CONSTRAINT `fk_sub_vista_modifica` FOREIGN KEY (id_sub_vista)    REFERENCES sub_vista(id_sub_vista)
  ,CONSTRAINT `fk_permiso_modifica`   FOREIGN KEY (id_permiso)      REFERENCES permiso(id_permiso)
  ,CONSTRAINT `fk_usuario_crea`       FOREIGN KEY (id_usuario_crea) REFERENCES usuario(id_usuario)
);