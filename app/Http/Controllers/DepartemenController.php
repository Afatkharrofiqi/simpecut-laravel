<?php

namespace App\Http\Controllers;

use App\Departemen;
use App\Jabatan;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $data['departemens'] = Departemen::paginate(3);
        return view('departemen.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('departemen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'departemen'   => 'required|min:3'
        ],[
            'required'  => ':attribute wajib diisi.',
            'min'       => ':attribute minimal 3 karakter.'
        ]);
        $departemen = new Departemen();
        $departemen->name = $request->departemen;
        $departemen->save();

        return redirect('/departemen')->with('message', 'Success added Departemen');
    }

    /**
     * Display the specified resource.
     *
     * @param Departemen $departemen
     * @return void
     */
    public function show(Departemen $departemen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Departemen $departemen
     * @return Factory|View
     */
    public function edit(Departemen $departemen)
    {
        $data['departemen'] = $departemen;
        return view('departemen.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Departemen $departemen
     * @return RedirectResponse
     */
    public function update(Request $request, Departemen $departemen)
    {
        $request->validate([
            'departemen'   => 'required|min:3'
        ],[
            'required'  => ':attribute wajib diisi.',
            'min'       => ':attribute minimal 3 karakter.'
        ]);

        $departemen->name = $request->departemen;
        $departemen->save();

        return redirect()->route('departemen.index')->with('message', 'Update Success Departemen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Departemen $departemen
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Departemen $departemen)
    {
        $departemen->delete();
        return back()->with('message', 'Delete Success Departemen');
    }
}
