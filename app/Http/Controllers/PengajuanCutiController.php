<?php

namespace App\Http\Controllers;

use App\JenisCuti;
use App\Pegawai;
use App\PengajuanCuti;
use App\StatusCuti;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PengajuanCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $pengajuanCuti = PengajuanCuti::with('pegawai.user', 'jenis_cuti', 'status_cuti');
        if (Auth::user()->role == 2) {
            $pengajuanCuti = $pengajuanCuti->whereHas('pegawai.user', function ($query) {
                $query->where('id', Auth::user()->id);
            });
        }
        $data['pengajuan_cutis'] = $pengajuanCuti->paginate(3);
        if (!is_null($request->search)) {
            $data['pengajuan_cutis'] = $pengajuanCuti->whereHas('pegawai', function ($query) use ($request) {
                $query->where('name','like', "%$request->search%");
            })->paginate(3)->appends($request->all());
            $data['search']   = $request->search;
        }
        return view('pengajuan_cuti.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $data['pegawai']    = Pegawai::pluck('name', 'id')->prepend('Silahkan Pilih Jabatan');
        $data['jenis_cuti'] = JenisCuti::pluck('name', 'id')->prepend('Silahkan Pilih Jenis Cuti');
        $data['status_cuti']= StatusCuti::pluck('name', 'id')->prepend('Silahkan Pilih Status Cuti');
        return view('pengajuan_cuti.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $pengajuan_cuti = new PengajuanCuti();
            $pengajuan_cuti->create($request->all());
            DB::commit();
            return redirect('/pengajuan-cuti')->with('message', 'Add pengajuan cuti success');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect('/pengajuan-cuti/create')
                ->with('error_message', 'Add pengajuan cuti error : ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param PengajuanCuti $pengajuanCuti
     * @return Response
     */
    public function show(PengajuanCuti $pengajuanCuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PengajuanCuti $pengajuanCuti
     * @return Factory|View
     */
    public function edit(PengajuanCuti $pengajuanCuti)
    {
        $data['pegawai']    = Pegawai::pluck('name', 'id')->prepend('Silahkan Pilih Jabatan');
        $data['jenis_cuti'] = JenisCuti::pluck('name', 'id')->prepend('Silahkan Pilih Jenis Cuti');
        $data['status_cuti']= StatusCuti::pluck('name', 'id')->prepend('Silahkan Pilih Status Cuti');
        $data['pengajuan_cuti'] = $pengajuanCuti;
        return view('pengajuan_cuti.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param PengajuanCuti $pengajuanCuti
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request, PengajuanCuti $pengajuanCuti)
    {
        DB::beginTransaction();
        try {
            $pengajuanCuti->update($request->all());
            DB::commit();
            return redirect('/pengajuan-cuti')->with('message', 'Update pengajuan cuti success');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect('/pengajuan-cuti/update')
                ->with('error_message', 'Update pengajuan cuti error : ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PengajuanCuti $pengajuanCuti
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(PengajuanCuti $pengajuanCuti)
    {
        $pengajuanCuti->delete();
        return back()->with('message', 'Delete pengajuan cuti success');
    }
}
