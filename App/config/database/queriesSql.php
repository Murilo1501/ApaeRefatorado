<?php

    $queries = [
    "comum" =>[
        "insert" => "INSERT INTO usuarios (nome,email,cep,cpf,data_nasc,senha,endereco,complemento,telefone,data_vencimento,nivel) VALUES (?,?,?,?,?,?,?,?,?,?,?)",
        "select" => "SELECT * FROM usuarios WHERE nivel = comum ",
        "update" => "UPDATE usuarios SET () WHERE id = ?",
        "delete" => "DELETE FROM usuarios WHERE id = ?",
        "count" => "SELECT COUNT(*) FROM usuarios WHERE nivel = 'comum'"
    ],

    "admin" => [
        "insert" => "INSERT INTO usuarios () VALUES ()",
        "select" => "SELECT * FROM usuarios",
        "update" => "UPDATE usuarios SET () WHERE id = ?",
        "delete" => "DELETE FROM usuarios WHERE id = ?",
        "count" => "SELECT COUNT(*) FROM usuarios WHERE nivel = 'admin'"
    ],

    "empresas" => [
        "insert" => "INSERT INTO empresas () VALUES ()",
        "select" => "SELECT * FROM empresas",
        "update" => "UPDATE empresas SET () WHERE id = ?",
        "delete" => "DELETE FROM empresas WHERE id = ?",
        "count" => "SELECT COUNT(*) FROM usuarios WHERE nivel = 'empresas'"
    ],

    "eventos" => [
        "insert" => "INSERT INTO eventos () VALUES ()",
        "select" => "SELECT * FROM eventos",
        "update" => "UPDATE eventos SET () WHERE id = ?",
        "delete" => "DELETE FROM eventos WHERE id = ?",
        "count" => "SELECT COUNT(*) FROM eventsnotices WHERE tipo='evento'"
    ],

    "noticias" => [
        "insert" => "INSERT INTO noticias () VALUES ()",
        "select" => "SELECT * FROM eventsNotices",
        "update" => "UPDATE noticias SET () WHERE id = ?",
        "delete" => "DELETE FROM noticias WHERE id = ?",
        "count" =>"SELECT COUNT(*) FROM eventsnotices WHERE tipo='noticia'"
    ],

    "login" => "SELECT * FROM usuarios WHERE email = ?",
    
    "ativo" => "SELECT COUNT(*) FROM usuarios WHERE status=1 ",
    "inativo" => "SELECT COUNT(*) FROM usuarios WHERE status = 0 ",

];
