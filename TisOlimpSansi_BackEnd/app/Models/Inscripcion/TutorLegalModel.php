<?php

namespace App\Models\Inscripcion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Inscripcion\EstudianteModel;

class TutorLegalModel extends Model
{
    use HasFactory;
    protected $table = 'tutor_legal';
    protected $fillable = [
        'nombre',
        'apellido_pa',
        'apellido_ma',
        'ci',
        'complemento',
        'correo',
        'numero_celular',
        'tipo',
    ];

    public function estudiante(){
        return $this->hasMany(EstudianteModel::class, 'id_tutor_legal');
    }

    public static function registrarDesdeRequest($data)
{
    return self::create([
        'nombre' => $data['nombre'],
        'ci' => $data['ci'],
        'parentesco' => $data['parentesco'],
    ]);
}
}
