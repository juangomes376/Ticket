<?php
// Formulaire pour ajouter un label/tag à un ticket
?>
<main class="container mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold mb-6 neon text-pink-400">Ajouter un tag</h1>
    <form action="/tags/create" method="post" class="space-y-6 bg-gray-800 p-6 rounded-lg">
        <div>
            <label for="ticket_id" class="block text-gray-300">ID du ticket</label>
            <input type="number" name="ticket_id" id="ticket_id" class="w-full px-3 py-2 bg-gray-700 rounded" required>
        </div>
        <div>
            <label for="label" class="block text-gray-300">Libellé</label>
            <input type="text" name="label" id="label" class="w-full px-3 py-2 bg-gray-700 rounded" required>
        </div>
        <button type="submit" class="px-6 py-2 bg-pink-600 rounded hover:bg-pink-500 neon">Ajouter</button>
    </form>
</main>