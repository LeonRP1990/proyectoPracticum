<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserAuthenticationTest extends TestCase
{
    // Limpiar la base de datos en cada test
    use RefreshDatabase;

    /**
     * Verifica que un usuario pueda iniciar sesión correctamente y reciba un estado 200.
     */
    public function test_usuario_puede_iniciar_sesion_correctamente()
    {
        // Crear un usuario en la base de datos de prueba
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'), // Hashear la contraseña para que coincida
        ]);

        // Datos de inicio de sesión correctos
        $credentials = [
            'email' => 'test@example.com',
            'password' => 'password123',
        ];

        // Realizar una solicitud POST al endpoint de inicio de sesión
        $response = $this->post(route('login'), $credentials);

        // Verificar si devuelve un 200 OK
        $response->assertStatus(200);

        // Verificar que el usuario está autenticado
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Verifica que un usuario no pueda iniciar sesión con credenciales incorrectas y reciba un estado 401.
     */
    public function test_usuario_no_puede_iniciar_sesion_con_credenciales_incorrectas()
    {
        // Crear un usuario en la base de datos de prueba
        User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'), // Hashear la contraseña para que coincida
        ]);

        // Datos de inicio de sesión incorrectos
        $credentials = [
            'email' => 'test@example.com',
            'password' => 'wrongpassword',
        ];

        // Realizar una solicitud POST al endpoint de inicio de sesión
        $response = $this->post(route('login'), $credentials);

        // Verificar si devuelve un 401 Unauthorized
        $response->assertStatus(401);

        // Verificar que el usuario no está autenticado
        $this->assertGuest();
    }

    /**
     * Verifica que un usuario autenticado pueda cerrar sesión correctamente.
     */
    public function test_usuario_autenticado_puede_cerrar_sesion()
    {
        // Crear un usuario en la base de datos de prueba
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
        ]);

        // Autenticar al usuario
        $this->actingAs($user);

        // Realizar una solicitud POST al endpoint de logout
        $response = $this->post(route('logout'));

        // Verificar si devuelve un 200 OK
        $response->assertStatus(200);

        // Verificar que el usuario ya no está autenticado
        $this->assertGuest();
    }
}
