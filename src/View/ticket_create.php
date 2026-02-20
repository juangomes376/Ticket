<?php
// Formulaire de création de ticket - TicketPro SaaS Redesign
?>
<main class="container mx-auto px-6 py-12 max-w-4xl">
    <!-- Header -->
    <div class="mb-12 text-center">
        <h1 class="text-5xl font-black tracking-tighter mb-4">
            <span class="bg-gradient-to-r from-purple-400 to-pink-500 bg-clip-text text-transparent">Ouvrir um Nouveau
                Ticket</span>
        </h1>
        <p class="text-slate-400 text-lg font-light">Expliquez votre problème et notre équipe reviendra vers vous
            rapidement.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-12 gap-12">
        <!-- Form Area -->
        <div class="md:col-span-8">
            <div class="glass p-10 rounded-[2.5rem] border-white/5 shadow-2xl relative overflow-hidden">
                <!-- subtle glow -->
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-purple-500/10 blur-3xl pointer-events-none"></div>

                <form action="/tickets/create" method="post" class="space-y-8">
                    <!-- Title Input -->
                    <div class="space-y-2">
                        <label for="title" class="text-xs font-bold uppercase tracking-widest text-slate-500 ml-1">Titre
                            du Problème</label>
                        <input type="text" name="title" id="title"
                            class="w-full px-6 py-4 bg-slate-900/50 border border-slate-800 rounded-2xl focus:outline-none focus:border-purple-500/50 focus:ring-4 focus:ring-purple-500/10 transition-all text-white placeholder:text-slate-600"
                            placeholder="ex: Bug sur la page de paiement" required>
                    </div>

                    <!-- Description Textarea -->
                    <div class="space-y-2">
                        <label for="description"
                            class="text-xs font-bold uppercase tracking-widest text-slate-500 ml-1">Description
                            Détaillée</label>
                        <textarea name="description" id="description"
                            class="w-full h-48 px-6 py-4 bg-slate-900/50 border border-slate-800 rounded-2xl focus:outline-none focus:border-purple-500/50 focus:ring-4 focus:ring-purple-500/10 transition-all text-white placeholder:text-slate-600 resize-none"
                            placeholder="Décrivez précisément votre problème..." required></textarea>
                    </div>

                    <!-- Row: Status & User -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="status"
                                class="text-xs font-bold uppercase tracking-widest text-slate-500 ml-1">Statut
                                Initial</label>
                            <div class="relative group">
                                <select name="status" id="status"
                                    class="w-full px-6 py-4 bg-slate-900/50 border border-slate-800 rounded-2xl focus:outline-none focus:border-purple-500/50 focus:ring-4 focus:ring-purple-500/10 transition-all text-white appearance-none cursor-pointer">
                                    <option value="open">Ouvert</option>
                                    <option value="pending">En attente</option>
                                </select>
                                <div
                                    class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-slate-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label for="user_id"
                                class="text-xs font-bold uppercase tracking-widest text-slate-500 ml-1">ID
                                Utilisateur</label>
                            <input type="number" name="user_id" id="user_id" value="1"
                                class="w-full px-6 py-4 bg-slate-900/50 border border-slate-800 rounded-2xl text-slate-400 group-hover:text-white transition-all cursor-not-allowed"
                                readonly>
                        </div>
                    </div>

                    <div class="pt-6">
                        <button type="submit"
                            class="w-full py-5 rounded-2xl bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold text-lg hover:scale-[1.02] active:scale-[0.98] transition-all shadow-[0_10px_40px_-10px_rgba(168,85,247,0.5)]">
                            Créer le Ticket
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Support Info Section -->
        <div class="md:col-span-4 space-y-6">
            <div class="glass p-8 rounded-3xl border-white/5">
                <h3 class="text-lg font-bold mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-purple-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Aide Rapide
                </h3>
                <ul class="space-y-4 text-sm text-slate-400">
                    <li class="flex items-start">
                        <span class="text-purple-400 mr-2">•</span>
                        Soyez le mais précis possible dans le titre.
                    </li>
                    <li class="flex items-start">
                        <span class="text-purple-400 mr-2">•</span>
                        Ajoutez des étapes pour reproduire le bug.
                    </li>
                    <li class="flex items-start">
                        <span class="text-purple-400 mr-2">•</span>
                        Mentionnez le navigateur ou l'appareil utilisé.
                    </li>
                </ul>
            </div>

            <div class="glass p-8 rounded-3xl border-pink-500/10">
                <p class="text-xs font-bold text-pink-400 mb-2 uppercase tracking-widest">SLA de Support</p>
                <p class="text-sm text-slate-400 leading-relaxed italic">
                    "Nous nous engageons à répondre à tous les tickets prioritaires sous 24h ouvrées."
                </p>
            </div>
        </div>
    </div>
</main>