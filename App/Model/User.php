<?php

class User
{
    public $id, $usuario, $clave, $nombre, $apellido, $mail, $pais, $fecha_registracion;

    public static function id($id)
    {
        $connection = Connection::getInstance();

        $query = $connection->prepare(
            'SELECT * FROM usuario WHERE id=:id'
        );

        $query->setFetchMode(PDO::FETCH_CLASS, 'User');

        $query->execute([
            'id' => $id
        ]);
        return $query->fetch();
    }

    public static function login($user, $pass)
    {
        $connection = Connection::getInstance();

        $query = $connection->prepare(
            'SELECT * FROM usuario WHERE usuario=:user AND clave=:pass'
        );

        $query->setFetchMode(PDO::FETCH_CLASS, 'User');

        $query->execute([
            'user' => $user,
            'pass' => $pass
        ]);
        return $query->fetch();
    }
}
