<?php 

namespace Model;

class CitaServicio extends ActiveRecord {
    protected static $tabla = "appsalon_mvc.citas_servicios";
    protected static $columnasDB = ['id', 'citaId', 'serviciosId'];

    public $id;
    public $citaId;
    public $servicioId;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->citaId = $args['citaId'] ?? '';
        $this->serviciosId = $args['serviciosId'] ?? '';
    }
}