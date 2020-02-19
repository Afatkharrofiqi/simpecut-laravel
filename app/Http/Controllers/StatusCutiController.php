<?php

namespace App\Http\Controllers;

use App\StatusCuti;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class StatusCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $data['status_cutis'] = StatusCuti::paginate(2);
        return view('status_cuti.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('status_cuti.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $rules = [
            'status_cuti' => 'required|min:3'
        ];

        $message = [
            'required' => ':attribute wajib diisi'
        ];

        $validate = Validator::make($request->toArray(),$rules,$message);

        if ($validate->fails()) {
            return redirect()->route('status-cuti.create')->withErrors($validate)->withInput();
        }

        $status_cuti = new StatusCuti();
        $status_cuti->name = $request->status_cuti;
        $status_cuti->save();

        return redirect('/status-cuti')->with('message', 'Success added Status Cuti');
    }

    /**
     * Display the specified resource.
     *
     * @param StatusCuti $statusCuti
     * @return void
     */
    public function show(StatusCuti $statusCuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param StatusCuti $statusCuti
     * @return Factory|View
     */
    public function edit(StatusCuti $statusCuti)
    {
        $data['status_cuti'] = $statusCuti;
        return view('status_cuti.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param StatusCuti $statusCuti
     * @return RedirectResponse
     */
    public function update(Request $request, StatusCuti $statusCuti)
    {
        $rules = [
            'status_cuti' => 'required|min:3'
        ];

        $message = [
            'required' => ':attribute wajib diisi'
        ];

        $validate = Validator::make($request->toArray(),$rules,$message);

        if ($validate->fails()) {
            return redirect()->route('status-cuti.edit', ['id'=>$request->id])->withErrors($validate)->withInput();
        }

        $statusCuti->name = $request->status_cuti;
        $statusCuti->save();

        return redirect()->route('status-cuti.index')->with('message', 'Update status cuti success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param StatusCuti $statusCuti
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(StatusCuti $statusCuti)
    {
        $statusCuti->delete();
        return back()->with('message', 'Delete status cuti success');
    }
}
