--
-- PostgreSQL database dump
--

-- Dumped from database version 13.2
-- Dumped by pg_dump version 13.2

-- Started on 2021-08-22 21:24:27

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 201 (class 1259 OID 141530)
-- Name: pr0y3ct0_business; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pr0y3ct0_business (
    businessid integer NOT NULL,
    name character varying(30),
    primarycolor character varying(6) NOT NULL,
    secondarycolor character varying(6) NOT NULL,
    logo character varying(100) NOT NULL,
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


ALTER TABLE public.pr0y3ct0_business OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 141528)
-- Name: pr0y3ct0_business_businessid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pr0y3ct0_business_businessid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pr0y3ct0_business_businessid_seq OWNER TO postgres;

--
-- TOC entry 3056 (class 0 OID 0)
-- Dependencies: 200
-- Name: pr0y3ct0_business_businessid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pr0y3ct0_business_businessid_seq OWNED BY public.pr0y3ct0_business.businessid;


--
-- TOC entry 211 (class 1259 OID 141696)
-- Name: pr0y3ct0_progress_comments_tickets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pr0y3ct0_progress_comments_tickets (
    progresscommentticketid integer NOT NULL,
    progressticketid integer NOT NULL,
    description text NOT NULL,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    status bit(1)
);


ALTER TABLE public.pr0y3ct0_progress_comments_tickets OWNER TO postgres;

--
-- TOC entry 210 (class 1259 OID 141694)
-- Name: pr0y3ct0_progress_comments_tickets_progresscommentticketid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pr0y3ct0_progress_comments_tickets_progresscommentticketid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pr0y3ct0_progress_comments_tickets_progresscommentticketid_seq OWNER TO postgres;

--
-- TOC entry 3057 (class 0 OID 0)
-- Dependencies: 210
-- Name: pr0y3ct0_progress_comments_tickets_progresscommentticketid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pr0y3ct0_progress_comments_tickets_progresscommentticketid_seq OWNED BY public.pr0y3ct0_progress_comments_tickets.progresscommentticketid;


--
-- TOC entry 209 (class 1259 OID 141683)
-- Name: pr0y3ct0_progress_tickets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pr0y3ct0_progress_tickets (
    progressticketid integer NOT NULL,
    ticketid integer NOT NULL,
    name character varying(50) NOT NULL,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    status integer
);


ALTER TABLE public.pr0y3ct0_progress_tickets OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 141681)
-- Name: pr0y3ct0_progress_tickets_progressticketid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pr0y3ct0_progress_tickets_progressticketid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pr0y3ct0_progress_tickets_progressticketid_seq OWNER TO postgres;

--
-- TOC entry 3058 (class 0 OID 0)
-- Dependencies: 208
-- Name: pr0y3ct0_progress_tickets_progressticketid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pr0y3ct0_progress_tickets_progressticketid_seq OWNED BY public.pr0y3ct0_progress_tickets.progressticketid;


--
-- TOC entry 205 (class 1259 OID 141598)
-- Name: pr0y3ct0_projects; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pr0y3ct0_projects (
    projectid integer NOT NULL,
    userid integer NOT NULL,
    name character varying(50) NOT NULL,
    description text,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    slug character varying(100),
    status integer
);


ALTER TABLE public.pr0y3ct0_projects OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 141596)
-- Name: pr0y3ct0_projects_projectid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pr0y3ct0_projects_projectid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pr0y3ct0_projects_projectid_seq OWNER TO postgres;

--
-- TOC entry 3059 (class 0 OID 0)
-- Dependencies: 204
-- Name: pr0y3ct0_projects_projectid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pr0y3ct0_projects_projectid_seq OWNED BY public.pr0y3ct0_projects.projectid;


--
-- TOC entry 207 (class 1259 OID 141636)
-- Name: pr0y3ct0_tickets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pr0y3ct0_tickets (
    ticketid integer NOT NULL,
    projectid integer NOT NULL,
    name character varying(100) NOT NULL,
    status integer NOT NULL,
    description text,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    slug character varying(100)
);


ALTER TABLE public.pr0y3ct0_tickets OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 141634)
-- Name: pr0y3ct0_tickets_ticketid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pr0y3ct0_tickets_ticketid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pr0y3ct0_tickets_ticketid_seq OWNER TO postgres;

--
-- TOC entry 3060 (class 0 OID 0)
-- Dependencies: 206
-- Name: pr0y3ct0_tickets_ticketid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pr0y3ct0_tickets_ticketid_seq OWNED BY public.pr0y3ct0_tickets.ticketid;


