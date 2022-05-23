<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Paragraph;
use Illuminate\Http\Request;

class ParagraphController extends Controller
{
    public function show(int $uuid): \Illuminate\Http\JsonResponse
    {
//        $paragraph = Paragraph::where("uuid", $uuid)->first();
        $paragraph = Paragraph::where("id", $uuid)->first();
        return response()->json($paragraph);
    }
}
