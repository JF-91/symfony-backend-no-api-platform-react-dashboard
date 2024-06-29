<?php

namespace App\Controller\Api;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

class AuthenticationController extends AbstractController
{
    #[Route('/api/login_check', name: 'api_login_check', methods: ['POST'])]
    public function login(): JsonResponse
    {
        // La autenticación se maneja por el firewall y el success_handler de LexikJWT.
        return $this->json([
            'message' => 'Login successful',
        ]);
    }

    #[Route('/auth', name: 'app_auth', methods: ['GET'])]
    public function auth(#[CurrentUser] User $user): JsonResponse
    {
        if ($user) {
            return new JsonResponse([
                'message' => 'You are logged in',
                'user' => $user->getEmail()
            ]);
        }

        return new JsonResponse([
            'message' => 'You are not logged in'
        ]);
    }


    #[Route('/api/logout', name: 'app_logout', methods: ['POST'])]
    public function logout(): JsonResponse
    {
        // Esta acción no necesita hacer nada especial
        return $this->json([
            'message' => 'Logout successful'
        ]);
    }
}
