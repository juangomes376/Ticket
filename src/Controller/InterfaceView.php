<?php

namespace App\Controller;

class InterfaceView
{
    public static function header()
    {
        $html = "
        <body class=\"bg-gray-900 text-white antialiased\">
            <header class=\"bg-gray-800 shadow\">
                <nav class=\"container mx-auto px-4 py-3 flex justify-between items-center\">
                    <a href=\"/\" class=\"text-xl font-bold\">Système de tickets</a>
                    <div class=\"space-x-4\">
                        <a href=\"/\" class=\"hover:text-gray-300\">Accueil</a>
                        <a href=\"/about\" class=\"hover:text-gray-300\">À propos</a>
                        <a href=\"/features\" class=\"hover:text-gray-300\">Fonctionnalités</a>
                        <a href=\"/contact\" class=\"hover:text-gray-300\">Contact</a>
                        <a href=\"/terms\" class=\"hover:text-gray-300\">CGU</a>
                    </div>
                </nav>
            </header>
        
        ";

        return $html;
    }

    public static function head($title)
    {
        $html = "
        <!DOCTYPE html>
        <html lang='fr' class=\"dark\">
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>{$title}</title>
            <!-- Tailwind CSS via CDN -->
            <script src=\"https://cdn.tailwindcss.com\"></script>
            <style>html{color-scheme:dark;}</style>
        </head>
        
        ";

        return $html;
    }

    public static function footer()
    {
        $html = "
            <footer class=\"bg-gray-800 mt-12 py-6\">
                <div class=\"container mx-auto px-4 text-center text-gray-400\">
                    &copy; " . date('Y') . " Système de tickets. Tous droits réservés.
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