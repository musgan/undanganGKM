<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SessionActivityRequest;
use App\Models\SessionActivity;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class SessionActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : View
    {
        //
        $data = SessionActivity::orderBy('created_at','desc')->get();
        return view("admin.session_activity.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() : View
    {
        //
        return view("admin.session_activity.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SessionActivityRequest $request)
    {
        //
        try{
            DB::beginTransaction();
            $id = SessionActivity::create($request->all())->id;
            DB::commit();
            $request->session()->flash('success', 'Berhasil menambah data');
            return redirect(url('admin/sessionactivity/'.$id.'/edit'));
        }catch (Exception $e){
            DB::rollBack();
            $request->session()->flash('error', $e->getMessage());
            return back()->withInput();
        }
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
        $data = SessionActivity::findOrFail($id);

        return view("admin.session_activity.edit",compact('id','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SessionActivityRequest $request, $id)
    {
        //
        try{
            DB::beginTransaction();
            SessionActivity::find($id)->update($request->all());
            DB::commit();
            $request->session()->flash('success', 'Berhasil memperbaharui data');
            return redirect(url('admin/sessionactivity/'.$id.'/edit'));
        }catch (Exception $e){
            DB::rollBack();
            $request->session()->flash('error', $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        try{
            if($id == 1)
                throw new Exception("Tidak boleh menghapus data ini", 400);

            DB::beginTransaction();
            SessionActivity::find($id)->delete();
            DB::commit();
            $request->session()->flash('success', 'Berhasil menghapus data');
            return redirect(url('admin/sessionactivity'));
        }catch (Exception $e){
            DB::rollBack();
            $request->session()->flash('error', $e->getMessage());
            return redirect(url('admin/sessionactivity'));
        }
    }
}
