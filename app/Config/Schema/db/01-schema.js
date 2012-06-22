/* Created by DiaJSON-Dump Version 0.01(Beta)
-- Filename: 01-schema.js
var tablas = [
{
"nombre" : "talleres",
"orden" : 1,
"width" : 408,
"height" : 321,
"pos_x" : 384,
"pos_y" : 80,
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
 {"nombre" : "numero_total_horas", "tipo": "INT( 20 )", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false}
 ]
},
{
"nombre" : "etiquetas_talleres",
"orden" : 7,
"width" : 258,
"height" : 105,
"pos_x" : 448,
"pos_y" : 384,
"fill_colour" : "#FFFFFF",
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
"width" : 859,
"height" : 321,
"pos_x" : 688,
"pos_y" : 48,
"fill_colour" : "#FFA472",
"text_colour" : "#000000",
"line_colour" : "#000000",
"campos" : [
 {"nombre" : "id", "tipo": "INT(5)", "clave_primaria": true,"clave_unica": true,"es_null": false,"auto_increment": true},
 {"nombre" : "role", "tipo": "ENUM('admin','maestro','registrado') DEFAULT 'registrado'", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "username", "tipo": "VARCHAR(15)", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false},
 {"nombre" : "password", "tipo": "VARCHAR(40)", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "email", "tipo": "VARCHAR(100)", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false},
 {"nombre" : "email_publico", "tipo": "BOOLEAN DEFAULT FALSE", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "twitter", "tipo": "VARCHAR( 20 )", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "facebook", "tipo": "VARCHAR( 100 )", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "url", "tipo": "VARCHAR( 150 )", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "notificaciones", "tipo": "BOOLEAN DEFAULT FALSE", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "created", "tipo": "DATETIME", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "modified", "tipo": "DATETIME", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false}
 ]
},
{
"nombre" : "posts",
"orden" : 4,
"width" : 270,
"height" : 200,
"pos_x" : 592,
"pos_y" : 320,
"fill_colour" : "#FFFFFF",
"text_colour" : "#000000",
"line_colour" : "#000000",
"campos" : [
 {"nombre" : "id", "tipo": "INT(5)", "clave_primaria": true,"clave_unica": true,"es_null": false,"auto_increment": true},
 {"nombre" : "nombre", "tipo": "VARCHAR(75)", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false},
 {"nombre" : "slug_dst", "tipo": "VARCHAR(80)", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false},
 {"nombre" : "created", "tipo": "DATETIME", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "modified", "tipo": "DATETIME", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "content", "tipo": "TEXT", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false},
 {"nombre" : "taller_id", "tipo": "INT( 4 )", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false}
 ]
},
{
"nombre" : "talleres_users",
"orden" : 5,
"width" : 350,
"height" : 153,
"pos_x" : 816,
"pos_y" : 256,
"fill_colour" : "#FFFFFF",
"text_colour" : "#000000",
"line_colour" : "#000000",
"campos" : [
 {"nombre" : "id", "tipo": "INT(6)", "clave_primaria": true,"clave_unica": true,"es_null": false,"auto_increment": true},
 {"nombre" : "user_id", "tipo": "INT( 5 )", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false},
 {"nombre" : "taller_id", "tipo": "INT( 4 )", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "descuento", "tipo": "INT( 2 ) DEFAULT 0", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "created", "tipo": "DATETIME", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false}
 ]
},
{
"nombre" : "noticias",
"orden" : 3,
"width" : 258,
"height" : 200,
"pos_x" : 176,
"pos_y" : 144,
"fill_colour" : "#FFFFFF",
"text_colour" : "#000000",
"line_colour" : "#000000",
"campos" : [
 {"nombre" : "user_id", "tipo": "INT( 5 )", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "id", "tipo": "INT(2)", "clave_primaria": true,"clave_unica": true,"es_null": false,"auto_increment": true},
 {"nombre" : "nombre", "tipo": "VARCHAR(75)", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false},
 {"nombre" : "slug_dst", "tipo": "VARCHAR(80)", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false},
 {"nombre" : "created", "tipo": "DATETIME", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "modified", "tipo": "DATETIME", "clave_primaria": false,"es_null": false,"clave_unica": false,"auto_increment": false},
 {"nombre" : "content", "tipo": "TEXT", "clave_primaria": false,"es_null": true,"clave_unica": false,"auto_increment": false}
 ]
},
{
"nombre" : "etiquetas_noticias",
"orden" : 8,
"width" : 258,
"height" : 105,
"pos_x" : 208,
"pos_y" : 272,
"fill_colour" : "#FFFFFF",
"text_colour" : "#000000",
"line_colour" : "#000000",
"campos" : [
 {"nombre" : "id", "tipo": "INT(2)", "clave_primaria": true,"clave_unica": true,"es_null": false,"auto_increment": true},
 {"nombre" : "noticia_id", "tipo": "INT( 5 )", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false},
 {"nombre" : "etiqueta_id", "tipo": "INT ( 4)", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false}
 ]
},
{
"nombre" : "etiquetas",
"orden" : 6,
"width" : 258,
"height" : 105,
"pos_x" : 448,
"pos_y" : 432,
"fill_colour" : "#FFFFFF",
"text_colour" : "#000000",
"line_colour" : "#000000",
"campos" : [
 {"nombre" : "id", "tipo": "INT(4)", "clave_primaria": true,"clave_unica": true,"es_null": false,"auto_increment": true},
 {"nombre" : "nombre", "tipo": "VARCHAR(75)", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false},
 {"nombre" : "slug_dst", "tipo": "VARCHAR(80)", "clave_primaria": false,"es_null": false,"clave_unica": true,"auto_increment": false}
 ]
}
]