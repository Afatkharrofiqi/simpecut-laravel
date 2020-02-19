<?php

namespace App\Http\Controllers;

use App\JenisCuti;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class JenisCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $data['jenis_cutis'] = JenisCuti::paginate(2);
        return view('jenis_cuti.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('jenis_cuti.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $rules = [
            'jenis_cuti' => 'required|min:3'
        ];

        $message = [
            'required' => ':attribute wajib diisi'
        ];

        $validate = Validator::make($request->toArray(),$rules,$message);

        if ($validate->fails()) {
            return redirect()->route('jenis-cuti.create')->withErrors($validate)->withInput();
        }

        $jenis_cuti = new JenisCuti();
        $jenis_cuti->name = $request->jenis_cuti;
        $jenis_cuti->save();

        return redirect('/jenis-cuti')->with('message', 'Success added Status Cuti');
    }

    /**
     * Display the specified resource.
     *
     * @param JenisCuti $jenisCuti
     * @return void
     */
    public function show(JenisCuti $jenisCuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param JenisCuti $jenisCuti
     * @return Factory|View
     */
    public function edit(JenisCuti $jenisCuti)
    {
        $data['jenis_cuti'] = $jenisCuti;
        return view('jenis_cuti.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param JenisCuti $jenisCuti
     * @return RedirectResponse
     */
    public function update(Request $request, JenisCuti $jenisCuti)
    {
        $rules = [
            'jenis_cuti' => 'required|min:3'
        ];

        $message = [
            'required' => ':attribute wajib diisi'
        ];

        $validate = Validator::make($request->toArray(),$rules,$message);

        if ($validate->fails()) {
            return redirect()->route('jenis-cuti.edit', ['id'=>$request->id])->withErrors($validate)->withInput();
        }

        $jenisCuti->name = $request->jenis_cuti;
        $jenisCuti->save();

        return redirect()->route('jenis-cuti.index')->with('message', 'Update jenis cuti success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param JenisCuti $jenisCuti
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(JenisCuti $jenisCuti)
    {
        $jenisCuti->delete();
        return back()->with('message', 'Delete status cuti success');
    }
}
