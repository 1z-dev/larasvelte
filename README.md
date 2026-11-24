# Larasvelte
> Een schoolproject waar ik moest leren Laravel PHP backend te combineren met Svelte frontend.

## Previews
| Admin Dashboard |
|:---:|
| <img src="https://i.postimg.cc/L8HsCXXc/image.png" alt="Admin Dashboard" height="170"> |
| Afspraak aanmaken |
| <img src="https://i.postimg.cc/3wNxhcgH/image.png" alt="Afspraak aanmaken" height="500"> |

## Hoe je dit larasvelte project opzet (met gebruik van inertia en herd):

1. Voeg de bestandslocatie toe in Herd.
2. Open het project in Herd - sites.
3. Open terminal
4. Run:
```bash
composer install
```
5. Run:
```bash
npm install
```
6. Run:
```bash
php artisan key:generate
```
7. Zorg dat je .env file naar sqlite wijst en de juiste port heeft. Eventueel kan je het naar MySQL sturen als je dat wil.

8. Run:
```bash
php artisan:migrate
```

9. Run:
```bash
npm run dev
```
10. (Als je geen Herd hebt) Run:
```bash
php artisan serve
```
