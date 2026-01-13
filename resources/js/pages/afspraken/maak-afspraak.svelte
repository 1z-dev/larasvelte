<script>
    import { router } from '@inertiajs/svelte';

    let datum = '';
    let voornaam = '';
    let achternaam = '';
    let email = '';
    let dienst = '';
    let opmerking = '';

    function submit() {
        router.post('/afspraken', {
        titel,
        datum,
        voornaam,
        achternaam,
        email,
        dienst,
        opmerking,
        });
    }
</script>

<input type="text" placeholder="Voornaam">
<input type="text" placeholder="Achternaam">
<input type="email" placeholder="test@example.com">
<input type="select">
<input type="text" placeholder="Opmerking...">
<input type="date" bind:value={datum} />

<button on:click={submit}>
    Opslaan
</button>