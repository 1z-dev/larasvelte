<script>
    import { Link, page } from '@inertiajs/svelte';
</script>

<container class="flex flex-col md:flex-row w-full">
    <nav class="flex flex-row md:flex-col text-xs md:text-lg text-teal-300 mr-5">
        {#if $page.props.auth.user}
            <p class="text-teal-600 p-5 border-2">{$page.props.auth.user.email}</p>
        {/if}
        <Link href="/afspraken" class="hover:text-teal-600 hover:bg-teal-950 p-5 border-2">
            Overzicht
        </Link>
        
        <Link href="/maak-afspraak" class="hover:text-teal-600 hover:bg-teal-950 p-5 border-2">
            Maak afspraak
        </Link>

        {#if $page.props.auth.user}
            <Link href="/logout" method="post" class="hover:text-teal-600 hover:bg-teal-950 p-5 border-2">
                Logout
            </Link>
        {:else}
            <Link href="/login" class="hover:text-teal-600 hover:bg-teal-950 p-5 border-2">
                Log in
            </Link>
        {/if}
    </nav>

    <container class="flex flex-col flex-1 m-10">
        <slot />
    </container>
</container>