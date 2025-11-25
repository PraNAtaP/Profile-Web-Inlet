--
-- PostgreSQL database dump
--

\restrict 9asA3OE22wPtypnjRhOph2IexvmxSGrfty2h247Uyw2ufKPlCZdKN8DBkxEf7Zm

-- Dumped from database version 14.20 (Homebrew)
-- Dumped by pg_dump version 14.20 (Homebrew)

-- Started on 2025-11-18 11:32:36 WIB

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
-- TOC entry 212 (class 1259 OID 16528)
-- Name: admin; Type: TABLE; Schema: public; Owner: pranamac
--

CREATE TABLE public.admin (
    id_admin integer NOT NULL,
    nama character varying(255),
    email character varying(255) NOT NULL,
    username character varying(100) NOT NULL,
    password_hash character varying(255) NOT NULL,
    roles character varying(20) DEFAULT 'admin'::character varying
);


ALTER TABLE public.admin OWNER TO pranamac;

--
-- TOC entry 211 (class 1259 OID 16527)
-- Name: admin_id_admin_seq; Type: SEQUENCE; Schema: public; Owner: pranamac
--

CREATE SEQUENCE public.admin_id_admin_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.admin_id_admin_seq OWNER TO pranamac;

--
-- TOC entry 3897 (class 0 OID 0)
-- Dependencies: 211
-- Name: admin_id_admin_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: pranamac
--

ALTER SEQUENCE public.admin_id_admin_seq OWNED BY public.admin.id_admin;


--
-- TOC entry 218 (class 1259 OID 16576)
-- Name: anggota_lab; Type: TABLE; Schema: public; Owner: pranamac
--

CREATE TABLE public.anggota_lab (
    id_anggota integer NOT NULL,
    nama character varying(255),
    jabatan character varying(100),
    kontak character varying(50),
    email character varying(255),
    foto character varying(255),
    id_admin integer
);


ALTER TABLE public.anggota_lab OWNER TO pranamac;

--
-- TOC entry 217 (class 1259 OID 16575)
-- Name: anggota_lab_id_anggota_seq; Type: SEQUENCE; Schema: public; Owner: pranamac
--

CREATE SEQUENCE public.anggota_lab_id_anggota_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.anggota_lab_id_anggota_seq OWNER TO pranamac;

--
-- TOC entry 3898 (class 0 OID 0)
-- Dependencies: 217
-- Name: anggota_lab_id_anggota_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: pranamac
--

ALTER SEQUENCE public.anggota_lab_id_anggota_seq OWNED BY public.anggota_lab.id_anggota;


--
-- TOC entry 216 (class 1259 OID 16561)
-- Name: berita; Type: TABLE; Schema: public; Owner: pranamac
--

CREATE TABLE public.berita (
    id_berita integer NOT NULL,
    judul character varying(255),
    isi text,
    tanggal_publikasi timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    video_embed character varying(255),
    id_admin integer
);


ALTER TABLE public.berita OWNER TO pranamac;

--
-- TOC entry 215 (class 1259 OID 16560)
-- Name: berita_id_berita_seq; Type: SEQUENCE; Schema: public; Owner: pranamac
--

CREATE SEQUENCE public.berita_id_berita_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.berita_id_berita_seq OWNER TO pranamac;

--
-- TOC entry 3899 (class 0 OID 0)
-- Dependencies: 215
-- Name: berita_id_berita_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: pranamac
--

ALTER SEQUENCE public.berita_id_berita_seq OWNED BY public.berita.id_berita;


--
-- TOC entry 224 (class 1259 OID 16613)
-- Name: form; Type: TABLE; Schema: public; Owner: pranamac
--

CREATE TABLE public.form (
    id_form integer NOT NULL,
    nama character varying(255),
    email character varying(255),
    pesan text,
    id_visitor integer
);


ALTER TABLE public.form OWNER TO pranamac;

--
-- TOC entry 223 (class 1259 OID 16612)
-- Name: form_id_form_seq; Type: SEQUENCE; Schema: public; Owner: pranamac
--

