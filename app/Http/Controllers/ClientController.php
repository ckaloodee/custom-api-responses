<?php

declare(strict_types=1);

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Resources\ClientResource;
use App\Services\ClientService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientController extends Controller
{

    /**
     * @var \App\Services\ClientService
     */
    private ClientService $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $clients = $this->clientService->getClientsWithLastPayments();

        return (new JsonResponse($clients));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  StoreClientRequest  $request
     *
     * @return ClientResource
     */
    public function create(StoreClientRequest $request): ClientResource
    {
        $validated = $request->validated();

        $client = $this->clientService->createClient($validated);

        return (new ClientResource($client));
    }

}
