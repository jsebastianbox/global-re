<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'file' => 'required|file|max:16384', // validate the uploaded file
        //     'type' => 'required|string', // validate the type of file (e.g., 'accidentRate', 'desglose_file', etc.)
        //     'slip_id' => 'required|exists:slips,id', // validate the associated slip ID
        //     'input_name' => 'required|string', // validate the name of the form input used to upload the file
        // ]);

        // $path = $request->file('file')->storeAs(
        //     "{$validatedData['type']}/{$validatedData['slip_id']}/{$validatedData['input_name']}",
        //     $request->file('file')->getClientOriginalName()
        // );

        // $file = new File();
        // $file->path = $path;
        // $file->type = $validatedData['type'];
        // $file->slip_id = $validatedData['slip_id'];
        // $file->input_name = $validatedData['input_name'];
        // $file->save();

        // return response()->json(['message' => 'Archivo cargado exitosamente.']);
    }

    public function download(File $file)
    {
        return Storage::download($file->path);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