CREATE SEQUENCE public.form_id_form_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.form_id_form_seq OWNER TO pranamac;

--
-- TOC entry 3900 (class 0 OID 0)
-- Dependencies: 223
-- Name: form_id_form_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: pranamac
--

ALTER SEQUENCE public.form_id_form_seq OWNED BY public.form.id_form;


--
-- TOC entry 214 (class 1259 OID 16546)
-- Name: galeri; Type: TABLE; Schema: public; Owner: pranamac
--

CREATE TABLE public.galeri (
    id_galeri integer NOT NULL,
    judul character varying(255),
    deskripsi text,
    foto character varying(255),
    tanggal_publikasi timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    video_embed character varying(255),
    id_admin integer
);


ALTER TABLE public.galeri OWNER TO pranamac;

--
-- TOC entry 213 (class 1259 OID 16545)
-- Name: galeri_id_galeri_seq; Type: SEQUENCE; Schema: public; Owner: pranamac
--

CREATE SEQUENCE public.galeri_id_galeri_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.galeri_id_galeri_seq OWNER TO pranamac;

--
-- TOC entry 3901 (class 0 OID 0)
-- Dependencies: 213
-- Name: galeri_id_galeri_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: pranamac
--

ALTER SEQUENCE public.galeri_id_galeri_seq OWNED BY public.galeri.id_galeri;


--
-- TOC entry 220 (class 1259 OID 16590)
-- Name: riset; Type: TABLE; Schema: public; Owner: pranamac
--

CREATE TABLE public.riset (
    id_riset integer NOT NULL,
    judul_riset character varying(255),
    deskripsi text,
    peneliti character varying(255),
    tanggal_publikasi date,
    file_dokumen character varying(255),
    video_embed character varying(255),
    id_admin integer
);


ALTER TABLE public.riset OWNER TO pranamac;

--
-- TOC entry 219 (class 1259 OID 16589)
-- Name: riset_id_riset_seq; Type: SEQUENCE; Schema: public; Owner: pranamac
--

CREATE SEQUENCE public.riset_id_riset_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.riset_id_riset_seq OWNER TO pranamac;

--
-- TOC entry 3902 (class 0 OID 0)
-- Dependencies: 219
-- Name: riset_id_riset_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: pranamac
--

ALTER SEQUENCE public.riset_id_riset_seq OWNED BY public.riset.id_riset;


--
-- TOC entry 210 (class 1259 OID 16515)
-- Name: super_admin; Type: TABLE; Schema: public; Owner: pranamac
--

CREATE TABLE public.super_admin (
    id_super_admin integer NOT NULL,
    name character varying(255),
    email character varying(255) NOT NULL,
    username character varying(100) NOT NULL,
    password_hash character varying(255) NOT NULL
);


ALTER TABLE public.super_admin OWNER TO pranamac;

--
-- TOC entry 209 (class 1259 OID 16514)
-- Name: super_admin_id_super_admin_seq; Type: SEQUENCE; Schema: public; Owner: pranamac
--

CREATE SEQUENCE public.super_admin_id_super_admin_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.super_admin_id_super_admin_seq OWNER TO pranamac;

--
-- TOC entry 3903 (class 0 OID 0)
-- Dependencies: 209
-- Name: super_admin_id_super_admin_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: pranamac
--

ALTER SEQUENCE public.super_admin_id_super_admin_seq OWNED BY public.super_admin.id_super_admin;


--
-- TOC entry 222 (class 1259 OID 16604)
-- Name: visitor; Type: TABLE; Schema: public; Owner: pranamac
--

CREATE TABLE public.visitor (
    id_visitor integer NOT NULL,
    ip_address character varying(45),
    waktu_akses timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    status_online boolean DEFAULT true
);


ALTER TABLE public.visitor OWNER TO pranamac;

--
-- TOC entry 221 (class 1259 OID 16603)
-- Name: visitor_id_visitor_seq; Type: SEQUENCE; Schema: public; Owner: pranamac
--

