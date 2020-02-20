<?php

namespace App\Http\Controllers;

use App\Departemen;
use App\Http\Requests\PegawaiStoreRequest;
use App\Http\Requests\PegawaiUpdateRequest;
use App\Jabatan;
use App\Pegawai;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $pegawai = Pegawai::with('jabatan', 'departemen');
        $data['pegawais'] = $pegawai->paginate(1);
        if (!is_null($request->search)) {
            $data['pegawais'] = $pegawai->where('name', 'like', "%$request->search%")
                ->paginate(1)
                ->appends($request->all());
            $data['search']   = $request->search;
        }
        return view('pegawai.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $data['jabatan']    = Jabatan::pluck('name', 'id')->prepend('Silahkan Pilih Jabatan');
        $data['departemen'] = Departemen::pluck('name', 'id')->prepend('Silahkan Pilih Departemen');
        return view('pegawai.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PegawaiStoreRequest $request
     * @return RedirectResponse
     */
    public function store(PegawaiStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $fileName = time().Auth::user()->id.'.png';
            $request->file('img_path')->storeAs('public/pegawai', $fileName);

            $user = new User();
            $user->name     = $request->nama;
            $user->email    = $request->email;
            $user->password = Hash::make($request->password);
            $user->img_path = $fileName;
            $user->save();

            $pegawai = new Pegawai();
            $pegawai->name              = $request->nama;
            $pegawai->jabatan_id        = $request->jabatan_id;
            $pegawai->departemen_id     = $request->departemen_id;
            $pegawai->user_id           = $user->id;
            $user->pegawai()->save($pegawai);
            DB::commit();
            return redirect('/pegawai')->with('message', 'Add pegawai success');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect('/pegawai/create')
                ->with('error_message', 'Add pegawai error : ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Pegawai $pegawai
     * @return void
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Pegawai $pegawai
     * @return Factory|View
     */
    public function edit(Pegawai $pegawai)
    {
        $data['jabatan']    = Jabatan::pluck('name', 'id')->prepend('Silahkan Pilih Jabatan');
        $data['departemen'] = Departemen::pluck('name', 'id')->prepend('Silahkan Pilih Departemen');
        $data['pegawai'] = $pegawai;
        return view('pegawai.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PegawaiUpdateRequest $request
     * @param Pegawai $pegawai
     * @return RedirectResponse
     */
    public function update(PegawaiUpdateRequest $request, Pegawai $pegawai)
    {
        DB::beginTransaction();
        try {
            $pegawai->name              = $request->nama;
            $pegawai->jabatan_id        = $request->jabatan_id;
            $pegawai->departemen_id     = $request->departemen_id;
            $pegawai->save();

            $user = $pegawai->user;
            $user->name                 = $request->nama;
            $user->email                = $request->email;
            if (!is_null($request->password)) {
                $user->password = Hash::make($request->password);
            }
            $pegawai->user->push();
            DB::commit();
            return redirect('/pegawai')->with('message', 'Update pegawai success');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('pegawai.edit', ['id'=>$pegawai->id])
                ->with('error_message', 'Update pegawai error : ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Pegawai $pegawai
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return back()->with('message', 'Delete pegawai success');
    }
}
