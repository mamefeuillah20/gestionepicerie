@extends('layout')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-5">Connexion</h1>

    <form id="loginForm" method="POST">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium">Mot de passe</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Se connecter
        </button>

        <p id="errorMessage" class="text-red-500 mt-3"></p>
    </form>
</div>

<script>
    document.getElementById('loginForm').addEventListener('submit', async (e) => {
        e.preventDefault();

        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        try {
            const response = await fetch('/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ email, password }),
            });

            const data = await response.json();

            if (response.ok) {
                localStorage.setItem('token', data.token);
                window.location.href = '/produits';
            } else {
                document.getElementById('errorMessage').textContent = 'Identifiants incorrects.';
            }
        } catch (error) {
            document.getElementById('errorMessage').textContent = 'Erreur de connexion.';
        }
    });
</script>
@endsection