CREATE SEQUENCE public.visitor_id_visitor_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.visitor_id_visitor_seq OWNER TO pranamac;

--
-- TOC entry 3904 (class 0 OID 0)
-- Dependencies: 221
-- Name: visitor_id_visitor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: pranamac
--

ALTER SEQUENCE public.visitor_id_visitor_seq OWNED BY public.visitor.id_visitor;


--
-- TOC entry 3696 (class 2604 OID 16531)
-- Name: admin id_admin; Type: DEFAULT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.admin ALTER COLUMN id_admin SET DEFAULT nextval('public.admin_id_admin_seq'::regclass);


--
-- TOC entry 3701 (class 2604 OID 16579)
-- Name: anggota_lab id_anggota; Type: DEFAULT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.anggota_lab ALTER COLUMN id_anggota SET DEFAULT nextval('public.anggota_lab_id_anggota_seq'::regclass);


--
-- TOC entry 3699 (class 2604 OID 16564)
-- Name: berita id_berita; Type: DEFAULT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.berita ALTER COLUMN id_berita SET DEFAULT nextval('public.berita_id_berita_seq'::regclass);


--
-- TOC entry 3706 (class 2604 OID 16616)
-- Name: form id_form; Type: DEFAULT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.form ALTER COLUMN id_form SET DEFAULT nextval('public.form_id_form_seq'::regclass);


--
-- TOC entry 3697 (class 2604 OID 16549)
-- Name: galeri id_galeri; Type: DEFAULT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.galeri ALTER COLUMN id_galeri SET DEFAULT nextval('public.galeri_id_galeri_seq'::regclass);


--
-- TOC entry 3702 (class 2604 OID 16593)
-- Name: riset id_riset; Type: DEFAULT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.riset ALTER COLUMN id_riset SET DEFAULT nextval('public.riset_id_riset_seq'::regclass);


--
-- TOC entry 3695 (class 2604 OID 16518)
-- Name: super_admin id_super_admin; Type: DEFAULT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.super_admin ALTER COLUMN id_super_admin SET DEFAULT nextval('public.super_admin_id_super_admin_seq'::regclass);


--
-- TOC entry 3703 (class 2604 OID 16607)
-- Name: visitor id_visitor; Type: DEFAULT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.visitor ALTER COLUMN id_visitor SET DEFAULT nextval('public.visitor_id_visitor_seq'::regclass);


--
-- TOC entry 3879 (class 0 OID 16528)
-- Dependencies: 212
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: pranamac
--

COPY public.admin (id_admin, nama, email, username, password_hash, id_super_admin) FROM stdin;
\.


--
-- TOC entry 3885 (class 0 OID 16576)
-- Dependencies: 218
-- Data for Name: anggota_lab; Type: TABLE DATA; Schema: public; Owner: pranamac
--

COPY public.anggota_lab (id_anggota, nama, jabatan, kontak, email, foto, id_admin) FROM stdin;
\.


--
-- TOC entry 3883 (class 0 OID 16561)
-- Dependencies: 216
-- Data for Name: berita; Type: TABLE DATA; Schema: public; Owner: pranamac
--

COPY public.berita (id_berita, judul, isi, tanggal_publikasi, video_embed, id_admin) FROM stdin;
\.


--
-- TOC entry 3891 (class 0 OID 16613)
-- Dependencies: 224
-- Data for Name: form; Type: TABLE DATA; Schema: public; Owner: pranamac
--

COPY public.form (id_form, nama, email, pesan, id_visitor) FROM stdin;
\.


--
-- TOC entry 3881 (class 0 OID 16546)
-- Dependencies: 214
-- Data for Name: galeri; Type: TABLE DATA; Schema: public; Owner: pranamac
--

COPY public.galeri (id_galeri, judul, deskripsi, foto, tanggal_publikasi, video_embed, id_admin) FROM stdin;
\.


--
-- TOC entry 3887 (class 0 OID 16590)
-- Dependencies: 220
-- Data for Name: riset; Type: TABLE DATA; Schema: public; Owner: pranamac
--

