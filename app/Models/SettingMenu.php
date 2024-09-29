<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingMenu extends Model
{
    use HasFactory;

    protected $fillable = ['jenis_user_id', 'menu_id'];

    public function jenisUser()
    {
        return $this->belongsTo(JenisUser::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
