<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manager;
use App\Http\Resources\Manager as ManagerResource;
use App\Http\Resources\ManagerCollection;

class ManagerController extends Controller
{
    public function index()
    {
        return new ManagerCollection(Manager::all());
    }

    public function show($id)
    {
        return new ManagerResource(Manager::findOrFail($id));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $player = Manager::create($request->all());

        return (new ManagerResource($player))
            ->response()
            ->setStatusCode(201);
    }

    public function edit($id, Request $request)
    {

        $mannager = Manager::findOrFail($id);

        if(!empty($request->post('name'))){
            $mannager->name = $request->post('name');
        }
        if(!empty($request->post('phone'))){
            $mannager->phone = $request->post('phone');
        }
        if(!empty($request->post('description'))){
            $mannager->description = $request->post('description');
        }
        $mannager->save();

        return new ManagerResource($mannager);
    }

    public function delete($id)
    {
        $player = Manager::findOrFail($id);
        $player->delete();

        return response()->json(null, 204);
    }

//    public function resetAnswers($id)
//    {
//        $player = Manager::findOrFail($id);
//        $player->answers = 0;
//        $player->points = 0;
//
//        return new ManagerResource($player);
//    }
}

