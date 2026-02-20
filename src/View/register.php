<?php
// Page d'inscription - TicketPro SaaS Redesign
?>
<main class="min-h-[80vh] flex items-center justify-center px-6 relative overflow-hidden">
    <!-- background glow -->
    <div
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-pink-500/10 blur-[120px] pointer-events-none">
    </div>

    <div class="w-full max-w-md relative z-10">
        <div class="glass p-10 rounded-[2.5rem] border-white/10 shadow-2xl">
            <div class="text-center mb-10">
                <h1 class="text-4xl font-black tracking-tighter mb-2">
                    <span class="bg-gradient-to-r from-purple-400 to-pink-500 bg-clip-text text-transparent">Créer un
                        Compte</span>
                </h1>
                <p class="text-slate-400 font-light text-sm">Rejoignez la révolution du support avec TicketPro</p>
            </div>

            <form action="/register" method="post" class="space-y-6">
                <div class="space-y-2">
                    <label for="username" class="text-xs font-bold uppercase tracking-widest text-slate-500 ml-1">Nom
                        d'utilisateur</label>
                    <div class="relative group">
                        <input type="text" name="username" id="username"
                            class="w-full px-6 py-4 bg-slate-900/50 border border-slate-800 rounded-2xl focus:outline-none focus:border-purple-500/50 focus:ring-4 focus:ring-purple-500/10 transition-all text-white placeholder:text-slate-600"
                            placeholder="votre_nom" required>
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="email" class="text-xs font-bold uppercase tracking-widest text-slate-500 ml-1">Adresse
                        Email</label>
                    <div class="relative group">
                        <input type="email" name="email" id="email"
                            class="w-full px-6 py-4 bg-slate-900/50 border border-slate-800 rounded-2xl focus:outline-none focus:border-purple-500/50 focus:ring-4 focus:ring-purple-500/10 transition-all text-white placeholder:text-slate-600"
                            placeholder="votre@email.com" required>
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="password" class="text-xs font-bold uppercase tracking-widest text-slate-500 ml-1">Mot de
                        passe</label>
                    <div class="relative group">
                        <input type="password" name="password" id="password"
                            class="w-full px-6 py-4 bg-slate-900/50 border border-slate-800 rounded-2xl focus:outline-none focus:border-purple-500/50 focus:ring-4 focus:ring-purple-500/10 transition-all text-white placeholder:text-slate-600"
                            placeholder="••••••••" required>
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit"
                        class="w-full py-4 rounded-2xl bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold text-lg hover:scale-[1.02] active:scale-[0.98] transition-all shadow-[0_10px_30px_-10px_rgba(168,85,247,0.5)]">
                        S'inscrire
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center">
                <p class="text-slate-500 text-sm">
                    Déjà un compte ?
                    <a href="/login"
                        class="text-purple-400 font-bold hover:underline decoration-2 underline-offset-4">Connectez-vous</a>
                </p>
            </div>
        </div>
    </div>
</main>