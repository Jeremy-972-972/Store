<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use App\Models\Favoris;
use App\Models\Commande;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser // pour faire les autorisations avec filament

{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

     /**
     * Get all of the comments for the Panier
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commande(): HasMany
    {
        return $this->hasMany(Commande::class);
    }


    /**
     * Get all of the favoris for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favoriss(): HasMany
    {
        return $this->hasMany(Favoris::class, 'foreign_key', 'local_key');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function canAccessPanel(Panel $panel): bool{ //boolean pour autoriser les admins

    if($this->role === 'admin'){
        return true;
    }else{
        return false;
    }
}

}
