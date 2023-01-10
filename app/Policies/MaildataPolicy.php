<?php

namespace App\Policies;

use App\Models\Maildata;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class MaildataPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
     
    public function isCorrectUser(?User $user, Maildata $maildata)
    {
        //メールデータの管理者か判定する
        return $user->id === $maildata->users_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Maildata  $maildata
     * @return \Illuminate\Auth\Access\Response|bool
     */
}
