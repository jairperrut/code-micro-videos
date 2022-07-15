<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genrer;
use Illuminate\Http\Request;

class GenrerController extends Controller
{
    private $rules = [
        'name' => 'required|max:255',
        'is_active' => 'boolean'
    ];

    public function index()
    {
        return Genrer::all();
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
        return Genrer::create($request->all());
    }

    public function show(Genrer $genrer)
    {
        return $genrer;
    }

    public function update(Request $request, Genrer $genrer)
    {
        $this->validate($request, $this->rules);
        $genrer->update($request->all());
        return $genrer;
    }


    public function destroy(Genrer $genrer)
    {
        $genrer->delete();
        return $genrer;
    }
}
