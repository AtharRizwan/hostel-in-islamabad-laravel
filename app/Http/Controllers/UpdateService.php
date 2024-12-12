<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Service;

class UpdateService extends Controller
{
    public function update(Request $request, $serviceId)
    {
        $service = Service::findOrFail($serviceId);
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'long_description' => 'required|string',
            'price' => 'required|string',
        ]);

        $service->update($validatedData);

        return redirect()->route('service.show', $service);
    }
}
