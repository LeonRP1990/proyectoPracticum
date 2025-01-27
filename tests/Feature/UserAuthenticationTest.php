<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class UserAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test para verificar que un usuario puede iniciar sesión con credenciales correctas.
     */
    public function test_usuario_puede_iniciar_sesion_con_credenciales_correctas()
    {
        // Crear un usuario con credenciales válidas
        $user = User::factory()->create([
            'email' => 'usuario@example.com',
            'password' => bcrypt('password123'),
        ]);

        // Realizar la solicitud POST al endpoint de inicio de sesión
        $response = $this->post('/login', [
            'email' => 'usuario@example.com',
            'password' => 'password123',
        ]);

        // Verificar que el usuario fue autenticado y redirigido
        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Test para verificar que no se permite el inicio de sesión con credenciales incorrectas.
     */
    public function test_usuario_no_puede_iniciar_sesion_con_credenciales_incorrectas()
    {
        // Crear un usuario
        $user = User::factory()->create([
            'email' => 'usuario@example.com',
            'password' => bcrypt('password123'),
        ]);

        // Realizar la solicitud POST con una contraseña incorrecta
        $response = $this->post('/login', [
            'email' => 'usuario@example.com',
            'password' => 'incorrect_password',
        ]);

        // Verificar que el usuario no fue autenticado
        $response->assertSessionHasErrors(['email']);
        $this->assertGuest();
    }

    /**
     * Test para verificar que un usuario autenticado puede acceder al dashboard.
     */
    public function test_usuario_autenticado_puede_acceder_al_dashboard()
    {
        // Crear un usuario
        $user = User::factory()->create();

        // Simular que el usuario inicia sesión
        $this->actingAs($user);

        // Realizar la solicitud GET al dashboard
        $response = $this->get('/dashboard');

        // Verificar que el acceso es exitoso
        $response->assertStatus(200);
        $response->assertSeeText('Bienvenido al Dashboard');
    }

    /**
     * Test para verificar que un usuario no autenticado es redirigido al login.
     */
    public function test_usuario_no_autenticado_es_redirigido_al_login()
    {
        // Realizar la solicitud GET al dashboard sin autenticación
        $response = $this->get('/dashboard');

        // Verificar que el usuario fue redirigido al login
        $response->assertRedirect('/login');
    }
}
