<?php
// Vue détaillée du ticket - TicketPro SaaS Redesign
// attend tableau $ticket (avec $ticket['comments'])
?>
<main class="container mx-auto px-6 py-12 max-w-5xl">
    <?php if (!$ticket): ?>
        <div class="glass p-12 rounded-3xl text-center">
            <p class="text-slate-500 text-lg">Ticket introuvable.</p>
            <a href="/tickets" class="text-purple-400 font-bold hover:underline mt-4 inline-block">Retour à la liste</a>
        </div>
    <?php else: ?>
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div>
                <div class="flex items-center space-x-3 mb-2">
                    <span class="text-slate-500 font-mono text-sm">#<?php echo htmlspecialchars($ticket['id']); ?></span>
                    <?php
                    $status = strtolower($ticket['status']);
                    $statusLine = 'bg-slate-800 text-slate-400';
                    if ($status === 'ouvert' || $status === 'open')
                        $statusLine = 'bg-cyan-500/10 text-cyan-400 border border-cyan-500/20';
                    if ($status === 'fermé' || $status === 'closed')
                        $statusLine = 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20';
                    if ($status === 'en attente' || $status === 'pending')
                        $statusLine = 'bg-orange-500/10 text-orange-400 border border-orange-500/20';
                    ?>
                    <span
                        class="px-3 py-0.5 rounded-full text-[10px] font-black uppercase tracking-tighter <?php echo $statusLine; ?>">
                        <?php echo htmlspecialchars($ticket['status']); ?>
                    </span>
                </div>
                <h1 class="text-4xl font-black tracking-tighter text-white">
                    <?php echo htmlspecialchars($ticket['title']); ?>
                </h1>
            </div>
            <a href="/tickets"
                class="text-slate-400 hover:text-white transition-colors flex items-center space-x-2 text-sm font-bold">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd" />
                </svg>
                <span>Retour</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
            <!-- Content & Comments -->
            <div class="md:col-span-8 space-y-8">
                <!-- Original Description -->
                <div class="glass p-8 rounded-3xl border-purple-500/20 relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-4 opacity-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-purple-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                    </div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div
                            class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center font-bold text-slate-400 border border-white/5">
                            U</div>
                        <div>
                            <p class="text-sm font-bold text-white">Client</p>
                            <p class="text-[10px] text-slate-500 uppercase tracking-widest">Message Original</p>
                        </div>
                    </div>
                    <div class="text-slate-300 leading-relaxed whitespace-pre-wrap text-lg">
                        <?php echo nl2br(htmlspecialchars($ticket['description'])); ?>
                    </div>
                </div>

                <!-- Discussion Loop -->
                <div class="space-y-6">
                    <div class="flex items-center space-x-4">
                        <div class="h-px flex-1 bg-slate-800"></div>
                        <span class="text-[10px] font-black tracking-[0.2em] uppercase text-slate-600">Discussion</span>
                        <div class="h-px flex-1 bg-slate-800"></div>
                    </div>

                    <?php if (empty($ticket['comments'])): ?>
                        <div class="text-center py-6">
                            <p class="text-slate-600 italic text-sm">Pas encore de réponse.</p>
                        </div>
                    <?php else: ?>
                        <?php foreach ($ticket['comments'] as $comment): ?>
                            <div class="glass p-6 rounded-3xl border-white/5 transition-all hover:border-white/10">
                                <div class="flex items-start space-x-4">
                                    <div
                                        class="w-8 h-8 rounded-full bg-slate-700 flex items-center justify-center font-bold text-xs text-slate-400 border border-white/5 flex-shrink-0">
                                        R</div>
                                    <div class="flex-1">
                                        <div class="flex justify-between items-center mb-3">
                                            <p class="text-xs font-bold text-purple-400 uppercase tracking-wider">Équipe Support</p>
                                            <span class="text-[10px] text-slate-600 font-mono">#<?php echo $comment['id']; ?></span>
                                        </div>
                                        <div class="text-slate-400 leading-relaxed text-sm">
                                            <?php echo nl2br(htmlspecialchars($comment['content'])); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- Reply Form (SaaS style) -->
                <div class="glass p-8 rounded-[2.5rem] border-purple-500/10 shadow-lg">
                    <form action="/comment/create" method="post" class="space-y-4">
                        <input type="hidden" name="ticket_id" value="<?php echo $ticket['id']; ?>">
                        <input type="hidden" name="user_id" value="1"> <!-- Mockup current user -->
                        <div class="relative">
                            <textarea name="content"
                                class="w-full h-32 px-6 py-4 bg-slate-900/50 border border-slate-800 rounded-2xl focus:outline-none focus:border-purple-500/50 focus:ring-4 focus:ring-purple-500/10 transition-all text-white placeholder:text-slate-600 resize-none"
                                placeholder="Tapez votre réponse ici..." required></textarea>
                            <div class="absolute bottom-4 right-4 flex items-center space-x-2">
                                <span
                                    class="text-[10px] text-slate-600 font-bold uppercase tracking-widest hidden md:inline">Shift
                                    + Enter pour envoyer</span>
                                <button type="submit"
                                    class="px-6 py-2 rounded-xl bg-purple-500 text-white font-bold text-xs hover:bg-purple-400 transition-all shadow-lg">
                                    Envoyer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Sidebar Info -->
            <div class="md:col-span-4 space-y-6">
                <div class="glass p-6 rounded-3xl border-white/5">
                    <h4 class="text-xs font-black uppercase tracking-[0.2em] text-slate-500 mb-6 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-2 text-purple-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Détails
                    </h4>

                    <div class="space-y-4">
                        <div class="flex justify-between items-center text-sm py-2 border-b border-white/5">
                            <span class="text-slate-500">Client</span>
                            <span class="text-white font-bold">User #12</span>
                        </div>
                        <div class="flex justify-between items-center text-sm py-2 border-b border-white/5">
                            <span class="text-slate-500">Priorité</span>
                            <span class="text-orange-400 font-bold flex items-center">
                                <span class="w-2 h-2 rounded-full bg-orange-400 animate-pulse mr-2"></span>
                                Haute
                            </span>
                        </div>
                        <div class="flex justify-between items-center text-sm py-2 border-b border-white/5">
                            <span class="text-slate-500">Créé</span>
                            <span class="text-white font-mono text-xs">2026-02-20</span>
                        </div>
                    </div>
                </div>

                <div
                    class="glass p-6 rounded-3xl border-white/5 group cursor-pointer hover:border-pink-500/20 transition-all">
                    <p class="text-xs font-bold text-slate-500 mb-1 uppercase tracking-widest">Besoin d'aide ?</p>
                    <p class="text-sm text-slate-400 group-hover:text-white transition-colors leading-relaxed">Consultez
                        notre base de connaissances ou contactez un agent directement.</p>
                </div>
            </div>
        </div>
    <?php endif; ?>
</main>