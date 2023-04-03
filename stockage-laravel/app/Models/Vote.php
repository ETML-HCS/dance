<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont massivement affectables.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'project_id'];

    /**
     * Définit une relation d'appartenance entre le modèle Vote et le modèle User.
     * Cette relation signifie qu'un vote appartient à un utilisateur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Définit une relation d'appartenance entre le modèle Vote et le modèle Project.
     * Cette relation signifie qu'un vote appartient à un projet.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