COPY public.riset (id_riset, judul_riset, deskripsi, peneliti, tanggal_publikasi, file_dokumen, video_embed, id_admin) FROM stdin;
\.


--
-- TOC entry 3877 (class 0 OID 16515)
-- Dependencies: 210
-- Data for Name: super_admin; Type: TABLE DATA; Schema: public; Owner: pranamac
--

COPY public.super_admin (id_super_admin, name, email, username, password_hash) FROM stdin;
\.


--
-- TOC entry 3889 (class 0 OID 16604)
-- Dependencies: 222
-- Data for Name: visitor; Type: TABLE DATA; Schema: public; Owner: pranamac
--

COPY public.visitor (id_visitor, ip_address, waktu_akses, status_online) FROM stdin;
\.


--
-- TOC entry 3905 (class 0 OID 0)
-- Dependencies: 211
-- Name: admin_id_admin_seq; Type: SEQUENCE SET; Schema: public; Owner: pranamac
--

SELECT pg_catalog.setval('public.admin_id_admin_seq', 1, false);


--
-- TOC entry 3906 (class 0 OID 0)
-- Dependencies: 217
-- Name: anggota_lab_id_anggota_seq; Type: SEQUENCE SET; Schema: public; Owner: pranamac
--

SELECT pg_catalog.setval('public.anggota_lab_id_anggota_seq', 1, false);


--
-- TOC entry 3907 (class 0 OID 0)
-- Dependencies: 215
-- Name: berita_id_berita_seq; Type: SEQUENCE SET; Schema: public; Owner: pranamac
--

SELECT pg_catalog.setval('public.berita_id_berita_seq', 1, false);


--
-- TOC entry 3908 (class 0 OID 0)
-- Dependencies: 223
-- Name: form_id_form_seq; Type: SEQUENCE SET; Schema: public; Owner: pranamac
--

SELECT pg_catalog.setval('public.form_id_form_seq', 1, false);


--
-- TOC entry 3909 (class 0 OID 0)
-- Dependencies: 213
-- Name: galeri_id_galeri_seq; Type: SEQUENCE SET; Schema: public; Owner: pranamac
--

SELECT pg_catalog.setval('public.galeri_id_galeri_seq', 1, false);


--
-- TOC entry 3910 (class 0 OID 0)
-- Dependencies: 219
-- Name: riset_id_riset_seq; Type: SEQUENCE SET; Schema: public; Owner: pranamac
--

SELECT pg_catalog.setval('public.riset_id_riset_seq', 1, false);


--
-- TOC entry 3911 (class 0 OID 0)
-- Dependencies: 209
-- Name: super_admin_id_super_admin_seq; Type: SEQUENCE SET; Schema: public; Owner: pranamac
--

SELECT pg_catalog.setval('public.super_admin_id_super_admin_seq', 1, false);


--
-- TOC entry 3912 (class 0 OID 0)
-- Dependencies: 221
-- Name: visitor_id_visitor_seq; Type: SEQUENCE SET; Schema: public; Owner: pranamac
--

SELECT pg_catalog.setval('public.visitor_id_visitor_seq', 1, false);


--
-- TOC entry 3714 (class 2606 OID 16537)
-- Name: admin admin_email_key; Type: CONSTRAINT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_email_key UNIQUE (email);


--
-- TOC entry 3716 (class 2606 OID 16535)
-- Name: admin admin_pkey; Type: CONSTRAINT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_pkey PRIMARY KEY (id_admin);


--
-- TOC entry 3718 (class 2606 OID 16539)
-- Name: admin admin_username_key; Type: CONSTRAINT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_username_key UNIQUE (username);


--
-- TOC entry 3724 (class 2606 OID 16583)
-- Name: anggota_lab anggota_lab_pkey; Type: CONSTRAINT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.anggota_lab
    ADD CONSTRAINT anggota_lab_pkey PRIMARY KEY (id_anggota);


