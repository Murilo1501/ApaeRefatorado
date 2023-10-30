<?php

    $queries = [
    "comum" =>[
        "insert" => "INSERT INTO usuarios (nome,email,cep,cpf,data_nasc,senha,endereco,complemento,telefone,data_vencimento,nivel) VALUES (?,?,?,?,?,?,?,?,?,?,?)",
        "select" => "SELECT * FROM usuarios",
        "update" => "UPDATE usuarios SET () WHERE id = ?",
        "delete" => "DELETE FROM usuarios WHERE id = ?"
    ],

    "admin" => [
        "insert" => "INSERT INTO usuarios () VALUES ()",
        "select" => "SELECT * FROM usuarios",
        "update" => "UPDATE usuarios SET () WHERE id = ?",
        "delete" => "DELETE FROM usuarios WHERE id = ?"
    ],

    "empresas" => [
        "insert" => "INSERT INTO empresas () VALUES ()",
        "select" => "SELECT * FROM empresas",
        "update" => "UPDATE empresas SET () WHERE id = ?",
        "delete" => "DELETE FROM empresas WHERE id = ?"
    ],

    "eventos" => [
        "insert" => "INSERT INTO eventos () VALUES ()",
        "select" => "SELECT * FROM eventos",
        "update" => "UPDATE eventos SET () WHERE id = ?",
        "delete" => "DELETE FROM eventos WHERE id = ?"
    ],

    "noticias" => [
        "insert" => "INSERT INTO noticias () VALUES ()",
        "select" => "SELECT * FROM eventsNotices",
        "update" => "UPDATE noticias SET () WHERE id = ?",
        "delete" => "DELETE FROM noticias WHERE id = ?"
    ],

    "login" => "SELECT * FROM usuarios WHERE email = ?"
];
