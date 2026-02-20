<?php
// Page de contact - TicketPro SaaS Redesign
?>
<main class="container mx-auto px-6 py-12 max-w-6xl">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <!-- Text & Info area -->
        <div>
            <div
                class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-pink-500/10 border border-pink-500/20 text-pink-400 text-xs font-bold uppercase tracking-widest mb-6">
                <span>Support 24/7</span>
            </div>
            <h1 class="text-6xl font-black tracking-tighter mb-8 leading-tight">
                Besoin d'aide ? <br>
                <span class="bg-gradient-to-r from-purple-400 to-pink-500 bg-clip-text text-transparent">On est
                    là.</span>
            </h1>
            <p class="text-xl text-slate-400 font-light mb-12 leading-relaxed">
                Une question sur nos tarifs, une demande de démo ou un besoin technique spécifique ? Notre équipe
                d'experts TicketPro vous répond en un clin d'œil.
            </p>

            <div class="space-y-6">
                <div class="flex items-center space-x-4 group">
                    <div
                        class="w-12 h-12 rounded-2xl bg-slate-900 border border-white/5 flex items-center justify-center text-purple-400 group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-widest">Email</p>
                        <p class="text-white font-bold">hello@ticketpro.saas</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4 group">
                    <div
                        class="w-12 h-12 rounded-2xl bg-slate-900 border border-white/5 flex items-center justify-center text-pink-400 group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-widest">Siège Social</p>
                        <p class="text-white font-bold">Avenue du Néon, Silicon Valley, CA</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Area -->
        <div class="relative">
            <!-- decoration -->
            <div class="absolute -z-10 -top-20 -right-20 w-64 h-64 bg-purple-500/10 blur-[100px] pointer-events-none">
            </div>

            <div class="glass p-10 rounded-[3rem] border-white/5 shadow-2xl">
                <form action="/contact" method="post" class="space-y-6">
                    <div class="space-y-2">
                        <label for="name" class="text-xs font-bold uppercase tracking-widest text-slate-500 ml-1">Nom
                            complet</label>
                        <input type="text" name="name" id="name"
                            class="w-full px-6 py-4 bg-slate-900/50 border border-slate-800 rounded-2xl focus:outline-none focus:border-purple-500/50 focus:ring-4 focus:ring-purple-500/10 transition-all text-white placeholder:text-slate-600"
                            placeholder="Juan Gomes" required>
                    </div>
                    <div class="space-y-2">
                        <label for="email"
                            class="text-xs font-bold uppercase tracking-widest text-slate-500 ml-1">Adresse
                            Email</label>
                        <input type="email" name="email" id="email"
                            class="w-full px-6 py-4 bg-slate-900/50 border border-slate-800 rounded-2xl focus:outline-none focus:border-purple-500/50 focus:ring-4 focus:ring-purple-500/10 transition-all text-white placeholder:text-slate-600"
                            placeholder="juan@exemple.com" required>
                    </div>
                    <div class="space-y-2">
                        <label for="message"
                            class="text-xs font-bold uppercase tracking-widest text-slate-500 ml-1">Votre
                            Message</label>
                        <textarea name="message" id="message"
                            class="w-full h-32 px-6 py-4 bg-slate-900/50 border border-slate-800 rounded-2xl focus:outline-none focus:border-purple-500/50 focus:ring-4 focus:ring-purple-500/10 transition-all text-white placeholder:text-slate-600 resize-none"
                            placeholder="Comment pouvons-nous vous aider ?" required></textarea>
                    </div>
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full py-5 rounded-2xl bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold text-lg hover:scale-[1.02] transition-all shadow-[0_10px_40px_-10px_rgba(168,85,247,0.5)]">
                            Envoyer le message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>