--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.2
-- Dumped by pg_dump version 9.6.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

SET search_path = public, pg_catalog;

ALTER TABLE IF EXISTS ONLY public.uploadables DROP CONSTRAINT IF EXISTS uploadables_file_id_foreign;
ALTER TABLE IF EXISTS ONLY public.routes DROP CONSTRAINT IF EXISTS routes_language_code_foreign;
ALTER TABLE IF EXISTS ONLY public.options DROP CONSTRAINT IF EXISTS options_category_key_foreign;
ALTER TABLE IF EXISTS ONLY public.files DROP CONSTRAINT IF EXISTS files_type_id_foreign;
ALTER TABLE IF EXISTS ONLY public.files DROP CONSTRAINT IF EXISTS files_author_id_foreign;
ALTER TABLE IF EXISTS ONLY public.file_translations DROP CONSTRAINT IF EXISTS file_translations_language_code_foreign;
ALTER TABLE IF EXISTS ONLY public.file_translations DROP CONSTRAINT IF EXISTS file_translations_file_id_foreign;
ALTER TABLE IF EXISTS ONLY public.file_translations DROP CONSTRAINT IF EXISTS file_translations_author_id_foreign;
ALTER TABLE IF EXISTS ONLY public.contents DROP CONSTRAINT IF EXISTS contents_type_id_foreign;
ALTER TABLE IF EXISTS ONLY public.contents DROP CONSTRAINT IF EXISTS contents_thumb_id_foreign;
ALTER TABLE IF EXISTS ONLY public.contents DROP CONSTRAINT IF EXISTS contents_parent_id_foreign;
ALTER TABLE IF EXISTS ONLY public.contents DROP CONSTRAINT IF EXISTS contents_author_id_foreign;
ALTER TABLE IF EXISTS ONLY public.content_translations DROP CONSTRAINT IF EXISTS content_translations_language_code_foreign;
ALTER TABLE IF EXISTS ONLY public.content_translations DROP CONSTRAINT IF EXISTS content_translations_content_id_foreign;
ALTER TABLE IF EXISTS ONLY public.content_translations DROP CONSTRAINT IF EXISTS content_translations_author_id_foreign;
ALTER TABLE IF EXISTS ONLY public.blocks DROP CONSTRAINT IF EXISTS blocks_type_id_foreign;
ALTER TABLE IF EXISTS ONLY public.blocks DROP CONSTRAINT IF EXISTS blocks_author_id_foreign;
ALTER TABLE IF EXISTS ONLY public.block_translations DROP CONSTRAINT IF EXISTS block_translations_language_code_foreign;
ALTER TABLE IF EXISTS ONLY public.block_translations DROP CONSTRAINT IF EXISTS block_translations_block_id_foreign;
ALTER TABLE IF EXISTS ONLY public.acl_user_role DROP CONSTRAINT IF EXISTS acl_user_role_user_id_foreign;
ALTER TABLE IF EXISTS ONLY public.acl_user_role DROP CONSTRAINT IF EXISTS acl_user_role_role_id_foreign;
ALTER TABLE IF EXISTS ONLY public.acl_permission_role DROP CONSTRAINT IF EXISTS acl_permission_role_role_id_foreign;
ALTER TABLE IF EXISTS ONLY public.acl_permission_role DROP CONSTRAINT IF EXISTS acl_permission_role_permission_id_foreign;
DROP INDEX IF EXISTS public.uploadables_file_id_index;
DROP INDEX IF EXISTS public.routes_path_index;
DROP INDEX IF EXISTS public.password_resets_email_index;
DROP INDEX IF EXISTS public.options_category_key_key_index;
DROP INDEX IF EXISTS public.oauth_refresh_tokens_access_token_id_index;
DROP INDEX IF EXISTS public.oauth_personal_access_clients_client_id_index;
DROP INDEX IF EXISTS public.oauth_clients_user_id_index;
DROP INDEX IF EXISTS public.oauth_access_tokens_user_id_index;
DROP INDEX IF EXISTS public.contents_path_level_index;
DROP INDEX IF EXISTS public.blocks_type_id_blockable_type_index;
DROP INDEX IF EXISTS public.acl_user_role_user_id_index;
DROP INDEX IF EXISTS public.acl_user_role_role_id_index;
DROP INDEX IF EXISTS public.acl_permission_role_role_id_index;
DROP INDEX IF EXISTS public.acl_permission_role_permission_id_index;
ALTER TABLE IF EXISTS ONLY public.users DROP CONSTRAINT IF EXISTS users_pkey;
ALTER TABLE IF EXISTS ONLY public.users DROP CONSTRAINT IF EXISTS users_name_unique;
ALTER TABLE IF EXISTS ONLY public.users DROP CONSTRAINT IF EXISTS users_email_unique;
ALTER TABLE IF EXISTS ONLY public.routes DROP CONSTRAINT IF EXISTS routes_pkey;
ALTER TABLE IF EXISTS ONLY public.routes DROP CONSTRAINT IF EXISTS routes_language_code_path_unique;
ALTER TABLE IF EXISTS ONLY public.options DROP CONSTRAINT IF EXISTS options_pkey;
ALTER TABLE IF EXISTS ONLY public.option_categories DROP CONSTRAINT IF EXISTS option_categories_pkey;
ALTER TABLE IF EXISTS ONLY public.oauth_refresh_tokens DROP CONSTRAINT IF EXISTS oauth_refresh_tokens_pkey;
ALTER TABLE IF EXISTS ONLY public.oauth_personal_access_clients DROP CONSTRAINT IF EXISTS oauth_personal_access_clients_pkey;
ALTER TABLE IF EXISTS ONLY public.oauth_clients DROP CONSTRAINT IF EXISTS oauth_clients_pkey;
ALTER TABLE IF EXISTS ONLY public.oauth_auth_codes DROP CONSTRAINT IF EXISTS oauth_auth_codes_pkey;
ALTER TABLE IF EXISTS ONLY public.oauth_access_tokens DROP CONSTRAINT IF EXISTS oauth_access_tokens_pkey;
ALTER TABLE IF EXISTS ONLY public.migrations DROP CONSTRAINT IF EXISTS migrations_pkey;
ALTER TABLE IF EXISTS ONLY public.languages DROP CONSTRAINT IF EXISTS languages_pkey;
ALTER TABLE IF EXISTS ONLY public.files DROP CONSTRAINT IF EXISTS files_pkey;
ALTER TABLE IF EXISTS ONLY public.file_types DROP CONSTRAINT IF EXISTS file_types_pkey;
ALTER TABLE IF EXISTS ONLY public.file_types DROP CONSTRAINT IF EXISTS file_types_name_unique;
ALTER TABLE IF EXISTS ONLY public.file_translations DROP CONSTRAINT IF EXISTS file_translations_pkey;
ALTER TABLE IF EXISTS ONLY public.file_translations DROP CONSTRAINT IF EXISTS file_translations_file_id_language_code_unique;
ALTER TABLE IF EXISTS ONLY public.failed_jobs DROP CONSTRAINT IF EXISTS failed_jobs_pkey;
ALTER TABLE IF EXISTS ONLY public.contents DROP CONSTRAINT IF EXISTS contents_pkey;
ALTER TABLE IF EXISTS ONLY public.content_types DROP CONSTRAINT IF EXISTS content_types_pkey;
ALTER TABLE IF EXISTS ONLY public.content_types DROP CONSTRAINT IF EXISTS content_types_name_unique;
ALTER TABLE IF EXISTS ONLY public.content_translations DROP CONSTRAINT IF EXISTS content_translations_pkey;
ALTER TABLE IF EXISTS ONLY public.blocks DROP CONSTRAINT IF EXISTS blocks_pkey;
ALTER TABLE IF EXISTS ONLY public.block_types DROP CONSTRAINT IF EXISTS block_types_pkey;
ALTER TABLE IF EXISTS ONLY public.block_types DROP CONSTRAINT IF EXISTS block_types_name_unique;
ALTER TABLE IF EXISTS ONLY public.block_translations DROP CONSTRAINT IF EXISTS block_translations_pkey;
ALTER TABLE IF EXISTS ONLY public.acl_roles DROP CONSTRAINT IF EXISTS acl_roles_pkey;
ALTER TABLE IF EXISTS ONLY public.acl_roles DROP CONSTRAINT IF EXISTS acl_roles_name_unique;
ALTER TABLE IF EXISTS ONLY public.acl_permissions DROP CONSTRAINT IF EXISTS acl_permissions_pkey;
ALTER TABLE IF EXISTS ONLY public.acl_permissions DROP CONSTRAINT IF EXISTS acl_permissions_name_unique;
ALTER TABLE IF EXISTS public.users ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.routes ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.options ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.oauth_personal_access_clients ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.oauth_clients ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.migrations ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.files ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.file_types ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.file_translations ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.failed_jobs ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.contents ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.content_types ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.content_translations ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.blocks ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.block_types ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.block_translations ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.acl_roles ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.acl_permissions ALTER COLUMN id DROP DEFAULT;
DROP SEQUENCE IF EXISTS public.users_id_seq;
DROP TABLE IF EXISTS public.users;
DROP TABLE IF EXISTS public.uploadables;
DROP SEQUENCE IF EXISTS public.routes_id_seq;
DROP TABLE IF EXISTS public.routes;
DROP TABLE IF EXISTS public.password_resets;
DROP SEQUENCE IF EXISTS public.options_id_seq;
DROP TABLE IF EXISTS public.options;
DROP TABLE IF EXISTS public.option_categories;
DROP TABLE IF EXISTS public.oauth_refresh_tokens;
DROP SEQUENCE IF EXISTS public.oauth_personal_access_clients_id_seq;
DROP TABLE IF EXISTS public.oauth_personal_access_clients;
DROP SEQUENCE IF EXISTS public.oauth_clients_id_seq;
DROP TABLE IF EXISTS public.oauth_clients;
DROP TABLE IF EXISTS public.oauth_auth_codes;
DROP TABLE IF EXISTS public.oauth_access_tokens;
DROP SEQUENCE IF EXISTS public.migrations_id_seq;
DROP TABLE IF EXISTS public.migrations;
DROP TABLE IF EXISTS public.languages;
DROP SEQUENCE IF EXISTS public.files_id_seq;
DROP TABLE IF EXISTS public.files;
DROP SEQUENCE IF EXISTS public.file_types_id_seq;
DROP TABLE IF EXISTS public.file_types;
DROP SEQUENCE IF EXISTS public.file_translations_id_seq;
DROP TABLE IF EXISTS public.file_translations;
DROP SEQUENCE IF EXISTS public.failed_jobs_id_seq;
DROP TABLE IF EXISTS public.failed_jobs;
DROP SEQUENCE IF EXISTS public.contents_id_seq;
DROP TABLE IF EXISTS public.contents;
DROP SEQUENCE IF EXISTS public.content_types_id_seq;
DROP TABLE IF EXISTS public.content_types;
DROP SEQUENCE IF EXISTS public.content_translations_id_seq;
DROP TABLE IF EXISTS public.content_translations;
DROP SEQUENCE IF EXISTS public.blocks_id_seq;
DROP TABLE IF EXISTS public.blocks;
DROP SEQUENCE IF EXISTS public.block_types_id_seq;
DROP TABLE IF EXISTS public.block_types;
DROP SEQUENCE IF EXISTS public.block_translations_id_seq;
DROP TABLE IF EXISTS public.block_translations;
DROP TABLE IF EXISTS public.acl_user_role;
DROP SEQUENCE IF EXISTS public.acl_roles_id_seq;
DROP TABLE IF EXISTS public.acl_roles;
DROP SEQUENCE IF EXISTS public.acl_permissions_id_seq;
DROP TABLE IF EXISTS public.acl_permissions;
DROP TABLE IF EXISTS public.acl_permission_role;
DROP SCHEMA IF EXISTS public;
--
-- Name: public; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA public;


