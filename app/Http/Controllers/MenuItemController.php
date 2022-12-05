<?php

namespace App\Http\Controllers;

use App\Helpers\APIResponse;
use App\Http\Resources\MenuItemResource;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \App\Helpers\APIResponse
     */
    public function index()
    {
        return (new APIResponse(200))->set_data(MenuItemResource::collection(MenuItem::paginate()))->build();
    }
}
