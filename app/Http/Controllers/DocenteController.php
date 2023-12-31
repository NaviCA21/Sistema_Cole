<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class DocenteController
 * @package App\Http\Controllers
 */
class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['docentes'] = Docente::paginate(100);
        return view('docente.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('docente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
              
        $datosDocente = request()->except('_token');
        // dd($datosDocente);

        $docente = Docente::create(request()->all());
        Docente::insert($datosDocente);


        //agregar usuario tipo estudiante
        $user = new User();
        $user->name = $datosDocente["nombre"];
        $user->email = $datosDocente["email"];
        $user->password = Hash::make( $datosDocente["password"] );
        $user->identificador_docente = $docente->iddocente;
       
        $rolesDocente = array( "2" => "3" ); // 3 docente

        // dump($rolesDocente);
         
        $user->assignRole('DocenteUsuario');
 
        $user->save();

        return redirect('/docente')->with('mensaje', 'Docente agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $docente = Docente::find($id);

        return view('docente.show', compact('docente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $docente = Docente::find($id);

        return view('docente.edit', compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Docente $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*
        request()->validate(Docente::$rules);

        $docente->update($request->all());

        return redirect()->route('docentes.index')
            ->with('success', 'Docente updated successfully');
        */

        // estamos recibiendo todos los datos a exception de ...
        $datosDocente = request()->except('_token', '_method');

        /*if( $request->hasFile('Foto') ){
            $empleado = Empleado::findOrFail($id);
            Storage::delete('public/'.$empleado->Foto);
            $datosDocente['Foto'] = $request->file('Foto')->store('uploads','public');
        }*/

        Docente::where('iddocente','=',$id)->update($datosDocente);

        $docente = Docente::findOrFail($id);
        return view('docente.edit', compact('docente'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        /*
        $docente = Docente::find($id)->delete();

        return redirect()->route('docentes.index')
            ->with('success', 'Docente deleted successfully');

        */

        $docente = Docente::findOrFail($id);
        $docente::destroy($id);
        /*if(Storage::delete('public/'.$docente->Foto)){
            docente::destroy($id);
        }*/

        return redirect('/docente')->with('mensaje', 'docente borrado');
        //return redirect('/docente');
    }
}
