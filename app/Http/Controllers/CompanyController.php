<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objCompany = Company::orderBy('name', 'ASC')
       
        ->paginate(10);

        return view('Companies.index', compact('objCompany'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'website' => 'alpha_num'
        ]);
        $objCompany = Company::create($request->all());
        //image
        if($request->file('logo')){
            $path=Storage::disk('public')->put('image',$request->file('logo'));
            $objCompany->fill(['logo'=>asset($path)])->save();
        }
        return redirect()->route('company.edit',$objCompany->id)->with('info', 'Guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objCompany = Company::find($id);
        return view('Companies.show', compact('objCompany'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objCompany = Company::find($id);


        return view('Companies.edit', compact('objCompany'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $objCompany = Company::find($id);
        $objCompany->fill($request->all())->save();
        //image
        if($request->file('logo')){
            $path=Storage::disk('public')->put('image',$request->file('logo'));
            $objCompany->fill(['logo'=>asset($path)])->save();
        }
       
        return redirect()->route('company.edit', $objCompany->id)->with('info', 'Empresa actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        
        
        if($request->ajax()){
            $objcliente=Company::find($id)->delete();

            return response()->json([
                'mensaje' =>   ' la empresa fue eliminada con éxito'

            ]);

        }

        return back();
    }
}
