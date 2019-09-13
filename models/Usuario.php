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
    
    public function getById($id){
        $item = new Usuario();

        $query = $this->db->conect()->prepare("SELECT id, nombre, correo FROM user WHERE id = :id");

        $query->execute(['id' => $id]);

        while($row = $query->fetch()){
            $item->id       = $row['id'];
            $item->nombre   = $row['nombre'];
            $item->correo   = $row['correo'];
        }

        return $item;

    }

    public function save($request){
        $query = $this->db->conect()->prepare(
            'INSERT INTO user (nombre, correo, password) VALUES(:nombre, :correo, :password)'
        );

        $pass = $request['password'];    
        $passHash = password_hash($pass, PASSWORD_BCRYPT);

        $query->execute([
            'nombre'    => $request['nombre'],
            'correo'    => $request['correo'],
            'password'  => $passHash
        ]);
        
    }

    public function update($request){
        $query = $this->db->conect()->prepare(
            "UPDATE user SET nombre = :nombre, correo = :correo, password = :password WHERE id = :id");
        
        $pass = $request['password'];    
        $passHash = password_hash($pass, PASSWORD_BCRYPT);
        $query->execute([
            'nombre'    => $request['nombre'],
            'correo'    => $request['correo'],
            'password'  => $passHash,
            'id'        => $request['id']
        ]);
    }

    public function delete($id){
        $queryuser = $this->db->conect()->prepare("SELECT id FROM user WHERE id = :id");

        $query = $this->db->conect()->prepare("DELETE FROM user WHERE id = :id");

        $item = new Usuario();

        try{

            $queryuser->execute(['id' => $id]);

            while($row = $queryuser->fetch()){
                $item->id       = $row['id'];
            }

            if($item->id != null){
                $query->execute([
                    'id' => $id
                ]);
                return true;
            }
            
            return false;
        }catch(PDOException $e){
            return false;
        }
        
    }

}

?>