--
-- TOC entry 203 (class 1259 OID 141569)
-- Name: pr0y3ct0_users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pr0y3ct0_users (
    "UserId" integer NOT NULL,
    "Name" character varying(30),
    "Lastname" character varying(60),
    "Email" character varying(80),
    "Password" character varying(150),
    "BusinessId" integer,
    "Created_at" timestamp without time zone,
    "Updated_at" timestamp without time zone,
    slug character varying(80),
    photo character varying(100)
);


ALTER TABLE public.pr0y3ct0_users OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 141567)
-- Name: pr0y3ct0_users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pr0y3ct0_users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pr0y3ct0_users_id_seq OWNER TO postgres;

--
-- TOC entry 3061 (class 0 OID 0)
-- Dependencies: 202
-- Name: pr0y3ct0_users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pr0y3ct0_users_id_seq OWNED BY public.pr0y3ct0_users."UserId";


--
-- TOC entry 2884 (class 2604 OID 141533)
-- Name: pr0y3ct0_business businessid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pr0y3ct0_business ALTER COLUMN businessid SET DEFAULT nextval('public.pr0y3ct0_business_businessid_seq'::regclass);


--
-- TOC entry 2889 (class 2604 OID 141699)
-- Name: pr0y3ct0_progress_comments_tickets progresscommentticketid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pr0y3ct0_progress_comments_tickets ALTER COLUMN progresscommentticketid SET DEFAULT nextval('public.pr0y3ct0_progress_comments_tickets_progresscommentticketid_seq'::regclass);


--
-- TOC entry 2888 (class 2604 OID 141686)
-- Name: pr0y3ct0_progress_tickets progressticketid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pr0y3ct0_progress_tickets ALTER COLUMN progressticketid SET DEFAULT nextval('public.pr0y3ct0_progress_tickets_progressticketid_seq'::regclass);


--
-- TOC entry 2886 (class 2604 OID 141658)
-- Name: pr0y3ct0_projects projectid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pr0y3ct0_projects ALTER COLUMN projectid SET DEFAULT nextval('public.pr0y3ct0_projects_projectid_seq'::regclass);


--
-- TOC entry 2887 (class 2604 OID 141639)
-- Name: pr0y3ct0_tickets ticketid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pr0y3ct0_tickets ALTER COLUMN ticketid SET DEFAULT nextval('public.pr0y3ct0_tickets_ticketid_seq'::regclass);


--
-- TOC entry 2885 (class 2604 OID 141572)
-- Name: pr0y3ct0_users UserId; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pr0y3ct0_users ALTER COLUMN "UserId" SET DEFAULT nextval('public.pr0y3ct0_users_id_seq'::regclass);


--
-- TOC entry 3040 (class 0 OID 141530)
-- Dependencies: 201
-- Data for Name: pr0y3ct0_business; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pr0y3ct0_business (businessid, name, primarycolor, secondarycolor, logo, created_at, updated_at) FROM stdin;
1	Aquarium	0787ea	ff7300	nn	2021-08-19 20:19:42.278838	2021-08-19 20:19:42.278838
2	Exito	ffe900	black	ss	2021-08-21 18:39:19	2021-08-21 18:39:19
\.


--
-- TOC entry 3050 (class 0 OID 141696)
-- Dependencies: 211
-- Data for Name: pr0y3ct0_progress_comments_tickets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pr0y3ct0_progress_comments_tickets (progresscommentticketid, progressticketid, description, created_at, updated_at, status) FROM stdin;
29	9	Se logra ventas mayores a 3 millones de pesos	2021-08-23 04:06:28	2021-08-23 04:06:28	\N
30	10	Se logra ventas mayores a 4 millones	2021-08-23 04:06:49	2021-08-23 04:06:49	\N
31	11	Se logra ventas igual a 5 millones	2021-08-23 04:07:14	2021-08-23 04:07:14	\N
32	12	Se lgora ventas igual a los 2 millones	2021-08-23 04:07:32	2021-08-23 04:07:32	\N
33	13	Se logra ventas igual a 3 millones	2021-08-23 04:07:51	2021-08-23 04:07:51	\N
34	14	Queda faltando motores REF 001, se solicita 100 productos	2021-08-23 04:09:08	2021-08-23 04:09:08	\N
35	14	Se obtienen los 100 motores REF 001	2021-08-23 04:09:18	2021-08-23 04:09:18	\N
36	16	Se adquiere 200 ejemplares de peces betta	2021-08-23 04:12:38	2021-08-23 04:12:38	\N
37	16	Se logra adquirir acuarios especializados para peces betta	2021-08-23 04:12:53	2021-08-23 04:12:53	\N
38	17	Se adquiere 200 ejemplares de peces disco	2021-08-23 04:13:07	2021-08-23 04:13:07	\N
39	17	Se logra adquirir acuarios especializados para peces disco	2021-08-23 04:13:26	2021-08-23 04:13:26	\N
40	18	Se adquieren 1000 anticloros	2021-08-23 04:14:58	2021-08-23 04:14:58	\N
41	18	Se venden 200 anticloros	2021-08-23 04:15:04	2021-08-23 04:15:04	\N
42	19	Se adquieren 1000 azul de metileno	2021-08-23 04:15:24	2021-08-23 04:15:24	\N
43	19	Se venden 300 azul de metileno	2021-08-23 04:15:32	2021-08-23 04:15:32	\N
44	19	Se rompe dos bolsas, queda pendiente	2021-08-23 04:15:39	2021-08-23 04:15:39	\N
\.


