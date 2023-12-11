<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParticipantRequest;
use App\Models\Participant;
use App\Models\SessionActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Helper\GenerateHelper;
use Illuminate\View\View;
use Exception;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
        $all["key"] = GenerateHelper::generateKeyParticipant($request->session_activity_id);
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
            $q = Participant::find($id);
            $session_activity_id = $q->session_activity_id;
            $q->delete();
            DB::commit();
            $request->session()->flash('success', 'Berhasil menghapus data');
            return redirect(url('admin/participant?session_activity_id='.$session_activity_id));
        }catch (Exception $e){
            DB::rollBack();
            $request->session()->flash('error', $e->getMessage());
            return redirect(url('admin/participant'));
        }
    }

    function getDataParticipant($session_activity_id){
        $data = Participant::where('session_activity_id',$session_activity_id)
            ->orderBy('paid_off','desc')
            ->orderBy('name','asc')
            ->get();
        return $data;
    }

    function textWillAttend($var){
        if($var == null)
            return "Belum konfirmasi";
        else if ($var == 1)
            return "Hadir";
        else
            return "Tidak Hadir";
    }
    function textPaidOff($var){
        if ($var == 1)
            return "Lunas";
        else
            return "Belum di Bayar";
    }

    function writeParticipant(Worksheet $sheet, $session_activity_id){
        $data = $this->getDataParticipant($session_activity_id);
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Nomor HP');
        $sheet->setCellValue('D1', 'Jumlah Peserta');
        $sheet->setCellValue('E1', 'Apakah Hadir ?');
        $sheet->setCellValue('F1', 'Jumlah Dibayarkan');
        $sheet->setCellValue('G1', 'Lunas');
        $rowExcel = 2;
        $no = 0;
        foreach($data as $row){
            $no+=1;
            $sheet->setCellValue('A'.$rowExcel, $no);
            $sheet->setCellValue('B'.$rowExcel, $row->name);
            $sheet->setCellValue('C'.$rowExcel, "'".$row->phone_number);
            $sheet->setCellValue('D'.$rowExcel, $row->total_member);
            $sheet->setCellValue('E'.$rowExcel, $this->textWillAttend($row->will_attend));
            $sheet->setCellValue('F'.$rowExcel, $row->total_paid);
            $sheet->setCellValue('G'.$rowExcel, $this->textPaidOff($row->paid_off));
            $rowExcel+=1;
        }
    }

    public function download(Request $request){

        if($request->get("session_activity_id") == null)
            return;

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $this->writeParticipant($sheet, $request->get('session_activity_id'));

        $writer = new Xlsx($spreadsheet);
        // We'll be outputting an excel file
        header('Content-type: application/vnd.ms-excel');
// It will be called file.xls
        header('Content-Disposition: attachment; filename="data-partisipan.xlsx"');
// Write file to the browser
        $writer->save('php://output');
    }
}
