<?php

namespace App\Http\Controllers;

use App\Http\Requests\JabatanRequest;
use App\Jabatan;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|Response|View
     */
    public function index()
    {
        $data['jabatans'] = Jabatan::paginate(2);
//        $data['jabatans'] = Jabatan::get();
        return view('jabatan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|Response|View
     */
    public function create()
    {
        return view('jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param JabatanRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(JabatanRequest $request)
    {
//        $request->validate([
//            'jabatan' => 'required|min:3'
//        ],[
//            'min' => ':attribute minimal 3 karakter'
//        ]);
//
//        $rules = array(
//            'jabatan'    => 'required|min:2|max:20',
//        );
//
//        $messages = array(
//            'min'        => ':attribute minimal 2 karakter',
//            'max'        => ':attribute maksimal 10 karakter',
//            'required'   => ':attribute harus diisi',
//        );
//
//        $error = Validator::make($request->all(), $rules);
//
//        if($error->fails())
//        {
//            return redirect()->route('jabatan.create')->withErrors($error)->withInput();
//        }

        $jabatan = new Jabatan();
        $jabatan->name = $request->jabatan;
        $jabatan->save();

        return redirect('/jabatan')->with('message', 'Success added Jabatan');
    }

    /**
     * Display the specified resource.
     *
     * @param Jabatan $jabatan
     * @return Response
     */
    public function show(Jabatan $jabatan)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Jabatan $jabatan
     * @return Factory|View
     */
    public function edit(Jabatan $jabatan)
    {
        $data['jabatan'] = $jabatan;
        return view('jabatan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param JabatanRequest $request
     * @param Jabatan $jabatan
     * @return RedirectResponse
     */
    public function update(JabatanRequest $request, Jabatan $jabatan)
    {
//        $request->validate([
//            'jabatan' => 'required|min:3'
//        ],[
//            'min' => ':attribute minimal 3 karakter'
//        ]);
        $jabatan->name = $request->jabatan;
        $jabatan->save();

        return redirect()->route('jabatan.index')->with('message', 'Update Success Jabatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Jabatan $jabatan
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();
        return back()->with('message', 'Delete Success Jabatan');
    }
}
