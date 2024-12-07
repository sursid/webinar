<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class CertificateController extends Controller
{
    public function index()
    {
        return view('certificates.index');
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:100',
                'asal' => 'required|string|max:100',
                'email' => 'required|email|unique:certificates',
                'no_tlpn' => 'required|string|max:20',
                'question_1' => 'required|string',
                'question_2' => 'required|string',
                'question_3' => 'required|string',
                'kritik_dan_saran' => 'required|string',
            ]);

            $validated['certificate_number'] = 'CERT-' . date('Ymd') . '-' . strtoupper(uniqid());
            $validated['generated_at'] = now();

            $certificate = Certificate::create($validated);

            return response()->json([
                'code' => 201,
                'status' => true,
                'message' => 'Certificate created successfully'
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'code' => 422,
                'status' => false,
                'message' => $e->getMessage()
            ], 422);

        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}