<?php
// Page d'accueil du système de tickets - Redesign SaaS
?>
<main class="relative overflow-hidden">
    <!-- Background Decor -->
    <div
        class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-[600px] pointer-events-none opacity-20 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-purple-500/30 via-transparent to-transparent">
    </div>

    <!-- Hero Section -->
    <section class="container mx-auto px-6 pt-24 pb-20 text-center relative z-10">
        <div
            class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-purple-500/10 border border-purple-500/20 text-purple-400 text-xs font-bold uppercase tracking-widest mb-8 animate-pulse">
            <span>Nouvelle Version 2.0</span>
        </div>
        <h1 class="text-6xl md:text-8xl font-black mb-8 leading-tight tracking-tighter">
            Le support client <br>
            <span
                class="bg-gradient-to-r from-purple-400 via-pink-500 to-purple-500 bg-clip-text text-transparent">réinventé
                pour vous.</span>
        </h1>
        <p class="max-w-3xl mx-auto text-xl text-slate-400 mb-12 leading-relaxed font-light">
            Offrez à vos clients l'excellence qu'ils méritent. Un système de tickets ultra-rapide, élégant et intuitif,
            conçu pour propulser votre entreprise vers de nouveaux sommets.
        </p>
        <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-6">
            <a href="/login"
                class="w-full sm:w-auto px-10 py-4 rounded-full bg-white text-slate-950 font-bold text-lg hover:bg-slate-200 hover:scale-105 transition-all shadow-[0_0_40px_rgba(255,255,255,0.15)]">
                Démarrer l'essai gratuit
            </a>
            <a href="/features"
                class="w-full sm:w-auto px-10 py-4 rounded-full glass font-bold text-lg hover:bg-slate-900 transition-all border border-slate-700">
                Voir les Features
            </a>
        </div>
    </section>

    <!-- Features Bento Grid -->
    <section class="container mx-auto px-6 py-24">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 h-full">
            <!-- Feature 1 -->
            <div class="md:col-span-8 glass p-10 rounded-3xl group hover:border-purple-500/40 transition-all">
                <div
                    class="w-12 h-12 rounded-2xl bg-purple-500/20 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-3xl font-bold mb-4">Vitesse Foudroyante</h3>
                <p class="text-slate-400 leading-relaxed text-lg">Notre infrastructure est optimisée pour une latence
                    minimale. Vos tickets, commentaires et mises à jour apparaîssent en temps réel, sans jamais ralentir
                    votre flux de travail.</p>
            </div>

            <!-- Feature 2 -->
            <div class="md:col-span-4 glass p-10 rounded-3xl group hover:border-pink-500/40 transition-all">
                <div
                    class="w-12 h-12 rounded-2xl bg-pink-500/20 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4">Sécurité Pro</h3>
                <p class="text-slate-400 leading-relaxed">Chiffrement de bout en bout et gestion granulaire des
                    permissions pour protéger les données.</p>
            </div>

            <!-- Feature 3 -->
            <div class="md:col-span-4 glass p-10 rounded-3xl group hover:border-blue-500/40 transition-all">
                <div
                    class="w-12 h-12 rounded-2xl bg-blue-500/20 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 11h.01M7 15h.01M13 7h.01M13 11h.01M13 15h.01M17 7h.01M17 11h.01M17 15h.01" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4">Labels Intelligents</h3>
                <p class="text-slate-400 leading-relaxed">Catégorisez automatiquement les tickets complexes avec otre
                    sistema de tags dinâmicos.</p>
            </div>

            <!-- Feature 4 -->
            <div
                class="md:col-span-8 glass p-10 rounded-3xl group hover:border-emerald-500/40 transition-all flex flex-col justify-center">
                <h3 class="text-3xl font-bold mb-4">Interface Intuitive</h3>
                <p class="text-slate-400 leading-relaxed text-lg">Pas besoin de formation. Une interface pensée pour
                    l'utilisateur final : simple, efficace et radicalement productive.</p>
            </div>
        </div>
    </section>

    <!-- Final Call to Action -->
    <section class="container mx-auto px-6 py-20 text-center">
        <div class="glass p-16 rounded-[3rem] border-purple-500/20 bg-gradient-to-br from-slate-900 to-slate-950">
            <h2 class="text-4xl md:text-5xl font-black mb-6">Prêt à transformer votre support ?</h2>
            <p class="text-xl text-slate-400 mb-10 max-w-2xl mx-auto">Rejoignez des centaines d'entreprises qui
                utilisent déjà TicketPro pour satisfaire leurs clients.</p>
            <a href="/login"
                class="inline-block px-12 py-5 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold text-xl hover:scale-105 transition-all shadow-[0_0_50px_rgba(168,85,247,0.3)]">
                Commencer l'Aventure
            </a>
        </div>
    </section>
</main>