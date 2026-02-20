<?php
// Page de connexion - TicketPro SaaS Redesign
?>
<main class="min-h-[80vh] flex items-center justify-center px-6 relative overflow-hidden">
    <!-- background glow -->
    <div
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-purple-500/20 blur-[120px] pointer-events-none">
    </div>

    <div class="w-full max-w-md relative z-10">
        <div class="glass p-10 rounded-[2.5rem] border-white/10 shadow-2xl">
            <div class="text-center mb-10">
                <h1 class="text-4xl font-black tracking-tighter mb-2">
                    <span class="bg-gradient-to-r from-purple-400 to-pink-500 bg-clip-text text-transparent">Bon
                        retour</span>
                </h1>
                <p class="text-slate-400 font-light text-sm">Connectez-vous à votre espace TicketPro</p>
            </div>

            <form action="/login" method="post" class="space-y-6">
                <div class="space-y-2">
                    <label for="username"
                        class="text-xs font-bold uppercase tracking-widest text-slate-500 ml-1">Utilisateur</label>
                    <div class="relative group">
                        <input type="text" name="username" id="username"
                            class="w-full px-6 py-4 bg-slate-900/50 border border-slate-800 rounded-2xl focus:outline-none focus:border-purple-500/50 focus:ring-4 focus:ring-purple-500/10 transition-all text-white placeholder:text-slate-600"
                            placeholder="votre_nom" required>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="flex justify-between items-center px-1">
                        <label for="password" class="text-xs font-bold uppercase tracking-widest text-slate-500">Mot de
                            passe</label>
                        <a href="#"
                            class="text-[10px] font-bold text-purple-400 hover:text-purple-300 transition-colors uppercase tracking-wider">Oublié
                            ?</a>
                    </div>
                    <div class="relative group">
                        <input type="password" name="password" id="password"
                            class="w-full px-6 py-4 bg-slate-900/50 border border-slate-800 rounded-2xl focus:outline-none focus:border-purple-500/50 focus:ring-4 focus:ring-purple-500/10 transition-all text-white placeholder:text-slate-600"
                            placeholder="••••••••" required>
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit"
                        class="w-full py-4 rounded-2xl bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold text-lg hover:scale-[1.02] active:scale-[0.98] transition-all shadow-[0_10px_30px_-10px_rgba(168,85,247,0.5)]">
                        Se connecter
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center">
                <p class="text-slate-500 text-sm">
                    Pas encore de compte ?
                    <a href="/contact"
                        class="text-purple-400 font-bold hover:underline decoration-2 underline-offset-4">Contactez-nous</a>
                </p>
            </div>
        </div>
    </div>
</main>