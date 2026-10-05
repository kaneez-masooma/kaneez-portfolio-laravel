<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    public function index()
    {
        $certifications = Certification::ordered()->get();

        return view('admin.certifications.index', compact('certifications'));
    }

    public function create()
    {
        return view('admin.certifications.form', ['certification' => new Certification()]);
    }

    public function store(Request $request)
    {
        Certification::create($this->validateData($request));

        return redirect()->route('admin.certifications.index')->with('success', 'Certification added.');
    }

    public function edit(Certification $certification)
    {
        return view('admin.certifications.form', compact('certification'));
    }

    public function update(Request $request, Certification $certification)
    {
        $certification->update($this->validateData($request));

        return redirect()->route('admin.certifications.index')->with('success', 'Certification updated.');
    }

    public function destroy(Certification $certification)
    {
        $certification->delete();

        return back()->with('success', 'Certification removed.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'issuer' => ['required', 'string', 'max:150'],
            'date_earned' => ['nullable', 'date'],
            'credential_url' => ['nullable', 'url'],
            'sort_order' => ['nullable', 'integer'],
        ]);
    }
}
