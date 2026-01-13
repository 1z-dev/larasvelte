<script lang="ts">
    export let afspraken: Array<{
        id: number;
        titel: string;
        datum: string;
    }>;
</script>

<h1 class="text-2xl font-bold mb-4">
    Overzicht afspraken
</h1>

<table class="table-auto w-full border">
    <thead>
        <tr>
            <th class="border p-2">Titel</th>
            <th class="border p-2">Datum</th>
        </tr>
    </thead>
    <tbody>
    {#each afspraken as afspraak}
        <tr>
            <td class="border p-2">{afspraak.titel}</td>
            <td class="border p-2">{afspraak.datum}</td>
        </tr>
        {/each}
    </tbody>
</table>