--
-- TOC entry 3048 (class 0 OID 141683)
-- Dependencies: 209
-- Data for Name: pr0y3ct0_progress_tickets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pr0y3ct0_progress_tickets (progressticketid, ticketid, name, created_at, updated_at, status) FROM stdin;
13	5	Venta dia Viernes	2021-08-23 04:07:39	2021-08-23 04:07:56	1
12	5	Ventas dia Jueves	2021-08-23 04:07:23	2021-08-23 04:07:57	1
11	5	Venta dia miercoles	2021-08-23 04:07:00	2021-08-23 04:07:58	1
10	5	Venta dia Martes	2021-08-23 04:06:38	2021-08-23 04:07:59	1
9	5	Venta dia lunes	2021-08-23 04:06:14	2021-08-23 04:08:00	1
14	6	Inventarios de motores	2021-08-23 04:08:40	2021-08-23 04:09:21	1
15	6	Inventario de Figuras	2021-08-23 04:09:33	2021-08-23 04:09:33	0
17	7	Control de peces disco	2021-08-23 04:12:20	2021-08-23 04:13:28	1
16	7	Control de peces beta	2021-08-23 04:12:14	2021-08-23 04:13:43	1
18	8	Control de anticloro	2021-08-23 04:14:49	2021-08-23 04:15:05	1
19	8	Control de Azul de metileno	2021-08-23 04:15:14	2021-08-23 04:15:14	0
\.


--
-- TOC entry 3044 (class 0 OID 141598)
-- Dependencies: 205
-- Data for Name: pr0y3ct0_projects; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pr0y3ct0_projects (projectid, userid, name, description, created_at, updated_at, slug, status) FROM stdin;
9	4	Control de productos para acuario	Se debe registrar todo el control de los productos	2021-08-23 04:05:38	2021-08-23 04:05:38	control-de-productos-para-acuario	0
\.


--
-- TOC entry 3046 (class 0 OID 141636)
-- Dependencies: 207
-- Data for Name: pr0y3ct0_tickets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pr0y3ct0_tickets (ticketid, projectid, name, status, description, created_at, updated_at, slug) FROM stdin;
5	9	Ventas primera semana	2	Se debe registrar todas las ventas de la primera semana	2021-08-23 04:06:00	2021-08-23 04:08:05	ventas-primera-semana
6	9	Control de Inventario	1	Control de los inventarios	2021-08-23 04:08:21	2021-08-23 04:09:34	control-de-inventario
7	9	Control de peces	2	Control de peces	2021-08-23 04:11:59	2021-08-23 04:13:38	control-de-peces
8	9	Control de quimicos para acuarios	1	Se requiere control e inventario de quimicos para acuarios	2021-08-23 04:14:09	2021-08-23 04:15:14	control-de-quimicos-para-acuarios
\.


--
-- TOC entry 3042 (class 0 OID 141569)
-- Dependencies: 203
-- Data for Name: pr0y3ct0_users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pr0y3ct0_users ("UserId", "Name", "Lastname", "Email", "Password", "BusinessId", "Created_at", "Updated_at", slug, photo) FROM stdin;
4	Usuario 1	Vargas	email_1@mail.com	$2y$10$UxRY2ybd1ZAvG5IUFLfkueffbmdU3/R4mQDzeYxh7eqnkF6YkpD6e	1	2021-08-23 04:04:47	2021-08-23 04:04:47	Usuario_1_Vargas	https://ui-avatars.com/api/?background=0787ea&color=ff6f01&name=Usuario 1 Vargas
\.


--
-- TOC entry 3062 (class 0 OID 0)
-- Dependencies: 200
-- Name: pr0y3ct0_business_businessid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pr0y3ct0_business_businessid_seq', 2, true);


--
-- TOC entry 3063 (class 0 OID 0)
-- Dependencies: 210
-- Name: pr0y3ct0_progress_comments_tickets_progresscommentticketid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pr0y3ct0_progress_comments_tickets_progresscommentticketid_seq', 44, true);


