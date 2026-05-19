<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientsController extends Controller
{
    /**
     * Upsert clients by school_id.
     * 
     * Body contains array of schools.
     * For each school:
     * - If it only contains {id}, delete the client where school_id = id.
     * - Else, upsert the client where school_id = context['id'].
     */
    public function sync(Request $request)
    {
        $request->validate([
            'schools' => 'required|array',
            'schools.*.id' => 'required|integer',
            'schools.*.name' => 'sometimes|required_without_all:schools.*.image_url,schools.*.url,schools.*.featured|string|max:255',
            'schools.*.image_url' => 'nullable|string|max:255',
            'schools.*.url' => 'nullable|string|max:255',
            'schools.*.featured' => 'nullable|boolean',
        ]);

        $results = [];

        foreach ($request->schools as $schoolData) {
            $schoolId = $schoolData['id'];
            
            // Check if it only contains 'id'
            if (count($schoolData) === 1) {
                Client::where('school_id', $schoolId)->delete();
                $results[] = ['school_id' => $schoolId, 'action' => 'deleted'];
            } else {
                $client = Client::updateOrCreate(
                    ['school_id' => $schoolId],
                    collect($schoolData)->except('id')->toArray()
                );
                $results[] = [
                    'school_id' => $schoolId, 
                    'action' => $client->wasRecentlyCreated ? 'created' : 'updated',
                    'client' => $client
                ];
            }
        }

        return response()->json([
            'message' => 'Operations completed',
            'results' => $results
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Client::where('school_id', '!=', 1)
            ->orderBy('featured', 'desc')
            ->orderBy('name')
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'school_id' => 'nullable|unsignedBigInteger',
            'name' => 'required|string|max:255',
            'image_url' => 'nullable|string|max:255',
            'url' => 'nullable|string|max:255',
            'featured' => 'nullable|boolean',
        ]);

        if ($request->has('school_id') && $request->school_id) {
            $client = Client::updateOrCreate(
                ['school_id' => $request->school_id],
                $request->except(['school_id'])
            );
            $status = $client->wasRecentlyCreated ? 201 : 200;
        } else {
            $client = Client::create($request->all());
            $status = 201;
        }
        
        return response()->json($client, $status);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return $client;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $school_id)
    {
        $client = Client::where('school_id', $school_id)->firstOrFail();

        $request->validate([
            'school_id' => 'nullable|unsignedBigInteger',
            'name' => 'sometimes|required|string|max:255',
            'image_url' => 'nullable|string|max:255',
            'url' => 'nullable|string|max:255',
            'featured' => 'nullable|boolean',
        ]);

        $client->update($request->all());
        return response()->json($client);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($school_id)
    {
        $client = Client::where('school_id', $school_id)->firstOrFail();
        $client->delete();
        return response()->json(null, 204);
    }
}
