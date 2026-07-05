Hoe je een larasvelte project opzet (met gebruik van inertia en herd):

1. Maak een nieuwe Herd site aan zonder starterkit.
2. Open het project en daarin de terminal.
3. Installeer inertia met de command - composer require inertiajs/inertia-laravel
4. Omdat we een versie voor V3 van inertia gebruiken moet jouw App.js basis er zo uitzien:

<html>
    <head>
        @vite('resources/js/app.js')
        @inertiaHead
    </head>
    <body>
        @inertia
    </body>
</html>

5. Zet dan inertia middleware op met - php artisan inertia:middleware
Nu gaan configuraties via bootstrap > app.php
6. Zet dit in app.php (en andere benodigde dingen):

use App\Http\Middleware\HandleInertiaRequests;
...
->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            HandleInertiaRequests::class,
        ]);
    })


7. Installeer dan de svelte plugin met - npm install svelte @sveltejs/vite-plugin-svelte
8. Voeg het dan toe aan vite.config.js:

import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import { svelte } from '@sveltejs/vite-plugin-svelte'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js'],
            refresh: true,
        }),
        svelte(),
    ],
})

9. Nu de installatie van svelte zelf met - npm install @inertiajs/svelte @inertiajs/vite
10. zet dan in app.js/ts:

import { createInertiaApp } from '@inertiajs/svelte'

createInertiaApp()

Nu is de basis setup compleet.

Ik heb manual setup gebruikt, waar een paar stappen aan vast zitten:
In app.js/ts:

import { createInertiaApp } from '@inertiajs/svelte'
import { mount } from 'svelte'

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.svelte')
        return pages[`./Pages/${name}.svelte`]()
    },
    setup({ el, App, props }) {
        mount(App, { target: el, props })
    },
})

in vite.config.js, waar je een aparte ssr connectie moet leggen:

import { svelte } from '@sveltejs/vite-plugin-svelte';
import tailwindcss from '@tailwindcss/vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import { defineConfig } from 'vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.ts'],
            ssr: 'resources/js/ssr.ts',
            refresh: true,
        }),
        svelte(),
        tailwindcss(),
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, './resources/js'),
        },
    },
});

Als je een database wil aanmaken, gebruik je de componenten die Herd je heeft gegeven:

1. Stel de taal en andere properties in, in database.php
2. Maak een migration met de rijen, tabellen, en hun properties.
3. run - php artisan migrate

4. Verbindt eventueel de models en controllers zodat die communiceren.
