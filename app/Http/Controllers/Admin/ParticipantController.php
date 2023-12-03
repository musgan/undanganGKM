<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParticipantRequest;
use App\Models\Participant;
use App\Models\SessionActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        //
        $data = [];
        $session_activity_id = $request->get('session_activity_id');
        if($session_activity_id){
            $data = Participant::where('session_activity_id',$session_activity_id)
                ->orderBy('created_at','desc')
                ->get();
        }
        $session_activities = $this->getSessionActivity();
        return view('admin.participant.index', compact('data', 'session_activities', 'session_activity_id'));
    }

    function getSessionActivity(){
        return SessionActivity::orderBy('created_at','desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
    {
        //
        $session_activities = $this->getSessionActivity();
        return view('admin.participant.create', compact( 'session_activities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParticipantRequest $request)
    {
        //
        $all = $request->all();
        $all["key"] = $this->generateKey($request->session_activity_id);
        try{
            DB::beginTransaction();
            $id = Participant::create($all)->id;
            DB::commit();
            $request->session()->flash('success', 'Berhasil menambah data');
            return redirect(url('admin/participant/'.$id.'/edit'));
        }catch (Exception $e){
            DB::rollBack();
            $request->session()->flash('error', $e->getMessage());
            return back()->withInput();
        }
    }

    function generateKey($session_activity_id){
        $key = "";
        $listKey = Participant::where('session_activity_id',$session_activity_id)->pluck('key')->toArray();
        $isCheck = true;
        while ($isCheck){
            $key = $session_activity_id.(Str::random(7));
            if(!in_array($key, $listKey)){
                $isCheck = false;
            }
        }
        return $key;
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
    public function edit($id): View
    {
        //
        $data = Participant::findOrFail($id);
        $session_activities = $this->getSessionActivity();
        return view('admin.participant.edit', compact( 'session_activities','id','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ParticipantRequest $request, $id)
    {
        //
        try{
            DB::beginTransaction();
            Participant::find($id)->update($request->all());
            DB::commit();
            $request->session()->flash('success', 'Berhasil memperbaharui data');
            return redirect(url('admin/participant/'.$id.'/edit'));
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
            DB::beginTransaction();
            Participant::find($id)->delete();
            DB::commit();
            $request->session()->flash('success', 'Berhasil menghapus data');
            return redirect(url('admin/participant'));
        }catch (Exception $e){
            DB::rollBack();
            $request->session()->flash('error', $e->getMessage());
            return redirect(url('admin/participant'));
        }
    }
}
