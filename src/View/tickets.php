<?php
// Liste des tickets - TicketPro SaaS Redesign
?>
<main class="container mx-auto px-6 py-12">
    <!-- Dashboard Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-6">
        <div>
            <h1 class="text-4xl font-black tracking-tighter mb-2">
                <span class="bg-gradient-to-r from-purple-400 to-pink-500 bg-clip-text text-transparent">Mes
                    Tickets</span>
            </h1>
            <p class="text-slate-400 font-light">Gérez vos demandes de support en un coup d'œil.</p>
        </div>
        <a href="/tickets/create"
            class="flex items-center space-x-2 px-6 py-3 rounded-2xl bg-white text-slate-950 font-bold hover:bg-slate-200 transition-all shadow-[0_10px_30px_-10px_rgba(255,255,255,0.2)]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                    clip-rule="evenodd" />
            </svg>
            <span>Nouveau Ticket</span>
        </a>
    </div>

    <!-- Quick Stats (Mockup/Style) -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-12">
        <div class="glass p-6 rounded-3xl border-white/5">
            <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1">Total</p>
            <p class="text-3xl font-black text-white"><?php echo count($tickets); ?></p>
        </div>
        <div class="glass p-6 rounded-3xl border-purple-500/20">
            <p class="text-purple-400 text-xs font-bold uppercase tracking-wider mb-1">En cours</p>
            <p class="text-3xl font-black text-white">--</p>
        </div>
        <div class="glass p-6 rounded-3xl border-pink-500/20">
            <p class="text-pink-400 text-xs font-bold uppercase tracking-wider mb-1">Terminés</p>
            <p class="text-3xl font-black text-white">--</p>
        </div>
    </div>

    <!-- Tickets List -->
    <div class="space-y-4">
        <?php if (empty($tickets)): ?>
            <div class="glass p-12 rounded-3xl text-center border-dashed border-white/10">
                <p class="text-slate-500 text-lg">Aucun ticket trouvé pour le moment.</p>
                <a href="/tickets/create" class="text-purple-400 font-bold hover:underline mt-2 inline-block">Commencez par
                    en créer um.</a>
            </div>
        <?php else: ?>
            <div
                class="hidden md:grid grid-cols-12 gap-4 px-8 mb-4 text-xs font-bold uppercase tracking-widest text-slate-600">
                <div class="col-span-1">ID</div>
                <div class="col-span-7">Titre du Ticket</div>
                <div class="col-span-2">Statut</div>
                <div class="col-span-2 text-right">Action</div>
            </div>

            <?php foreach ($tickets as $t): ?>
                <div class="glass p-6 md:px-8 rounded-3xl border-white/5 hover:border-white/20 transition-all group">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
                        <div class="col-span-1 text-slate-500 font-mono text-sm">#<?php echo htmlspecialchars($t['id']); ?>
                        </div>
                        <div class="col-span-7">
                            <h3 class="font-bold text-lg text-white group-hover:text-purple-400 transition-colors">
                                <?php echo htmlspecialchars($t['title']); ?>
                            </h3>
                        </div>
                        <div class="col-span-2">
                            <?php
                            $status = strtolower($t['status']);
                            $statusLine = 'bg-slate-800 text-slate-400';
                            if ($status === 'ouvert' || $status === 'open')
                                $statusLine = 'bg-cyan-500/10 text-cyan-400 border border-cyan-500/20';
                            if ($status === 'fermé' || $status === 'closed')
                                $statusLine = 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20';
                            if ($status === 'en attente' || $status === 'pending')
                                $statusLine = 'bg-orange-500/10 text-orange-400 border border-orange-500/20';
                            ?>
                            <span
                                class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-tighter <?php echo $statusLine; ?>">
                                <?php echo htmlspecialchars($t['status']); ?>
                            </span>
                        </div>
                        <div class="col-span-2 text-right">
                            <a href="/ticket/<?php echo urlencode($t['id']); ?>"
                                class="inline-flex items-center space-x-2 text-sm font-bold text-slate-300 hover:text-white transition-colors">
                                <span>Détails</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>