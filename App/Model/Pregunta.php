<?php

class Pregunta
{
    public $id, $titulo, $pregunta, $fecha_creacion, $id_usuario, $usuario;

    public static function newPregunta($args)
    {
        $connection = Connection::getInstance();

        $query = $connection->prepare(
            'INSERT INTO preguntas_usuario (id, titulo, pregunta, fecha_creacion, id_usuario) 
            VALUES (NULL, :titulo, :pregunta, :fecha, :id)'
        );
        $query->execute([
            'titulo' => $args['titulo'],
            'pregunta' => $args['pregunta'],
            'fecha' => date("Y-m-d H:i:s"),
            'id' => $args['id']
        ]);
        return $query->rowCount();
    }

    public static function all()
    {
        $connection = Connection::getInstance();

        $query = $connection->prepare(
            'SELECT titulo, pregunta, usuario FROM preguntas_usuario 
            INNER JOIN usuario ON preguntas_usuario.id_usuario = usuario.id
            ORDER BY fecha_creacion'
        );
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, 'Pregunta');
    }
}
