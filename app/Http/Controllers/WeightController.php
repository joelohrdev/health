<?php

namespace App\Http\Controllers;

use App\Models\Weight;
use Inertia\Inertia;
use Redirect;
use Request;

class WeightController extends Controller
{
    public function index()
    {
        return Inertia::render('Weight', [
            'weights' => Weight::orderBy('date', 'desc')
                ->get()
                ->transform(fn ($weight) => [
                    'id' => $weight->id,
                    'date' => $weight->date,
                    'weight' => $weight->weight,
                ]),
        ]);
    }

    public function store()
    {
        Request::validate([
            'date' => ['required', 'date'],
            'weight' => ['required', 'numeric'],
        ]);

        Weight::create([
            'date' => Request::input('date'),
            'weight' => Request::input('weight'),
        ]);

        return Redirect::route('weight.index');
    }
}
