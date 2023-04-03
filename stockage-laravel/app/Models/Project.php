<?php
// app/Models/Project.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont massivement affectables.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'benefits',
        'estimated_cost',
        'start_date',
        'end_date',
        'user_id',
    ];

    /**
     * Setter et Getter pour le titre
     *
     * @param  string  $title
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->attributes['title'] = $title;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->attributes['title'] ?? '';
    }

    /**
     * Setter et Getter pour la description
     *
     * @param  string  $description
     * @return $this
     */
    public function setDescription(string $description): self
    {
        $this->attributes['description'] = $description;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'] ?? '';
    }

    /**
     * Setter et Getter pour les avantages
     *
     * @param  string  $benefits
     * @return $this
     */
    public function setBenefits(string $benefits): self
    {
        $this->attributes['benefits'] = $benefits;
        return $this;
    }

    public function getBenefits(): string
    {
        return $this->attributes['benefits'] ?? '';
    }

    /**
     * Setter et Getter pour le coût estimé
     *
     * @param  float  $estimated_cost
     * @return $this
     */
    public function setEstimatedCost(float $estimated_cost): self
    {
        $this->attributes['estimated_cost'] = $estimated_cost;
        return $this;
    }

    public function getEstimatedCost(): float
    {
        return $this->attributes['estimated_cost'] ?? 0;
    }

    /**
     * Setter et Getter pour la date de début
     *
     * @param  string  $start_date
     * @return $this
     */
    public function setStartDate(string $start_date): self
    {
        $this->attributes['start_date'] = $start_date;
        return $this;
    }

    public function getStartDate(): string
    {
        return $this->attributes['start_date'] ?? '';
    }

    /**
     * Setter et Getter pour la date de fin
     *
     * @param  string  $end_date
     * @return $this
     */
    public function setEndDate(string $end_date): self
    {
        $this->attributes['end_date'] = $end_date;
        return $this;
    }

    public function getEndDate(): string
    {
        return $this->attributes['end_date'] ?? '';
    }

    /**
     * Setter et Getter pour l'ID de l'utilisateur associé
     *
     * @param  int  $user_id
     * @return $this
     */
    public function setUserId(int $user_id): self
    {
        $this->attributes['user_id'] = $user_id;
        return $this;
    }

    /**
     * Obtenez l'ID de l'utilisateur associé à ce projet.
     *
     * @return int
     */
    public function getUserId(): int
    {
        // Si l'attribut 'user_id' n'est pas défini, retournez 0
        return $this->attributes['user_id'] ?? 0;
    }

    /**
     * La fonction user() dans la classe Project est une méthode qui définit une relation 
     * d'appartenance (belongsTo) entre le modèle Project et le modèle User. 
     * Cette relation signifie qu'un projet appartient à un utilisateur, 
     * c'est-à-dire qu'un utilisateur peut être associé à un ou plusieurs projets.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtenez les fichiers joints associés au projet.
     * Ajoutez cette méthode si vous avez une relation entre Project et Attachment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    /**
     * Obtenez les votes associés à ce projet.
     * 
     * Cette méthode définit une relation "un à plusieurs" entre `Project` et `Vote`
     * en utilisant la méthode `hasMany()` d'Eloquent.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
