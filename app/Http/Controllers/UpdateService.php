<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use App\Models\Service;

class UpdateService extends Controller
{
    public function update(Request $request, Service $service): RedirectResponse
    {
        // Only admins may edit services
        abort_unless($request->user()->isAdmin(), 403);

        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'long_description' => 'required|string',
            'price' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect(route('service.show', $service).'#edit-service')->withErrors($validator)->withInput();
        }

        $service->update($validator->validated());

        return redirect()->route('service.show', $service)->with('success', 'Service updated.');
    }
}
