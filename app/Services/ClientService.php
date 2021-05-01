<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Client;

class ClientService
{
    /** @var int */
    const PAGE_SIZE = 20;

    public function getClientsWithLastPayments()
    {
        return Client::query()
            ->select('id', 'name', 'surname')
            ->withLastPayment()
            ->orderByLastPayment()
            ->paginate(self::PAGE_SIZE);
    }

    public function createClient($data): Client
    {
        return Client::create($data);
    }
}
