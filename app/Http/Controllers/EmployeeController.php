<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objEmployee = Employee::paginate();

        return view('User.Employees.index', compact('objEmployee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$objEmployee = Employee::create($request->all());
        $objEmployee = Employee::create([

            'cedula' => request('cedula'),
            'nombre' => request('nombre'),
            'tel' => request('tel'),
            'cel' => request('cel'),
            'dir' => request('dir'),
            'email' => request('email'),
            'user_id' => auth()->id()
        ]);
        return redirect()->route('Employees.edit', $objEmployee->id)->with('info', 'Employee creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objEmployee = Employee::find($id);

        $objprestamo = Prestamo::orderBy('id', 'DESC')
        ->where('Employee_id', $objEmployee->id)
        ->paginate();

        

        return view('User.Employees.show', compact('objEmployee','objprestamo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objEmployee = Employee::find($id);


        return view('User.Employees.edit', compact('objEmployee'));
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
        $objEmployee = Employee::find($id);
        $objEmployee->fill($request->all())->save();
        return redirect()->route('Employees.edit', $objEmployee->id)->with('info', 'Employee actualizado con éxito');
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
            $objEmployee=Employee::find($id)->delete();

            return response()->json([
                'mensaje' =>   ' El Employee fue eliminado con éxito'

            ]);

        }

        return back();
    }
}
