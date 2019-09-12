<?php

class Usuario extends ModelBase {
    public $id;
    public $nombre;
    public $correo;
    public $password;

    function __construct(){
        parent::__construct();
    }

    /**
     * metodos del modelo
     */

    public function selectAll(){
        $query = $this->db->conect()->query('SELECT id, nombre, correo FROM user');

        $items = [];
        while ($row = $query->fetch()){
            $item = new Usuario();
            $item->id = $row['id'];
            $item->nombre = $row['nombre'];
            $item->correo = $row['correo'];
            array_push($items, $item);
        }

        return $items;
    }    

    public function save($request){
        $query = $this->db->conect()->prepare(
            'INSERT INTO user (nombre, correo, password) VALUES(:nombre, :correo, :password)'
        );

        $pass = $request['password'];    
        $passHash = password_hash($pass, PASSWORD_BCRYPT);

        $query->execute([
            'nombre' => $request['nombre'],
            'correo' => $request['correo'],
            'password' => $passHash
        ]);
        
    }

}

?>