--create accelaration table --------------------------------------------------



CREATE TABLE IF NOT EXISTS public.tb_lucros
(
    mes character varying(50) COLLATE pg_catalog."default",
    ano_2018 character varying(60) COLLATE pg_catalog."default",
    ano_2019 character varying(60) COLLATE pg_catalog."default",
    id SERIAL NOT NULL,
    CONSTRAINT tb_lucros_pkey PRIMARY KEY (id)
)



INSERT INTO tb_lucros (mes, ano_2018, ano_2019) VALUES
('Janeiro', 120.16, 210.15), ('Fevereiro', 420.40, 225.80), ('Março', 310, 55.90), ('Abril', 650.33, 308.10), ('Maio', 200, 416.65)

-- TABELA USUARIO

CREATE TABLE IF NOT EXISTS public.tb_usuarios
(
    id SERIAL NOT NULL,
    nome character varying(100) COLLATE pg_catalog."default" NOT NULL,
    email character varying(100) COLLATE pg_catalog."default" NOT NULL,
    cargo character varying(100) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT tb_usuarios_pkey PRIMARY KEY (email)
)


INSERT INTO public.tb_usuarios(
	nome, email, cargo)
	VALUES ('Administrador', 'qualidade@r2ti.com.br', 'programador');