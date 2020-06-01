<?php

namespace App\Transformers;

use App\Models\Session;
use League\Fractal\TransformerAbstract;

class SessionTransformer extends TransformerAbstract
{

    public function transform(Session $session)
    {
        return [
            'id' => $session->id,
            'ip_address' => $session->ip_address,
            'last_activity' => $session->lastActivity(),
            'action' => session()->getId() != $session->id ? '<button href="" data-deletable="true" data-sessionId="'.$session->id.'" class="btn btn-sm btn-outline-danger"><i class="glyphicon glyphicon-edit"></i> Beenden</a>' : '~'
        ];
    }

}
