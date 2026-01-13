<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Inertia\Inertia;

class AfsprakenController extends Controller
{
    public function index() {
        return Inertia::render('afspraken/index', [
            'appointment' => Appointment::latest()->get(),
        ]);
    }

    public function create() {
        return Inertia::render('afspraken/maak-afspraak');
    }

    public function store(Request $request)
    {
        Afspraak::create($request->validate([
            'titel' => 'required',
            'datum' => 'required|date',
        ]));

        return redirect('/afspraken');
    }

    public function show() {

    }

    public function update() {

    }

    public function delete() {
        
    }
}
