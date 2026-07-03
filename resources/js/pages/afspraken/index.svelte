<script lang="ts">
    export let afspraken: Array<{
        id: number;
        user_id: number;
        datum: string;
        tijd: string
        voornaam: string;
        achternaam: string;
        dienst: string;
        email: string;
        opmerking: string;
    }>;

    export let filters;

    let datum = filters?.datum ?? '';
    let dienst = filters?.dienst ?? '';
    let zoek = filters?.zoek ?? '';

        function filter() {
        router.get('/afspraken', {
            datum,
            dienst,
            zoek,
        }, {
            preserveState: true,
            replace: true,
        });
    }

    import Layout from '@/layouts/SiteLayout.svelte';
    import { Link, router } from '@inertiajs/svelte';

</script>


<Layout>
    <div class="flex flex-col md:flex-row mb-6">
        <input
            type="text"
            class="inline-block md:w-[60%] w-[full] rounded-l-sm border border-[#19140035] px-5 py-1.5 text-xl leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
            bind:value={zoek}
            placeholder="Zoek naam..."
            on:change={filter}
        />

        <input
            type="date"
            class="inline-block md:w-[20%] w-[full] border border-[#19140035] px-5 py-1.5 text-xl leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
            bind:value={datum}
            on:change={filter}
        />

        <select bind:value={dienst} on:change={filter}
        class="inline-block md:w-[20%] w-[full] rounded-r-sm border border-[#19140035] px-5 py-1.5 text-xl leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
        >
            <option class="bg-black" value="">Alle diensten</option>
            <option class="bg-black" value="Controle">Controle</option>
            <option class="bg-black" value="Mondhygiënist">Mondhygiënist</option>
            <option class="bg-black" value="Wortelkanaalbehandeling">Wortelkanaalbehandeling</option>
        </select>
    </div>


    <h1 class="text-2xl font-bold mb-4">
        Overzicht afspraken
    </h1>

    <div class="overflow-x-auto">
        <table class="table-auto w-full border rounded-2xl">
            <thead>
                <tr>
                    <th class="border p-2">ID</th>
                    <th class="border p-2">User ID</th>
                    <th class="border p-2">Naam</th>
                    <th class="border p-2">Datum</th>
                    <td class="border p-2">Tijd</td>
                    <th class="border p-2">Dienst</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Opmerking</th>
                </tr>
            </thead>
            <tbody>
            {#each afspraken as afspraak}
                <tr>
                    <td class="border p-2">{afspraak.id}</td>
                    <td class="border p-2">{afspraak.user_id}</td>
                    <td class="border p-2">{afspraak.voornaam} {afspraak.achternaam}</td>
                    <td class="border p-2">{afspraak.datum}</td>
                    <td class="border p-2">{afspraak.tijd}</td>
                    <td class="border p-2">{afspraak.dienst}</td>
                    <td class="border p-2">{afspraak.email}</td>
                    <td class="border p-2">{afspraak.opmerking}</td>
                    <td class="border p-2 text-teal-300 hover:text-teal-600 hover:bg-teal-950">
                        <Link href={`/afspraken/${afspraak.id}`}>
                            Bewerken
                        </Link>
                    </td>
                </tr>
                {/each}
            </tbody>
        </table>
    </div>
</Layout>