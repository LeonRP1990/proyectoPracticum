use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cita_medica_id'); // Relación con citas médicas
            $table->text('descripcion'); // Campo para la descripción de la receta
            $table->timestamps();

            // Clave foránea para la relación con citas médicas
            $table->foreign('cita_medica_id')->references('id')->on('citas_medicas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recetas');
    }
};
