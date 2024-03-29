<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EnseignantTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_de_laffichage_des_enseignantsSuccessfully()
    {
        $response=$this->json('GET','/api/EspaceAdministrateur/Enseignant');
        $response->assertStatus(200);
    }
   
    public function test_de_l_ajout_des_enseignantsSuccessfully()
    {
        $register = [
            'Nom' => 'UserTest',
            'Prenom' => 'UserTest',
            'NomUtilisateur' => 'user2@test.com',
            'MotDePasse' => 'testpass',
            'ConfirmMotDePasse' => 'testpass',
            'Module' => 'UserTest'
        ];
        $response=$this->json('POST','/api/EspaceAdministrateur/Enseignant',$register);

        $response->assertStatus(201);


    }
    public function test_de_la_modification_des_enseignantsSuccessfully()
    {
        $register = [
            'Nom' => 'UserTest',
            'Prenom' => 'UserTest',
            'NomUtilisateur' => 'user2@test.com',
            'MotDePasse' => 'testpass',
            'ConfirmMotDePasse' => 'testpass',
            'Module' => 'UserTest'
        ];
        $response=$this->json('PUT','/api/EspaceAdministrateur/Enseignant/8',$register);

        $response->assertStatus(201);

    }
    public function test_de_la_modification_des_enseignantsFailed()
    {
        $register = [
            'Name' => 'UserTest',
            'Prenom' => 'UserTest',
            'NomUtilisateur' => 'user2@test.com',
            'MotDePasse' => 'testpass',
            'ConfirmMotDePasse' => 'testpass',
            'Module' => 'UserTest'
        ];
        $response=$this->json('PUT','/api/EspaceAdministrateur/Enseignant/8',$register);

        $response->assertStatus(422);

    }
    public function test_de_l_ajout_des_enseignantsFailed()
    {
        $registered = [
            'Name' => 'UserTest',
            'Prenom' => 'UserTest',
            'NomUtilisateur' => 'user2@test.com',
            'MotDePasse' => 'testpass',
            'ConfirmMotDePasse' => 'testpass',
            'Module' => 'UserTest'
        ];

        $response=$this->json('POST','/api/EspaceAdministrateur/Enseignant',$registered);

        $response->assertStatus(422);

    }
    public function test_de_la_suppression_des_enseignantsSuccessfully()
    {
      
        
        $response=$this->json('delete','/api/EspaceAdministrateur/Enseignant/7');

        $response->assertStatus(200);

    }
    public function test_de_la_suppression_des_enseignantsFailed()
    {
      
        
        $response=$this->json('delete','/api/EspaceAdministrateur/Enseignant/5');

        $response->assertStatus(500);

    }

}
