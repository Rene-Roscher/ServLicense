<?php


namespace App\Transformers;


use App\Models\Session;
use App\Models\User;
use League\Fractal\TransformerAbstract;

class LicensorTransformer extends TransformerAbstract
{

    public function transform(User $licensor)
    {
        return [
            'id' => $licensor->id,
            'name' => $licensor->name,
            'email' => $licensor->email,
            'role' => $licensor->convertedRole(),
            'created_at' => $licensor->created_at->format('d.m.Y H:i'),
            'action' => '<a href="'.route('admin.licensor.single.index', compact('licensor')).'" class="btn btn-sm btn-outline-primary"><i class="glyphicon glyphicon-edit"></i> Bearbeiten</a>',
        ];
    }

}
