<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Inertia\Inertia;

class AfsprakenController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->user()->admin) {
            $query = Appointment::query();
        } else {
            $query = auth()->user()->appointments();
        }

        if ($request->filled('datum')) {
            $query->whereDate('datum', $request->datum);
        }

        if ($request->filled('dienst')) {
            $query->where('dienst', $request->dienst);
        }

        if ($request->filled('zoek')) {
            $query->where(function ($q) use ($request) {
                $q->where('voornaam', 'like', "%{$request->zoek}%")
                ->orWhere('achternaam', 'like', "%{$request->zoek}%");
            });
        }

        return Inertia::render('afspraken/index', [
            'afspraken' => $query->latest()->get(),
            'filters' => $request->only([
                'datum',
                'dienst',
                'zoek',
            ]),
        ]);
    }


    public function create() {
        return Inertia::render('afspraken/maak-afspraak');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'datum' => 'required|date',
            'tijd' => 'required',
            'voornaam' => 'required|string',
            'achternaam' => 'required|string',
            'dienst' => 'required|string',
            'opmerking' => 'nullable|string',
        ]);

        Appointment::create([
            'user_id' => Auth::id(),

            'email' => $validated['email'],
            'datum' => $validated['datum'],
            'tijd' => $validated['tijd'],
            'voornaam' => $validated['voornaam'],
            'achternaam' => $validated['achternaam'],
            'dienst' => $validated['dienst'],
            'opmerking' => $validated['opmerking']
        ]);

        return redirect('/afspraken');
    }

    
    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);

        return Inertia::render('afspraken/[id]', [
            'afspraak' => $appointment,   
        ]);
    }


    public function update(Request $request, Appointment $appointment)
    {
        if (!auth()->user()->admin && $appointment->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'voornaam' => 'required|string',
            'achternaam' => 'required|string',
            'email' => 'required|email',
            'dienst' => 'required|string',
            'opmerking' => 'nullable|string',
            'datum' => 'required|date',
            'tijd' => 'required',
        ]);

        $appointment->update($validated);

        return redirect('/afspraken');
    }


    public function destroy(Appointment $appointment) {
        $appointment->delete();

        return redirect('/afspraken');
    }
}
