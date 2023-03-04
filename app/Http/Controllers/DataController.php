<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\API\Repositories\DataRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DataController extends Controller
{
    protected DataRepository $repository;

    public function __construct(DataRepository $dataRepository)
    {
        $this->repository = $dataRepository;
    }

    public function index()
    {
        return view("api.index");
    }

    public function sendPost(Request $request)
    {
        dd("POST");
        $jsonData = $request->input('jsonDtata');
        $token = $request->input('token');
        $method = $request->input('method');

        switch ($method) {
            case "POST":
                break;
            case "GET":
                break;
        }
    }

    public function sendGet(Request $request){
        dd("GET");
    }
}
