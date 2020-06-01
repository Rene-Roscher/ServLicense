<?php

namespace App\Helper;

use App\Models\User;

class Helpers
{
    static function getModels($path, $namespace)
    {
        $out = [];

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(
                $path
            ), \RecursiveIteratorIterator::SELF_FIRST
        );
        foreach ($iterator as $item) {
            if ($item->isReadable() && $item->isFile() && mb_strtolower($item->getExtension()) === 'php') {
                $out[] = $namespace . str_replace("/", "\\", mb_substr($item->getRealPath(), mb_strlen($path), -4));
            }
        }
        return $out;
    }

    public static function user(): User
    {
        return auth()->user();
    }

    /**
     * @param string $state SUCCESS, PENDING, ERROR, ARBORT
     */
    public static function getStatePillInnerHTML($state = 'SUCCESS')
    {
        switch (strtoupper($state)) {
            case "SUCCESS":
                return '<span class="badge badge-success">Erfolgreich</span>';
            case "PENDING":
                return '<span class="title right text-muted"><span class="status-pill yellow"></span></span>';
            case "ERROR":
                return '<span class="title right text-muted"><span class="status-pill red"></span></span>';
            case "ABORT":
                return '<span class="title right text-muted">Success<span class="status-pill red"></span></span>';
        }
    }

}
