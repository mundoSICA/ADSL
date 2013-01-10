/* Created by DiaJSON-Dump Version 0.01(Beta)
 * Filename: 01-schema.js
 */
var tablas = [
{
"nombre" : "talleres",
"orden" : 1,
"width" : 755,
"height" : 465,
"pos_x" : 288,
"pos_y" : 64,
"fill_colour" : "#ABFFA3",
"text_colour" : "#000000",
"line_colour" : "#000000",
"campos" : [
 {"nombre" : "user_id", "tipo": "INT( 5 )", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "id", "tipo": "INT( 4 )", "clave_primaria": true,"clave_unica": true,"es_null": false,"auto_increment": true},
 {"nombre" : "nombre", "tipo": "VARCHAR(75)", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false},
 {"nombre" : "cupo", "tipo": "INT( 2 )", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "slug_dst", "tipo": "VARCHAR(80)", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false},
 {"nombre" : "horario", "tipo": "VARCHAR(200)", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "fecha_inicio", "tipo": "DATE", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "fecha_final", "tipo": "DATE", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "costo", "tipo": "FLOAT( 4 )", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "resumen", "tipo": "VARCHAR( 200 )", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "contenido", "tipo": "TEXT", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "numero_total_horas", "tipo": "INT( 20 )", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "requisitos", "tipo": "TEXT", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "num_alumnos", "tipo": "INT( 2 ) DEFAULT 0", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "status", "tipo": "ENUM('abierto', 'cerrado') DEFAULT 'abierto'", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "created", "tipo": "DATETIME", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "modified", "tipo": "DATETIME", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "num_sesiones", "tipo": "INT( 2 ) DEFAULT 0", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false}
 ]
},
{
"nombre" : "contribuciones",
"orden" : 9,
"width" : 327,
"height" : 225,
"pos_x" : 848,
"pos_y" : 400,
"fill_colour" : "#E5E5E5",
"text_colour" : "#000000",
"line_colour" : "#000000",
"campos" : [
 {"nombre" : "hash", "tipo": "VARCHAR( 40 )", "clave_primaria": true,"clave_unica": true,"es_null": false,"auto_increment": false},
 {"nombre" : "author_name", "tipo": "VARCHAR(150)", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "author_email", "tipo": "VARCHAR(150)", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "message", "tipo": "TEXT", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "added", "tipo": "TEXT", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "modified", "tipo": "TEXT", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "removed", "tipo": "TEXT", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "TIMESTAMP", "tipo": "TIMESTAMP", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false}
 ]
},
{
"nombre" : "etiquetas_talleres",
"orden" : 7,
"width" : 258,
"height" : 105,
"pos_x" : 304,
"pos_y" : 384,
"fill_colour" : "#FFCAEC",
"text_colour" : "#000000",
"line_colour" : "#000000",
"campos" : [
 {"nombre" : "id", "tipo": "INT(5)", "clave_primaria": true,"clave_unica": true,"es_null": false,"auto_increment": true},
 {"nombre" : "taller_id", "tipo": "INT ( 4)", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false},
 {"nombre" : "etiqueta_id", "tipo": "INT( 5 )", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false}
 ]
},
{
"nombre" : "users",
"orden" : 2,
"width" : 916,
"height" : 393,
"pos_x" : 720,
"pos_y" : 16,
"fill_colour" : "#FFA472",
"text_colour" : "#000000",
"line_colour" : "#000000",
"campos" : [
 {"nombre" : "id", "tipo": "INT(5)", "clave_primaria": true,"clave_unica": true,"es_null": false,"auto_increment": true},
 {"nombre" : "role", "tipo": "ENUM('admin','miembro','registrado') DEFAULT 'registrado'", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "username", "tipo": "VARCHAR(15)", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false},
 {"nombre" : "nombre", "tipo": "VARCHAR( 150 )", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "password", "tipo": "VARCHAR(40)", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "email", "tipo": "VARCHAR(100)", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false},
 {"nombre" : "email_publico", "tipo": "BOOLEAN DEFAULT FALSE", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "email_token", "tipo": "VARCHAR( 40 )", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "email_token_expires", "tipo": "DATETIME", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "twitter", "tipo": "VARCHAR( 20 )", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "facebook", "tipo": "VARCHAR( 100 )", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "url", "tipo": "VARCHAR( 150 )", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "notificaciones", "tipo": "BOOLEAN DEFAULT FALSE", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "created", "tipo": "DATETIME", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "modified", "tipo": "DATETIME", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false}
 ]
},
{
"nombre" : "videos",
"orden" : 11,
"width" : 270,
"height" : 129,
"pos_x" : 32,
"pos_y" : 48,
"fill_colour" : "#FFFFFF",
"text_colour" : "#000000",
"line_colour" : "#000000",
"campos" : [
 {"nombre" : "id", "tipo": "INT(2)", "clave_primaria": true,"clave_unica": true,"es_null": false,"auto_increment": true},
 {"nombre" : "contenido_id", "tipo": "INT(5)", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false},
 {"nombre" : "created", "tipo": "DATETIME", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "modified", "tipo": "DATETIME", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false}
 ]
},
{
"nombre" : "talleres_users",
"orden" : 5,
"width" : 350,
"height" : 153,
"pos_x" : 752,
"pos_y" : 272,
"fill_colour" : "#FFFFFF",
"text_colour" : "#000000",
"line_colour" : "#000000",
"campos" : [
 {"nombre" : "id", "tipo": "INT(6)", "clave_primaria": true,"clave_unica": true,"es_null": false,"auto_increment": true},
 {"nombre" : "user_id", "tipo": "INT( 5 )", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "taller_id", "tipo": "INT( 4 )", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "descuento", "tipo": "INT( 2 ) DEFAULT 0", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "created", "tipo": "DATETIME", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false}
 ]
},
{
"nombre" : "contenidos_etiquetas",
"orden" : 8,
"width" : 270,
"height" : 105,
"pos_x" : 112,
"pos_y" : 320,
"fill_colour" : "#FFCAEC",
"text_colour" : "#000000",
"line_colour" : "#000000",
"campos" : [
 {"nombre" : "id", "tipo": "INT(2)", "clave_primaria": true,"clave_unica": true,"es_null": false,"auto_increment": true},
 {"nombre" : "contenido_id", "tipo": "INT( 5 )", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false},
 {"nombre" : "etiqueta_id", "tipo": "INT ( 4)", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false}
 ]
},
{
"nombre" : "estrellas",
"orden" : 10,
"width" : 339,
"height" : 200,
"pos_x" : 16,
"pos_y" : 384,
"fill_colour" : "#FFF4A5",
"text_colour" : "#000000",
"line_colour" : "#000000",
"campos" : [
 {"nombre" : "id", "tipo": "INT( 4 )", "clave_primaria": true,"clave_unica": true,"es_null": false,"auto_increment": true},
 {"nombre" : "exteno_id", "tipo": "INT( 5 )", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "externo_tabla", "tipo": "VARCHAR( 50 )", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "user_id", "tipo": "INT( 5 )", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false},
 {"nombre" : "estrellas", "tipo": "INT( 1 )", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "created", "tipo": "DATETIME", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "content", "tipo": "TEXT", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false}
 ]
},
{
"nombre" : "sesiones",
"orden" : 4,
"width" : 373,
"height" : 321,
"pos_x" : 480,
"pos_y" : 336,
"fill_colour" : "#FFFFFF",
"text_colour" : "#000000",
"line_colour" : "#000000",
"campos" : [
 {"nombre" : "id", "tipo": "INT(5)", "clave_primaria": true,"clave_unica": true,"es_null": false,"auto_increment": true},
 {"nombre" : "taller_id", "tipo": "INT( 5 )", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "keywords", "tipo": "VARCHAR(150)", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "nombre", "tipo": "VARCHAR(150)", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false},
 {"nombre" : "slug_dst", "tipo": "VARCHAR(150)", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false},
 {"nombre" : "orden", "tipo": "INT( 2 )", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "descripcion", "tipo": "TEXT", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "content", "tipo": "TEXT", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "estrellas", "tipo": "TEXT", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "created", "tipo": "DATETIME", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "modified", "tipo": "DATETIME", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "fecha_publicacion", "tipo": "DATETIME", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false}
 ]
},
{
"nombre" : "etiquetas",
"orden" : 6,
"width" : 258,
"height" : 105,
"pos_x" : 304,
"pos_y" : 464,
"fill_colour" : "#FFCAEC",
"text_colour" : "#000000",
"line_colour" : "#000000",
"campos" : [
 {"nombre" : "id", "tipo": "INT(4)", "clave_primaria": true,"clave_unica": true,"es_null": false,"auto_increment": true},
 {"nombre" : "nombre", "tipo": "VARCHAR(75)", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false},
 {"nombre" : "slug_dst", "tipo": "VARCHAR(80)", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false}
 ]
},
{
"nombre" : "contenidos",
"orden" : 3,
"width" : 281,
"height" : 248,
"pos_x" : 96,
"pos_y" : 160,
"fill_colour" : "#FFFFFF",
"text_colour" : "#000000",
"line_colour" : "#000000",
"campos" : [
 {"nombre" : "user_id", "tipo": "INT( 5 )", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "id", "tipo": "INT(2)", "clave_primaria": true,"clave_unica": true,"es_null": false,"auto_increment": true},
 {"nombre" : "nombre", "tipo": "VARCHAR(75)", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false},
 {"nombre" : "slug_dst", "tipo": "VARCHAR(80)", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false},
 {"nombre" : "keywords", "tipo": "VARCHAR(200)", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "content", "tipo": "TEXT", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "estrellas", "tipo": "TEXT", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "created", "tipo": "DATETIME", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "modified", "tipo": "DATETIME", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false}
 ]
}
]