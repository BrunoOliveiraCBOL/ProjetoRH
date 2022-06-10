<?php

namespace App\Http\Controllers;

use App\Models\Holerite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DownloadController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {   
        $arquivo = Holerite::find($id);
        return Storage::download($arquivo->file);
    }
}