--
-- TOC entry 3722 (class 2606 OID 16569)
-- Name: berita berita_pkey; Type: CONSTRAINT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.berita
    ADD CONSTRAINT berita_pkey PRIMARY KEY (id_berita);


--
-- TOC entry 3730 (class 2606 OID 16620)
-- Name: form form_pkey; Type: CONSTRAINT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.form
    ADD CONSTRAINT form_pkey PRIMARY KEY (id_form);


--
-- TOC entry 3720 (class 2606 OID 16554)
-- Name: galeri galeri_pkey; Type: CONSTRAINT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.galeri
    ADD CONSTRAINT galeri_pkey PRIMARY KEY (id_galeri);


--
-- TOC entry 3726 (class 2606 OID 16597)
-- Name: riset riset_pkey; Type: CONSTRAINT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.riset
    ADD CONSTRAINT riset_pkey PRIMARY KEY (id_riset);


--
-- TOC entry 3708 (class 2606 OID 16524)
-- Name: super_admin super_admin_email_key; Type: CONSTRAINT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.super_admin
    ADD CONSTRAINT super_admin_email_key UNIQUE (email);


--
-- TOC entry 3710 (class 2606 OID 16522)
-- Name: super_admin super_admin_pkey; Type: CONSTRAINT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.super_admin
    ADD CONSTRAINT super_admin_pkey PRIMARY KEY (id_super_admin);


--
-- TOC entry 3712 (class 2606 OID 16526)
-- Name: super_admin super_admin_username_key; Type: CONSTRAINT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.super_admin
    ADD CONSTRAINT super_admin_username_key UNIQUE (username);


--
-- TOC entry 3728 (class 2606 OID 16611)
-- Name: visitor visitor_pkey; Type: CONSTRAINT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.visitor
    ADD CONSTRAINT visitor_pkey PRIMARY KEY (id_visitor);


--
-- TOC entry 3731 (class 2606 OID 16540)
-- Name: admin admin_id_super_admin_fkey; Type: FK CONSTRAINT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_id_super_admin_fkey FOREIGN KEY (id_super_admin) REFERENCES public.super_admin(id_super_admin);


--
-- TOC entry 3734 (class 2606 OID 16584)
-- Name: anggota_lab anggota_lab_id_admin_fkey; Type: FK CONSTRAINT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.anggota_lab
    ADD CONSTRAINT anggota_lab_id_admin_fkey FOREIGN KEY (id_admin) REFERENCES public.admin(id_admin);


--
-- TOC entry 3733 (class 2606 OID 16570)
-- Name: berita berita_id_admin_fkey; Type: FK CONSTRAINT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.berita
    ADD CONSTRAINT berita_id_admin_fkey FOREIGN KEY (id_admin) REFERENCES public.admin(id_admin);


--
-- TOC entry 3736 (class 2606 OID 16621)
-- Name: form form_id_visitor_fkey; Type: FK CONSTRAINT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.form
    ADD CONSTRAINT form_id_visitor_fkey FOREIGN KEY (id_visitor) REFERENCES public.visitor(id_visitor);


--
-- TOC entry 3732 (class 2606 OID 16555)
-- Name: galeri galeri_id_admin_fkey; Type: FK CONSTRAINT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.galeri
    ADD CONSTRAINT galeri_id_admin_fkey FOREIGN KEY (id_admin) REFERENCES public.admin(id_admin);


--
-- TOC entry 3735 (class 2606 OID 16598)
-- Name: riset riset_id_admin_fkey; Type: FK CONSTRAINT; Schema: public; Owner: pranamac
--

ALTER TABLE ONLY public.riset
    ADD CONSTRAINT riset_id_admin_fkey FOREIGN KEY (id_admin) REFERENCES public.admin(id_admin);


-- Completed on 2025-11-18 11:32:36 WIB

--
-- PostgreSQL database dump complete
--

\unrestrict 9asA3OE22wPtypnjRhOph2IexvmxSGrfty2h247Uyw2ufKPlCZdKN8DBkxEf7Zm