--
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON SCHEMA public IS 'standard public schema';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: acl_permission_role; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE acl_permission_role (
    permission_id integer NOT NULL,
    role_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: acl_permissions; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE acl_permissions (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    category character varying(255) NOT NULL,
    is_core boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: acl_permissions_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE acl_permissions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: acl_permissions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE acl_permissions_id_seq OWNED BY acl_permissions.id;


--
-- Name: acl_roles; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE acl_roles (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: acl_roles_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE acl_roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: acl_roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE acl_roles_id_seq OWNED BY acl_roles.id;


--
-- Name: acl_user_role; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE acl_user_role (
    user_id integer NOT NULL,
    role_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: block_translations; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE block_translations (
    id integer NOT NULL,
    language_code character varying(2) NOT NULL,
    block_id integer NOT NULL,
    author_id integer,
    title character varying(255) NOT NULL,
    body text,
    custom_fields text,
    is_active boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: block_translations_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE block_translations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: block_translations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE block_translations_id_seq OWNED BY block_translations.id;


--
-- Name: block_types; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE block_types (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    handler character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: block_types_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE block_types_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: block_types_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE block_types_id_seq OWNED BY block_types.id;


--
-- Name: blocks; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE blocks (
    id integer NOT NULL,
    type_id integer,
    region character varying(255),
    theme character varying(255),
    blockable_type character varying(255),
    author_id integer,
    filter text,
    options text,
    weight integer DEFAULT 0 NOT NULL,
    is_active boolean DEFAULT false NOT NULL,
    is_cacheable boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


--
-- Name: blocks_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE blocks_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: blocks_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE blocks_id_seq OWNED BY blocks.id;


--
-- Name: content_translations; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE content_translations (
    id integer NOT NULL,
    language_code character varying(2) NOT NULL,
    content_id integer NOT NULL,
    author_id integer,
    title character varying(255),
    teaser text,
    body text,
    seo_title character varying(255),
    seo_description character varying(255),
    is_active boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: content_translations_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE content_translations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: content_translations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE content_translations_id_seq OWNED BY content_translations.id;


--
-- Name: content_types; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE content_types (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    handler character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: content_types_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE content_types_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: content_types_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE content_types_id_seq OWNED BY content_types.id;


--
-- Name: contents; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE contents (
    id integer NOT NULL,
    type_id integer,
    theme character varying(255),
    author_id integer,
    path character varying(255),
    parent_id integer,
    level integer DEFAULT 0 NOT NULL,
    weight integer DEFAULT 0 NOT NULL,
    rating integer DEFAULT 0 NOT NULL,
    is_on_home boolean DEFAULT false NOT NULL,
    is_comment_allowed boolean DEFAULT false NOT NULL,
    is_promoted boolean DEFAULT false NOT NULL,
    is_sticky boolean DEFAULT false NOT NULL,
    published_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    thumb_id integer
);


--
-- Name: contents_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE contents_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: contents_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE contents_id_seq OWNED BY contents.id;


--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE failed_jobs (
    id bigint NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT now() NOT NULL
);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE failed_jobs_id_seq OWNED BY failed_jobs.id;


--
-- Name: file_translations; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE file_translations (
    id integer NOT NULL,
    language_code character varying(2) NOT NULL,
    file_id integer NOT NULL,
    author_id integer,
    title character varying(255),
    description text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: file_translations_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE file_translations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: file_translations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE file_translations_id_seq OWNED BY file_translations.id;


--
-- Name: file_types; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE file_types (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: file_types_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE file_types_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: file_types_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE file_types_id_seq OWNED BY file_types.id;


--
-- Name: files; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE files (
    id integer NOT NULL,
    type_id integer,
    name character varying(255) NOT NULL,
    extension character varying(255) NOT NULL,
    size integer NOT NULL,
    mime_type character varying(255) NOT NULL,
    info text,
    author_id integer,
    is_active boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: files_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE files_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: files_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE files_id_seq OWNED BY files.id;


--
-- Name: languages; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE languages (
    code character varying(2) NOT NULL,
    i18n character varying(5) NOT NULL,
    is_enabled boolean DEFAULT false NOT NULL,
    is_default boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE migrations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE migrations_id_seq OWNED BY migrations.id;


--
-- Name: oauth_access_tokens; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE oauth_access_tokens (
    id character varying(100) NOT NULL,
    user_id integer,
    client_id integer NOT NULL,
    name character varying(255),
    scopes text,
    revoked boolean NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone
);


--
-- Name: oauth_auth_codes; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE oauth_auth_codes (
    id character varying(100) NOT NULL,
    user_id integer NOT NULL,
    client_id integer NOT NULL,
    scopes text,
    revoked boolean NOT NULL,
    expires_at timestamp(0) without time zone
);


--
-- Name: oauth_clients; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE oauth_clients (
    id integer NOT NULL,
    user_id integer,
    name character varying(255) NOT NULL,
    secret character varying(100) NOT NULL,
    redirect text NOT NULL,
    personal_access_client boolean NOT NULL,
    password_client boolean NOT NULL,
    revoked boolean NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: oauth_clients_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE oauth_clients_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: oauth_clients_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE oauth_clients_id_seq OWNED BY oauth_clients.id;


--
-- Name: oauth_personal_access_clients; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE oauth_personal_access_clients (
    id integer NOT NULL,
    client_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: oauth_personal_access_clients_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE oauth_personal_access_clients_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: oauth_personal_access_clients_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE oauth_personal_access_clients_id_seq OWNED BY oauth_personal_access_clients.id;


--
-- Name: oauth_refresh_tokens; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE oauth_refresh_tokens (
    id character varying(100) NOT NULL,
    access_token_id character varying(100) NOT NULL,
    revoked boolean NOT NULL,
    expires_at timestamp(0) without time zone
);


--
-- Name: option_categories; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE option_categories (
    key character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: options; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE options (
    id integer NOT NULL,
    key character varying(255) NOT NULL,
    category_key character varying(255) NOT NULL,
    value text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: options_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE options_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: options_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE options_id_seq OWNED BY options.id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


--
-- Name: routes; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE routes (
    id integer NOT NULL,
    language_code character varying(2) NOT NULL,
    path character varying(255) NOT NULL,
    routable_id integer,
    routable_type character varying(255),
    is_active boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: routes_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE routes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: routes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE routes_id_seq OWNED BY routes.id;


--
-- Name: uploadables; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE uploadables (
    file_id integer NOT NULL,
    uploadable_id integer NOT NULL,
    uploadable_type character varying(255) NOT NULL,
    weight integer DEFAULT 0 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: users; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE users (
    id integer NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    name character varying(255),
    first_name character varying(255),
    last_name character varying(255),
    is_admin boolean DEFAULT false NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: acl_permissions id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY acl_permissions ALTER COLUMN id SET DEFAULT nextval('acl_permissions_id_seq'::regclass);


--
-- Name: acl_roles id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY acl_roles ALTER COLUMN id SET DEFAULT nextval('acl_roles_id_seq'::regclass);


--
-- Name: block_translations id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY block_translations ALTER COLUMN id SET DEFAULT nextval('block_translations_id_seq'::regclass);


--
-- Name: block_types id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY block_types ALTER COLUMN id SET DEFAULT nextval('block_types_id_seq'::regclass);


--
-- Name: blocks id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY blocks ALTER COLUMN id SET DEFAULT nextval('blocks_id_seq'::regclass);


--
-- Name: content_translations id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY content_translations ALTER COLUMN id SET DEFAULT nextval('content_translations_id_seq'::regclass);


--
-- Name: content_types id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY content_types ALTER COLUMN id SET DEFAULT nextval('content_types_id_seq'::regclass);


--
-- Name: contents id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY contents ALTER COLUMN id SET DEFAULT nextval('contents_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY failed_jobs ALTER COLUMN id SET DEFAULT nextval('failed_jobs_id_seq'::regclass);


--
-- Name: file_translations id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY file_translations ALTER COLUMN id SET DEFAULT nextval('file_translations_id_seq'::regclass);


--
-- Name: file_types id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY file_types ALTER COLUMN id SET DEFAULT nextval('file_types_id_seq'::regclass);


--
-- Name: files id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY files ALTER COLUMN id SET DEFAULT nextval('files_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY migrations ALTER COLUMN id SET DEFAULT nextval('migrations_id_seq'::regclass);


--
-- Name: oauth_clients id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY oauth_clients ALTER COLUMN id SET DEFAULT nextval('oauth_clients_id_seq'::regclass);


--
-- Name: oauth_personal_access_clients id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY oauth_personal_access_clients ALTER COLUMN id SET DEFAULT nextval('oauth_personal_access_clients_id_seq'::regclass);


--
-- Name: options id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY options ALTER COLUMN id SET DEFAULT nextval('options_id_seq'::regclass);


--
-- Name: routes id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY routes ALTER COLUMN id SET DEFAULT nextval('routes_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: acl_permission_role; Type: TABLE DATA; Schema: public; Owner: -
--

COPY acl_permission_role (permission_id, role_id, created_at, updated_at) FROM stdin;
1	1	2018-01-02 15:55:30	2018-01-02 15:55:30
2	1	2018-01-02 15:55:30	2018-01-02 15:55:30
3	1	2018-01-02 15:55:30	2018-01-02 15:55:30
4	1	2018-01-02 15:55:30	2018-01-02 15:55:30
5	1	2018-01-02 15:55:30	2018-01-02 15:55:30
6	1	2018-01-02 15:55:30	2018-01-02 15:55:30
7	1	2018-01-02 15:55:30	2018-01-02 15:55:30
8	1	2018-01-02 15:55:30	2018-01-02 15:55:30
9	1	2018-01-02 15:55:30	2018-01-02 15:55:30
10	1	2018-01-02 15:55:30	2018-01-02 15:55:30
11	1	2018-01-02 15:55:30	2018-01-02 15:55:30
12	1	2018-01-02 15:55:30	2018-01-02 15:55:30
13	1	2018-01-02 15:55:30	2018-01-02 15:55:30
14	1	2018-01-02 15:55:30	2018-01-02 15:55:30
15	1	2018-01-02 15:55:30	2018-01-02 15:55:30
16	1	2018-01-02 15:55:30	2018-01-02 15:55:30
17	1	2018-01-02 15:55:30	2018-01-02 15:55:30
18	1	2018-01-02 15:55:30	2018-01-02 15:55:30
19	1	2018-01-02 15:55:30	2018-01-02 15:55:30
20	1	2018-01-02 15:55:30	2018-01-02 15:55:30
21	1	2018-01-02 15:55:30	2018-01-02 15:55:30
22	1	2018-01-02 15:55:30	2018-01-02 15:55:30
23	1	2018-01-02 15:55:30	2018-01-02 15:55:30
24	1	2018-01-02 15:55:30	2018-01-02 15:55:30
1	2	2018-01-02 15:55:30	2018-01-02 15:55:30
2	2	2018-01-02 15:55:30	2018-01-02 15:55:30
3	2	2018-01-02 15:55:30	2018-01-02 15:55:30
4	2	2018-01-02 15:55:30	2018-01-02 15:55:30
5	2	2018-01-02 15:55:30	2018-01-02 15:55:30
6	2	2018-01-02 15:55:30	2018-01-02 15:55:30
7	2	2018-01-02 15:55:30	2018-01-02 15:55:30
8	2	2018-01-02 15:55:30	2018-01-02 15:55:30
9	2	2018-01-02 15:55:30	2018-01-02 15:55:30
14	2	2018-01-02 15:55:30	2018-01-02 15:55:30
15	2	2018-01-02 15:55:30	2018-01-02 15:55:30
16	2	2018-01-02 15:55:30	2018-01-02 15:55:30
17	2	2018-01-02 15:55:30	2018-01-02 15:55:30
\.


--
-- Data for Name: acl_permissions; Type: TABLE DATA; Schema: public; Owner: -
--

COPY acl_permissions (id, name, category, is_core, created_at, updated_at) FROM stdin;
1	admin-access	general	f	\N	\N
2	content-create	content	f	\N	\N
3	content-read	content	f	\N	\N
4	content-update	content	f	\N	\N
5	content-delete	content	f	\N	\N
6	block-create	block	f	\N	\N
7	block-read	block	f	\N	\N
8	block-update	block	f	\N	\N
9	block-delete	block	f	\N	\N
10	user-create	user	f	\N	\N
11	user-read	user	f	\N	\N
12	user-update	user	f	\N	\N
13	user-delete	user	f	\N	\N
14	file-create	file	f	\N	\N
15	file-read	file	f	\N	\N
16	file-update	file	f	\N	\N
17	file-delete	file	f	\N	\N
18	role-create	role	f	\N	\N
19	role-read	role	f	\N	\N
20	role-update	role	f	\N	\N
21	role-delete	role	f	\N	\N
22	options-read	options	f	\N	\N
23	options-update-general	options	f	\N	\N
24	options-update-seo	options	f	\N	\N
\.


--
-- Name: acl_permissions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('acl_permissions_id_seq', 24, true);


--
-- Data for Name: acl_roles; Type: TABLE DATA; Schema: public; Owner: -
--

COPY acl_roles (id, name, created_at, updated_at) FROM stdin;
1	Admin	2018-01-02 15:55:30	2018-01-02 15:55:30
2	Moderator	2018-01-02 15:55:30	2018-01-02 15:55:30
\.


--
-- Name: acl_roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('acl_roles_id_seq', 2, true);


--
-- Data for Name: acl_user_role; Type: TABLE DATA; Schema: public; Owner: -
--

COPY acl_user_role (user_id, role_id, created_at, updated_at) FROM stdin;
1	1	2018-01-02 15:55:30	2018-01-02 15:55:30
\.


--
-- Data for Name: block_translations; Type: TABLE DATA; Schema: public; Owner: -
--

COPY block_translations (id, language_code, block_id, author_id, title, body, custom_fields, is_active, created_at, updated_at) FROM stdin;
\.


--
-- Name: block_translations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('block_translations_id_seq', 1, false);


--
-- Data for Name: block_types; Type: TABLE DATA; Schema: public; Owner: -
--

COPY block_types (id, name, handler, created_at, updated_at) FROM stdin;
1	basic	Gzero\\Cms\\Handlers\\Block\\Basic	2018-01-02 15:55:30	2018-01-02 15:55:30
2	menu	Gzero\\Cms\\Handlers\\Block\\Menu	2018-01-02 15:55:30	2018-01-02 15:55:30
3	slider	Gzero\\Cms\\Handlers\\Block\\Slider	2018-01-02 15:55:30	2018-01-02 15:55:30
\.


--
-- Name: block_types_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('block_types_id_seq', 3, true);


--
-- Data for Name: blocks; Type: TABLE DATA; Schema: public; Owner: -
--

COPY blocks (id, type_id, region, theme, blockable_type, author_id, filter, options, weight, is_active, is_cacheable, created_at, updated_at, deleted_at) FROM stdin;
\.


--
-- Name: blocks_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('blocks_id_seq', 1, false);


--
-- Data for Name: content_translations; Type: TABLE DATA; Schema: public; Owner: -
--

COPY content_translations (id, language_code, content_id, author_id, title, teaser, body, seo_title, seo_description, is_active, created_at, updated_at) FROM stdin;
\.


--
-- Name: content_translations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('content_translations_id_seq', 1, false);


--
-- Data for Name: content_types; Type: TABLE DATA; Schema: public; Owner: -
--

COPY content_types (id, name, handler, created_at, updated_at) FROM stdin;
1	content	Gzero\\Cms\\Handlers\\Content\\ContentHandler	2018-01-02 15:55:30	2018-01-02 15:55:30
2	category	Gzero\\Cms\\Handlers\\Content\\CategoryHandler	2018-01-02 15:55:30	2018-01-02 15:55:30
\.


--
-- Name: content_types_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('content_types_id_seq', 2, true);


--
-- Data for Name: contents; Type: TABLE DATA; Schema: public; Owner: -
--

COPY contents (id, type_id, theme, author_id, path, parent_id, level, weight, rating, is_on_home, is_comment_allowed, is_promoted, is_sticky, published_at, deleted_at, created_at, updated_at, thumb_id) FROM stdin;
\.


--
-- Name: contents_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('contents_id_seq', 1, false);


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: -
--

COPY failed_jobs (id, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('failed_jobs_id_seq', 1, false);


--
-- Data for Name: file_translations; Type: TABLE DATA; Schema: public; Owner: -
--

COPY file_translations (id, language_code, file_id, author_id, title, description, created_at, updated_at) FROM stdin;
\.


--
-- Name: file_translations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('file_translations_id_seq', 1, false);


--
-- Data for Name: file_types; Type: TABLE DATA; Schema: public; Owner: -
--

COPY file_types (id, name, created_at, updated_at) FROM stdin;
1	image	2018-01-02 15:55:30	2018-01-02 15:55:30
2	document	2018-01-02 15:55:30	2018-01-02 15:55:30
3	video	2018-01-02 15:55:30	2018-01-02 15:55:30
4	music	2018-01-02 15:55:30	2018-01-02 15:55:30
\.


--
-- Name: file_types_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('file_types_id_seq', 4, true);


--
-- Data for Name: files; Type: TABLE DATA; Schema: public; Owner: -
--

COPY files (id, type_id, name, extension, size, mime_type, info, author_id, is_active, created_at, updated_at) FROM stdin;
\.


--
-- Name: files_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('files_id_seq', 1, false);


--
-- Data for Name: languages; Type: TABLE DATA; Schema: public; Owner: -
--

COPY languages (code, i18n, is_enabled, is_default, created_at, updated_at) FROM stdin;
pl	pl_PL	t	f	2018-01-02 15:55:29	2018-01-02 15:55:29
de	de_DE	f	f	2018-01-02 15:55:29	2018-01-02 15:55:29
fr	fr_FR	f	f	2018-01-02 15:55:29	2018-01-02 15:55:29
en	en_US	t	t	2018-01-02 15:55:29	2018-01-02 15:55:30
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: -
--

COPY migrations (id, migration, batch) FROM stdin;
1	2014_10_12_100000_create_password_resets_table	1
2	2014_11_16_114110_create_language	1
3	2014_11_16_114111_create_user	1
4	2014_11_16_114112_create_route	1
5	2014_11_16_114113_create_content	1
6	2014_11_16_114113_create_options	1
7	2014_11_16_114114_create_roles_and_permissions_table	1
8	2015_11_26_115322_create_block	1
9	2016_05_08_111342_create_files_table	1
10	2016_05_08_140929_add_file_column_to_contents_table	1
11	2016_06_01_000001_create_oauth_auth_codes_table	1
12	2016_06_01_000002_create_oauth_access_tokens_table	1
13	2016_06_01_000003_create_oauth_refresh_tokens_table	1
14	2016_06_01_000004_create_oauth_clients_table	1
15	2016_06_01_000005_create_oauth_personal_access_clients_table	1
16	2017_03_09_134604_passport_create_clients	1
17	2017_04_26_135124_create_failed_jobs_table	1
18	2017_10_24_094825_create_google_tag_manager_id_row_and_delete_google_analytics_id_row	1
\.


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('migrations_id_seq', 18, true);


--
-- Data for Name: oauth_access_tokens; Type: TABLE DATA; Schema: public; Owner: -
--

COPY oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) FROM stdin;
\.


--
-- Data for Name: oauth_auth_codes; Type: TABLE DATA; Schema: public; Owner: -
--

COPY oauth_auth_codes (id, user_id, client_id, scopes, revoked, expires_at) FROM stdin;
\.


--
-- Data for Name: oauth_clients; Type: TABLE DATA; Schema: public; Owner: -
--

COPY oauth_clients (id, user_id, name, secret, redirect, personal_access_client, password_client, revoked, created_at, updated_at) FROM stdin;
1	\N	Password Grant Client	xq2EaekTlhZn38Gh4qDsL51EkANyjdmkOEuSsrjD	http://localhost	f	t	f	2018-01-02 15:55:30	2018-01-02 15:55:30
2	\N	Personal Access Client	PMWHe4q8MAWJXiIwp0gLbBBznMetN2TOe3mcFek4	http://localhost	t	f	f	2018-01-02 15:55:30	2018-01-02 15:55:30
\.


--
-- Name: oauth_clients_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('oauth_clients_id_seq', 2, true);


--
-- Data for Name: oauth_personal_access_clients; Type: TABLE DATA; Schema: public; Owner: -
--

COPY oauth_personal_access_clients (id, client_id, created_at, updated_at) FROM stdin;
1	2	2018-01-02 15:55:30	2018-01-02 15:55:30
\.


--
-- Name: oauth_personal_access_clients_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('oauth_personal_access_clients_id_seq', 1, true);


--
-- Data for Name: oauth_refresh_tokens; Type: TABLE DATA; Schema: public; Owner: -
--

COPY oauth_refresh_tokens (id, access_token_id, revoked, expires_at) FROM stdin;
\.


--
-- Data for Name: option_categories; Type: TABLE DATA; Schema: public; Owner: -
--

COPY option_categories (key, created_at, updated_at) FROM stdin;
general	2018-01-02 15:55:30	2018-01-02 15:55:30
seo	2018-01-02 15:55:30	2018-01-02 15:55:30
\.


--
-- Data for Name: options; Type: TABLE DATA; Schema: public; Owner: -
--

COPY options (id, key, category_key, value, created_at, updated_at) FROM stdin;
1	site_name	general	{"pl":"GZERO-CMS","de":"GZERO-CMS","fr":"GZERO-CMS","en":"GZERO-CMS"}	2018-01-02 15:55:30	2018-01-02 15:55:30
2	site_desc	general	{"pl":"GZERO-CMS Content management system.","de":"GZERO-CMS Content management system.","fr":"GZERO-CMS Content management system.","en":"GZERO-CMS Content management system."}	2018-01-02 15:55:30	2018-01-02 15:55:30
3	default_page_size	general	{"pl":10,"de":10,"fr":10,"en":10}	2018-01-02 15:55:30	2018-01-02 15:55:30
4	cookies_policy_url	general	{"pl":null,"de":null,"fr":null,"en":null}	2018-01-02 15:55:30	2018-01-02 15:55:30
5	desc_length	seo	{"pl":160,"de":160,"fr":160,"en":160}	2018-01-02 15:55:30	2018-01-02 15:55:30
7	google_tag_manager_id	seo	{"pl":null,"de":null,"fr":null,"en":null}	2018-01-02 15:55:30	2018-01-02 15:55:30
\.


--
-- Name: options_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('options_id_seq', 7, true);


--
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: -
--

COPY password_resets (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: routes; Type: TABLE DATA; Schema: public; Owner: -
--

COPY routes (id, language_code, path, routable_id, routable_type, is_active, created_at, updated_at) FROM stdin;
\.


--
-- Name: routes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('routes_id_seq', 1, false);


--
-- Data for Name: uploadables; Type: TABLE DATA; Schema: public; Owner: -
--

COPY uploadables (file_id, uploadable_id, uploadable_type, weight, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: -
--

COPY users (id, email, password, name, first_name, last_name, is_admin, remember_token, created_at, updated_at) FROM stdin;
1	admin@gzero.pl	$2y$10$CwKDSgDqI8oQzq5blDsVbOlksEid7a1KaOZJQV0bpaPBw3UB0xV2G	Admin	John	Doe	t	\N	2018-01-02 15:55:30	2018-01-02 15:55:30
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('users_id_seq', 1, true);


--
-- Name: acl_permissions acl_permissions_name_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY acl_permissions
    ADD CONSTRAINT acl_permissions_name_unique UNIQUE (name);


--
-- Name: acl_permissions acl_permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY acl_permissions
    ADD CONSTRAINT acl_permissions_pkey PRIMARY KEY (id);


--
-- Name: acl_roles acl_roles_name_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY acl_roles
    ADD CONSTRAINT acl_roles_name_unique UNIQUE (name);


--
-- Name: acl_roles acl_roles_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY acl_roles
    ADD CONSTRAINT acl_roles_pkey PRIMARY KEY (id);


--
-- Name: block_translations block_translations_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY block_translations
    ADD CONSTRAINT block_translations_pkey PRIMARY KEY (id);


--
-- Name: block_types block_types_name_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY block_types
    ADD CONSTRAINT block_types_name_unique UNIQUE (name);


--
-- Name: block_types block_types_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY block_types
    ADD CONSTRAINT block_types_pkey PRIMARY KEY (id);


--
-- Name: blocks blocks_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY blocks
    ADD CONSTRAINT blocks_pkey PRIMARY KEY (id);


--
-- Name: content_translations content_translations_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY content_translations
    ADD CONSTRAINT content_translations_pkey PRIMARY KEY (id);


--
-- Name: content_types content_types_name_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY content_types
    ADD CONSTRAINT content_types_name_unique UNIQUE (name);


--
-- Name: content_types content_types_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY content_types
    ADD CONSTRAINT content_types_pkey PRIMARY KEY (id);


--
-- Name: contents contents_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY contents
    ADD CONSTRAINT contents_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: file_translations file_translations_file_id_language_code_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY file_translations
    ADD CONSTRAINT file_translations_file_id_language_code_unique UNIQUE (file_id, language_code);


--
-- Name: file_translations file_translations_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY file_translations
    ADD CONSTRAINT file_translations_pkey PRIMARY KEY (id);


--
-- Name: file_types file_types_name_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY file_types
    ADD CONSTRAINT file_types_name_unique UNIQUE (name);


--
-- Name: file_types file_types_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY file_types
    ADD CONSTRAINT file_types_pkey PRIMARY KEY (id);


--
-- Name: files files_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY files
    ADD CONSTRAINT files_pkey PRIMARY KEY (id);


--
-- Name: languages languages_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY languages
    ADD CONSTRAINT languages_pkey PRIMARY KEY (code);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: oauth_access_tokens oauth_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY oauth_access_tokens
    ADD CONSTRAINT oauth_access_tokens_pkey PRIMARY KEY (id);


--
-- Name: oauth_auth_codes oauth_auth_codes_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY oauth_auth_codes
    ADD CONSTRAINT oauth_auth_codes_pkey PRIMARY KEY (id);


--
-- Name: oauth_clients oauth_clients_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY oauth_clients
    ADD CONSTRAINT oauth_clients_pkey PRIMARY KEY (id);


--
-- Name: oauth_personal_access_clients oauth_personal_access_clients_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY oauth_personal_access_clients
    ADD CONSTRAINT oauth_personal_access_clients_pkey PRIMARY KEY (id);


--
-- Name: oauth_refresh_tokens oauth_refresh_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY oauth_refresh_tokens
    ADD CONSTRAINT oauth_refresh_tokens_pkey PRIMARY KEY (id);


--
-- Name: option_categories option_categories_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY option_categories
    ADD CONSTRAINT option_categories_pkey PRIMARY KEY (key);


--
-- Name: options options_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY options
    ADD CONSTRAINT options_pkey PRIMARY KEY (id);


--
-- Name: routes routes_language_code_path_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY routes
    ADD CONSTRAINT routes_language_code_path_unique UNIQUE (language_code, path);


--
-- Name: routes routes_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY routes
    ADD CONSTRAINT routes_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_name_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_name_unique UNIQUE (name);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: acl_permission_role_permission_id_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX acl_permission_role_permission_id_index ON acl_permission_role USING btree (permission_id);


--
-- Name: acl_permission_role_role_id_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX acl_permission_role_role_id_index ON acl_permission_role USING btree (role_id);


--
-- Name: acl_user_role_role_id_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX acl_user_role_role_id_index ON acl_user_role USING btree (role_id);


--
-- Name: acl_user_role_user_id_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX acl_user_role_user_id_index ON acl_user_role USING btree (user_id);


--
-- Name: blocks_type_id_blockable_type_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX blocks_type_id_blockable_type_index ON blocks USING btree (type_id, blockable_type);


--
-- Name: contents_path_level_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX contents_path_level_index ON contents USING btree (path, level);


--
-- Name: oauth_access_tokens_user_id_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX oauth_access_tokens_user_id_index ON oauth_access_tokens USING btree (user_id);


--
-- Name: oauth_clients_user_id_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX oauth_clients_user_id_index ON oauth_clients USING btree (user_id);


--
-- Name: oauth_personal_access_clients_client_id_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX oauth_personal_access_clients_client_id_index ON oauth_personal_access_clients USING btree (client_id);


--
-- Name: oauth_refresh_tokens_access_token_id_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX oauth_refresh_tokens_access_token_id_index ON oauth_refresh_tokens USING btree (access_token_id);


--
-- Name: options_category_key_key_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX options_category_key_key_index ON options USING btree (category_key, key);


--
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX password_resets_email_index ON password_resets USING btree (email);


--
-- Name: routes_path_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX routes_path_index ON routes USING btree (path);


--
-- Name: uploadables_file_id_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX uploadables_file_id_index ON uploadables USING btree (file_id);


--
-- Name: acl_permission_role acl_permission_role_permission_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY acl_permission_role
    ADD CONSTRAINT acl_permission_role_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES acl_permissions(id) ON DELETE CASCADE;


--
-- Name: acl_permission_role acl_permission_role_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY acl_permission_role
    ADD CONSTRAINT acl_permission_role_role_id_foreign FOREIGN KEY (role_id) REFERENCES acl_roles(id) ON DELETE CASCADE;


--
-- Name: acl_user_role acl_user_role_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY acl_user_role
    ADD CONSTRAINT acl_user_role_role_id_foreign FOREIGN KEY (role_id) REFERENCES acl_roles(id) ON DELETE CASCADE;


--
-- Name: acl_user_role acl_user_role_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY acl_user_role
    ADD CONSTRAINT acl_user_role_user_id_foreign FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE;


--
-- Name: block_translations block_translations_block_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY block_translations
    ADD CONSTRAINT block_translations_block_id_foreign FOREIGN KEY (block_id) REFERENCES blocks(id) ON DELETE CASCADE;


--
-- Name: block_translations block_translations_language_code_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY block_translations
    ADD CONSTRAINT block_translations_language_code_foreign FOREIGN KEY (language_code) REFERENCES languages(code) ON DELETE CASCADE;


--
-- Name: blocks blocks_author_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY blocks
    ADD CONSTRAINT blocks_author_id_foreign FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE SET NULL;


--
-- Name: blocks blocks_type_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY blocks
    ADD CONSTRAINT blocks_type_id_foreign FOREIGN KEY (type_id) REFERENCES block_types(id) ON DELETE CASCADE;


--
-- Name: content_translations content_translations_author_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY content_translations
    ADD CONSTRAINT content_translations_author_id_foreign FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE SET NULL;


--
-- Name: content_translations content_translations_content_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY content_translations
    ADD CONSTRAINT content_translations_content_id_foreign FOREIGN KEY (content_id) REFERENCES contents(id) ON DELETE CASCADE;


--
-- Name: content_translations content_translations_language_code_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY content_translations
    ADD CONSTRAINT content_translations_language_code_foreign FOREIGN KEY (language_code) REFERENCES languages(code) ON DELETE CASCADE;


--
-- Name: contents contents_author_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY contents
    ADD CONSTRAINT contents_author_id_foreign FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE SET NULL;


--
-- Name: contents contents_parent_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY contents
    ADD CONSTRAINT contents_parent_id_foreign FOREIGN KEY (parent_id) REFERENCES contents(id) ON DELETE CASCADE;


--
-- Name: contents contents_thumb_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY contents
    ADD CONSTRAINT contents_thumb_id_foreign FOREIGN KEY (thumb_id) REFERENCES files(id) ON DELETE SET NULL;


--
-- Name: contents contents_type_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY contents
    ADD CONSTRAINT contents_type_id_foreign FOREIGN KEY (type_id) REFERENCES content_types(id) ON DELETE CASCADE;


--
-- Name: file_translations file_translations_author_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY file_translations
    ADD CONSTRAINT file_translations_author_id_foreign FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE SET NULL;


--
-- Name: file_translations file_translations_file_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY file_translations
    ADD CONSTRAINT file_translations_file_id_foreign FOREIGN KEY (file_id) REFERENCES files(id) ON DELETE CASCADE;


--
-- Name: file_translations file_translations_language_code_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY file_translations
    ADD CONSTRAINT file_translations_language_code_foreign FOREIGN KEY (language_code) REFERENCES languages(code) ON DELETE CASCADE;


--
-- Name: files files_author_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY files
    ADD CONSTRAINT files_author_id_foreign FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE SET NULL;


--
-- Name: files files_type_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY files
    ADD CONSTRAINT files_type_id_foreign FOREIGN KEY (type_id) REFERENCES file_types(id) ON DELETE SET NULL;


--
-- Name: options options_category_key_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY options
    ADD CONSTRAINT options_category_key_foreign FOREIGN KEY (category_key) REFERENCES option_categories(key) ON DELETE CASCADE;


--
-- Name: routes routes_language_code_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY routes
    ADD CONSTRAINT routes_language_code_foreign FOREIGN KEY (language_code) REFERENCES languages(code) ON DELETE CASCADE;


--
-- Name: uploadables uploadables_file_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY uploadables
    ADD CONSTRAINT uploadables_file_id_foreign FOREIGN KEY (file_id) REFERENCES files(id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