--
-- TOC entry 3064 (class 0 OID 0)
-- Dependencies: 208
-- Name: pr0y3ct0_progress_tickets_progressticketid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pr0y3ct0_progress_tickets_progressticketid_seq', 19, true);


--
-- TOC entry 3065 (class 0 OID 0)
-- Dependencies: 204
-- Name: pr0y3ct0_projects_projectid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pr0y3ct0_projects_projectid_seq', 9, true);


--
-- TOC entry 3066 (class 0 OID 0)
-- Dependencies: 206
-- Name: pr0y3ct0_tickets_ticketid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pr0y3ct0_tickets_ticketid_seq', 8, true);


--
-- TOC entry 3067 (class 0 OID 0)
-- Dependencies: 202
-- Name: pr0y3ct0_users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pr0y3ct0_users_id_seq', 4, true);


--
-- TOC entry 2891 (class 2606 OID 141535)
-- Name: pr0y3ct0_business pr0y3ct0_business_id_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pr0y3ct0_business
    ADD CONSTRAINT pr0y3ct0_business_id_pk PRIMARY KEY (businessid);


--
-- TOC entry 2897 (class 2606 OID 141660)
-- Name: pr0y3ct0_projects pr0y3ct0_projects_id_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pr0y3ct0_projects
    ADD CONSTRAINT pr0y3ct0_projects_id_pk PRIMARY KEY (projectid);


--
-- TOC entry 2899 (class 2606 OID 141644)
-- Name: pr0y3ct0_tickets pr0y3ct0_tickets_id_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pr0y3ct0_tickets
    ADD CONSTRAINT pr0y3ct0_tickets_id_pk PRIMARY KEY (ticketid);


--
-- TOC entry 2903 (class 2606 OID 141704)
-- Name: pr0y3ct0_progress_comments_tickets pr0y3ct0_tickets_progress_comments_id_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pr0y3ct0_progress_comments_tickets
    ADD CONSTRAINT pr0y3ct0_tickets_progress_comments_id_pk PRIMARY KEY (progresscommentticketid);


--
-- TOC entry 2901 (class 2606 OID 141688)
-- Name: pr0y3ct0_progress_tickets pr0y3ct0_tickets_progress_id_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pr0y3ct0_progress_tickets
    ADD CONSTRAINT pr0y3ct0_tickets_progress_id_pk PRIMARY KEY (progressticketid);


--
-- TOC entry 2893 (class 2606 OID 141576)
-- Name: pr0y3ct0_users pr0y3ct0_users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pr0y3ct0_users
    ADD CONSTRAINT pr0y3ct0_users_email_unique UNIQUE ("Email");


--
-- TOC entry 2895 (class 2606 OID 141574)
-- Name: pr0y3ct0_users pr0y3ct0_users_id_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pr0y3ct0_users
    ADD CONSTRAINT pr0y3ct0_users_id_pk PRIMARY KEY ("UserId");


--
-- TOC entry 2905 (class 2606 OID 141671)
-- Name: pr0y3ct0_projects pr0y3ct0_projects_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pr0y3ct0_projects
    ADD CONSTRAINT pr0y3ct0_projects_fk FOREIGN KEY (userid) REFERENCES public.pr0y3ct0_users("UserId");


--
-- TOC entry 2906 (class 2606 OID 141676)
-- Name: pr0y3ct0_tickets pr0y3ct0_tickets_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pr0y3ct0_tickets
    ADD CONSTRAINT pr0y3ct0_tickets_fk FOREIGN KEY (projectid) REFERENCES public.pr0y3ct0_projects(projectid);


--
-- TOC entry 2907 (class 2606 OID 141689)
-- Name: pr0y3ct0_progress_tickets pr0y3ct0_tickets_projects_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pr0y3ct0_progress_tickets
    ADD CONSTRAINT pr0y3ct0_tickets_projects_fk FOREIGN KEY (ticketid) REFERENCES public.pr0y3ct0_tickets(ticketid);


--
-- TOC entry 2908 (class 2606 OID 141705)
-- Name: pr0y3ct0_progress_comments_tickets pr0y3ct0_tickets_projects_progress_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pr0y3ct0_progress_comments_tickets
    ADD CONSTRAINT pr0y3ct0_tickets_projects_progress_fk FOREIGN KEY (progressticketid) REFERENCES public.pr0y3ct0_progress_tickets(progressticketid);


--
-- TOC entry 2904 (class 2606 OID 141577)
-- Name: pr0y3ct0_users pr0y3ct0_users_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pr0y3ct0_users
    ADD CONSTRAINT pr0y3ct0_users_fk FOREIGN KEY ("BusinessId") REFERENCES public.pr0y3ct0_business(businessid);


-- Completed on 2021-08-22 21:24:27

--
-- PostgreSQL database dump complete
--

