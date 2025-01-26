namespace App\Http\Controllers;

use App\Models\Receta;
use App\Models\CitaMedica;
use Illuminate\Http\Request;

class RecetaController extends Controller
{
    public function index($citaMedicaId)
    {
        $citaMedica = CitaMedica::with('recetas')->findOrFail($citaMedicaId);
        return view('recetas.index', compact('citaMedica'));
    }

    public function create($citaMedicaId)
    {
        $citaMedica = CitaMedica::findOrFail($citaMedicaId);
        return view('recetas.create', compact('citaMedica'));
    }

    public function store(Request $request, $citaMedicaId)
    {
        $request->validate(['descripcion' => 'required|string|max:1000']);

        Receta::create([
            'cita_medica_id' => $citaMedicaId,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('recetas.index', $citaMedicaId)->with('success', 'Receta creada exitosamente.');
    }

    public function edit($id)
    {
        $receta = Receta::findOrFail($id);
        return view('recetas.edit', compact('receta'));
    }

    public function update(Request $request, $id)
    {
        $receta = Receta::findOrFail($id);

        $request->validate(['descripcion' => 'required|string|max:1000']);

        $receta->update($request->all());

        return redirect()->route('recetas.index', $receta->cita_medica_id)->with('success', 'Receta actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $receta = Receta::findOrFail($id);
        $receta->delete();

        return redirect()->route('recetas.index', $receta->cita_medica_id)->with('success', 'Receta eliminada exitosamente.');
    }
}
