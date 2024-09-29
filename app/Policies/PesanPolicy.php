<?php

namespace App\Policies;

use App\Models\Pesan;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PesanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the pesan.
     */
    public function view(User $user, Pesan $pesan)
    {
        return $user->email === $pesan->pengirim || $user->email === $pesan->penerima;
    }

    /**
     * Determine whether the user can reply to the pesan.
     */
    public function reply(User $user, Pesan $pesan)
    {
        return $user->email === $pesan->penerima;
    }

    /**
     * Determine whether the user can delete the pesan.
     */
    public function delete(User $user, Pesan $pesan)
    {
        return $user->email === $pesan->pengirim || $user->email === $pesan->penerima;
    }
}
