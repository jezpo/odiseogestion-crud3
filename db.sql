SET check_function_bodies = false;
--
-- Structure for table programas (OID = 16523) :
--
SET search_path = public, pg_catalog;
CREATE TABLE public.programas (
    id serial NOT NULL,
    id_programa varchar(5),
    programa varchar,
    id_padre integer,
    estado varchar
)
WITH (oids = false);
--
-- Structure for table documentos (OID = 16530) :
--
CREATE TABLE public.documentos (
    id bigserial NOT NULL,
    cite varchar,
    descripcion text,
    estado varchar,
    hash varchar(32),
    id_tipo_documento integer,
    documento bytea,
    id_programa varchar(5)
)
WITH (oids = false);
--
-- Structure for table tipo_tramite (OID = 16537) :
--
CREATE TABLE public.tipo_tramite (
    id serial NOT NULL,
    tramite varchar,
    estado char(1)
)
WITH (oids = false);
--
-- Structure for table flujo_tramite (OID = 16544) :
--
CREATE TABLE public.flujo_tramite (
    id serial NOT NULL,
    id_tipo_tramite integer,
    id_programa varchar(5),
    orden smallint,
    tiempo time without time zone,
    estado char(1)
)
WITH (oids = false);
--
-- Structure for table flujo_documentos (OID = 16549) :
--
CREATE TABLE public.flujo_documentos (
    id bigserial NOT NULL,
    id_documento bigint,
    fecha_recepcion timestamp without time zone,
    id_programa varchar(5),
    obs text
)
WITH (oids = FALSE);
INSERT INTO public.programas (id, id_programa, programa, id_padre, estado) OVERRIDING SYSTEM VALUE
VALUES (1, 'UATF', 'UNIVERSIDAD AUTONOMA TOMAS FRIAS', 0, 'A');

INSERT INTO public.programas (id, id_programa, programa, id_padre, estado) OVERRIDING SYSTEM VALUE
VALUES (2, 'REC', 'RECTORADO', 1, 'A');

INSERT INTO public.programas (id, id_programa, programa, id_padre, estado) OVERRIDING SYSTEM VALUE
VALUES (3, 'VICE', 'VICERRECTORADO', 1, 'A');

INSERT INTO public.programas (id, id_programa, programa, id_padre, estado) OVERRIDING SYSTEM VALUE
VALUES (4, 'DAF', 'DIRECCION ADMINISTRATIVA Y FINANCIERA', 2, 'A');

INSERT INTO public.programas (id, id_programa, programa, id_padre, estado) OVERRIDING SYSTEM VALUE
VALUES (5, 'DSA', 'DIRECCION DE SERVICIOS ACADEMICOS', 3, 'A');

INSERT INTO public.programas (id, id_programa, programa, id_padre, estado) OVERRIDING SYSTEM VALUE
VALUES (6, 'DATA', 'DATA CENTER', 3, 'A');

--
-- Data for table public.tipo_tramite (OID = 16537) (LIMIT 0,1)
--
INSERT INTO public.tipo_tramite (id, tramite, estado) OVERRIDING SYSTEM VALUE
VALUES (0, 'D', NULL);

--
-- Data for table public.flujo_tramite (OID = 16544) (LIMIT 0,1)
--
INSERT INTO public.flujo_tramite (id, id_tipo_tramite, id_programa, orden, tiempo, estado) OVERRIDING SYSTEM VALUE
VALUES (0, 0, 'UATF', 1, NULL, 'A');

--
-- Data for sequence public.programas_id_seq (OID = 16522)
--
SELECT pg_catalog.setval('public.programas_id_seq', 6, true);
--
-- Data for sequence public.documentos_id_seq (OID = 16529)
--
SELECT pg_catalog.setval('public.documentos_id_seq', 1, false);
--
-- Data for sequence public.tipo_tramite_id_seq (OID = 16536)
--
SELECT pg_catalog.setval('public.tipo_tramite_id_seq', 1, true);
--
-- Data for sequence public.flujo_tramite_id_seq (OID = 16543)
--
SELECT pg_catalog.setval('public.flujo_tramite_id_seq', 2, true);
--
-- Data for sequence public.flujo_documentos_id_seq (OID = 16548)
--
SELECT pg_catalog.setval('public.flujo_documentos_id_seq', 1, false);