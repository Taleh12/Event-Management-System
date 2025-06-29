<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:2048',
        ]);

        $path = $request->file('file')->store('uploads', 'public');

        return response()->json([
            'message' => 'Fayl uğurla yükləndi.',
            'path' => $path,
            'url' => Storage::disk('public')->url($path),
        ]);
    }

    public function read($filename)
    {
        $path = "uploads/$filename";

        if (!Storage::disk('public')->exists($path)) {
            return response()->json(['error' => 'Fayl tapılmadı'], 404);
        }

        $content = Storage::disk('public')->get($path);

        return response($content, 200)
            ->header('Content-Type', Storage::disk('public')->mimeType($path));
    }

    public function delete($filename)
    {
        $path = "uploads/$filename";

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            return response()->json(['message' => 'Fayl silindi.']);
        }

        return response()->json(['error' => 'Fayl tapılmadı'], 404);
    }

    public function download($filename)
    {
        $path = "uploads/$filename";

        if (!Storage::disk('public')->exists($path)) {
            return response()->json(['error' => 'Fayl tapılmadı'], 404);
        }

        return Storage::disk('public')->download($path);
    }

    public function exists($filename)
    {
        $exists = Storage::disk('public')->exists("uploads/$filename");

        return response()->json([
            'filename' => $filename,
            'exists' => $exists
        ]);
    }
}
