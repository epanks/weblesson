<?php

namespace App\Http\Controllers;

use App\Paket_data;
use Illuminate\Http\Request;
use DataTables;
use Validator;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Paket_data::latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('paket_data');
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
        $rules = array(
            'nmpaket'    =>  'required',
            'pagurmp'     =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'nmpaket'        =>  $request->nmpaket,
            'pagurmp'         =>  $request->pagurmp,
            'kdsatker'         =>  $request->kdsatker,
            'trgoutput'         =>  $request->trgoutput,
            'trgoutcome'         =>  $request->trgoutcome,
            'kdoutput'         =>  $request->kdoutput,
            'pagurmawal'         =>  $request->pagurmawal,
            'keuangan'         =>  $request->keuangan,
            'progres_fisik'         =>  $request->progres_fisik,
            'TahunFisik'         =>  $request->TahunFisik
        );

        Paket_data::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paket_data  $paket_data
     * @return \Illuminate\Http\Response
     */
    public function show(Paket_data $paket_data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paket_data  $paket_data
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (request()->ajax()) {
            $data = Paket_data::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paket_data  $paket_data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paket_data $paket_data)
    {
        $rules = array(
            'nmpaket'        =>  'required',
            'pagurmp'         =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'nmpaket'        =>  $request->nmpaket,
            'pagurmp'         =>  $request->pagurmp,
            'kdsatker'         =>  $request->kdsatker,
            'trgoutput'         =>  $request->trgoutput,
            'trgoutcome'         =>  $request->trgoutcome,
            'kdoutput'         =>  $request->kdoutput,
            'pagurmawal'         =>  $request->pagurmawal,
            'keuangan'         =>  $request->keuangan,
            'progres_fisik'         =>  $request->progres_fisik,
            'TahunFisik'         =>  $request->TahunFisik
        );

        Paket_data::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paket_data  $paket_data
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Paket_data::findOrFail($id);
        $data->delete();
    }
}
