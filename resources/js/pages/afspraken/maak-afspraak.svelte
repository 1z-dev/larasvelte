<script>
    import { router, page } from '@inertiajs/svelte';

    let datum = '';
    let tijd = '';
    let voornaam = '';
    let achternaam = '';
    let email = '';
    let dienst = '';
    let opmerking = '';

    function submit() {
        router.post('/afspraken', {
        datum,
        tijd,
        voornaam,
        achternaam,
        email,
        dienst,
        opmerking,
        });
    }
    import Layout from '@/layouts/SiteLayout.svelte';

</script>


<Layout>
    <div class="flex flex-col max-w-[40%] ml-[25%] items-center border border-[#19140035] dark:border-[#3E3E3A] p-30 rounded-3xl">
        <h1 class="text-2xl mb-5 text-center font-bold">Maak afspraak</h1>
        <header class="mb-6 text-sm lg:max-w-4xl">
            <form on:submit|preventDefault={submit} class="flex flex-col items-center justify-center gap-4">
                <input
                    type="text"
                    bind:value={voornaam}
                    placeholder="John"
                    class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 lg:text-xl leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                >
                <input
                    type="text"
                    bind:value={achternaam}
                    placeholder="Doe"
                    class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 lg:text-xl leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                >
                <input
                    type="email"
                    defaultValue={$page.props.auth.user.email}
                    bind:value={email}
                    placeholder={$page.props.auth.user.email}
                    class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 lg:text-xl leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                >
                <select
                    bind:value={dienst}
                    class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 lg:text-xl leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                >  
                    <option class="bg-black" value="Niet gekozen">Niet gekozen</option>
                    <option class="bg-black" value="Controle">Controle</option>
                    <option class="bg-black" value="Mondhygiënist">Mondhygiënist</option>
                    <option class="bg-black" value="Wortelkanaalbehandeling">Wortelkanaalbehandeling</option>
                </select>
                <input
                    type="text"
                    bind:value={opmerking}
                    placeholder="Opmerking..."
                    class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5  lg:text-xl leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                >
                <input
                    type="date"
                    bind:value={datum}
                    class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 mb-5 lg:text-xl leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                >
                <input
                    type="time"
                    bind:value={tijd}
                    class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 mb-5 lg:text-xl leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                >
                <button
                    type="submit"
                    class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 lg:text-xl leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                >
                    Opslaan
                </button>
            </form>
        </header>
    </div>
</Layout>