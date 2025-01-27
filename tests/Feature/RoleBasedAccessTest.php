<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class RoleBasedAccessTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test para verificar que un usuario sin permisos no pueda acceder a una página protegida.
     */
    public function test_usuario_sin_permisos_no_puede_acceder_a_modulo_admin()
    {
        // Crear un usuario con rol de "usuario" (no administrador)
        $user = User::factory()->create(['role' => 'user']);

        // Simular que el usuario inicia sesión
        $this->actingAs($user);

        // Intentar acceder a una página protegida
        $response = $this->get('/admin');

        // Verificar que el acceso está prohibido (403 Forbidden)
        $response->assertStatus(403);

        // Verificar un mensaje en la respuesta
        $response->assertSeeText('No tienes permiso para acceder a esta página.');
    }

    /**
     * Test para verificar que un administrador pueda acceder a una página protegida.
     */
    public function test_administrador_puede_acceder_a_modulo_admin()
    {
        // Crear un usuario con rol de "administrador"
        $admin = User::factory()->create(['role' => 'admin']);

        // Simular que el administrador inicia sesión
        $this->actingAs($admin);

        // Intentar acceder a la página protegida
        $response = $this->get('/admin');

        // Verificar que el acceso es exitoso (200 OK)
        $response->assertStatus(200);

        // Verificar un mensaje en la respuesta
        $response->assertSeeText('Bienvenido al módulo de administración.');
    }
}
