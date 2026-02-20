<?php

namespace App\Controller;

class InterfaceView
{
    public static function header()
    {
        $html = '
        <body class="bg-slate-950 text-slate-100 antialiased selection:bg-purple-500/30">
            <header class="sticky top-0 z-50 w-full border-b border-slate-800 bg-slate-950/80 backdrop-blur-md">
                <nav class="container mx-auto px-6 h-20 flex justify-between items-center">
                    <a href="/" class="flex items-center space-x-2 text-2xl font-black tracking-tighter">
                        <span class="bg-gradient-to-r from-purple-400 to-pink-500 bg-clip-text text-transparent">TICKET</span>
                        <span class="text-slate-100">PRO</span>
                    </a>
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="/" class="nav-link text-sm font-medium text-slate-400 hover:text-white">Accueil</a>
                        <a href="/features" class="nav-link text-sm font-medium text-slate-400 hover:text-white">Features</a>
                        <a href="/tickets" class="nav-link text-sm font-medium text-slate-400 hover:text-white">Tickets</a>
                        <a href="/login" class="px-5 py-2.5 rounded-full text-sm font-bold bg-white text-slate-950 hover:bg-slate-200 transition-all">Connexion</a>
                    </div>
                    <!-- Menu Mobile (simplifié pour l\'exemple) -->
                    <button class="md:hidden text-slate-400 hover:text-white">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" /></svg>
                    </button>
                </nav>
            </header>
        ';
        return $html;
    }

    public static function head($title)
    {
        $html = "
        <!DOCTYPE html>
        <html lang='fr' class='dark scroll-smooth'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>{$title} | TicketPro SaaS</title>
            <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap' rel='stylesheet'>
            <script src=\"https://cdn.tailwindcss.com\"></script>
            <script>
                tailwind.config = {
                    darkMode: 'class',
                    theme: {
                        extend: {
                            fontFamily: {
                                sans: ['Outfit', 'sans-serif'],
                            }
                        }
                    }
                }
            </script>
            <style>
                body {
                    background: #020617;
                    background-image: 
                        radial-gradient(at 0% 0%, rgba(139, 92, 246, 0.05) 0px, transparent 50%),
                        radial-gradient(at 100% 0%, rgba(236, 72, 153, 0.05) 0px, transparent 50%);
                }
                .nav-link {
                    position: relative;
                }
                .nav-link::after {
                    content: '';
                    position: absolute;
                    width: 0;
                    height: 2px;
                    bottom: -4px;
                    left: 0;
                    background: linear-gradient(90deg, #a855f7, #ec4899);
                    transition: width 0.3s ease;
                }
                .nav-link:hover::after {
                    width: 100%;
                }
                .glass {
                    background: rgba(15, 23, 42, 0.6);
                    backdrop-filter: blur(12px);
                    border: 1px solid rgba(255, 255, 255, 0.1);
                }
            </style>
        </head>
        ";
        return $html;
    }

    public static function footer()
    {
        $html = "
            <footer class=\"border-t border-slate-800 bg-slate-950 py-12 mt-20\">
                <div class=\"container mx-auto px-6\">
                    <div class=\"flex flex-col md:flex-row justify-between items-center\">
                        <div class=\"mb-8 md:mb-0\">
                            <a href=\"/\" class=\"text-xl font-bold tracking-tighter\">
                                <span class=\"bg-gradient-to-r from-purple-400 to-pink-500 bg-clip-text text-transparent\">TICKET</span>PRO
                            </a>
                            <p class=\"mt-2 text-slate-500 text-sm\">Support intelligent pour entreprises modernes.</p>
                        </div>
                        <div class=\"flex space-x-6 text-slate-400\">
                            <a href=\"/terms\" class=\"hover:text-white transition-colors\">Terms</a>
                            <a href=\"/contact\" class=\"hover:text-white transition-colors\">Contact</a>
                            <a href=\"#\" class=\"hover:text-white transition-colors\">Privacité</a>
                        </div>
                    </div>
                    <div class=\"mt-8 pt-8 border-t border-slate-900 text-center text-slate-600 text-xs\">
                        &copy; " . date('Y') . " TicketPro SaaS. Conçu avec excellence.
                    </div>
                </div>
            </footer>
        </body>
        </html>
        ";
        return $html;
    }

    public static function view($view,$title , $data = [])
    {
        extract($data);
        $html = self::head($title);
        $html .= self::header();

        ob_start();
        include __DIR__ . '/../View/' . $view . '.php';
        $html .= ob_get_clean();

        $html .= self::footer();

        return $html;
    }
}